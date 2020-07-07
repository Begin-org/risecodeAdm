<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Risecode</title>

        <!-- Imports para o boostrap funcionar -->
        <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.css">

        <!-- Import de CSS -->
        <link rel="stylesheet" href="estilo-pegahd.css">

        <!-- Imports de FontAwesome para os icones dinamicos de menu funcionarem -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
        
        <script src="sprite-pegahd.js"></script>
        <script>
            function mouseMove(e) {
                var x = e.clientX;
                var y = e.clientY;
            }
        </script>
    </head>
    <body>
        <!-- Modal de perfil -->
        <div class="modal fade" id="modalPerfil" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content modal-content-perfil">
                    <h4 class="titulo-modal-perfil">Perfil</h4>
                    <div class="col-12">
                        <img src="../../imgs/girl-modal.png" class="avatar-modal">
                    </div>
                    <div class="col-12">
                        <span class="badge badge-nome">Nome do aluno</span>
                    </div>
                </div>
            </div>
        </div> 
        <div class="cabecalho">
            <a class="" href="../../pag-home-aluno.php">
                <img src="../../imgs/LOGO-RISECODE2.png" class="icon-risecode-header" alt="">
            </a>
            <p class="texto-perfil-header" data-toggle="modal" data-target="#modalPerfil">Perfil</p>
        </div>
        <div class="container-fluid conteudo" id="conteudo">

        <script>
        
        //variaveis de jogo
        var canvas, ctx; //tela e contexto do jogo
        var LARGURA, ALTURA; //medidas da tela geral
        var frames = 0, velocidadeObs = 6, estadoAtual;
        var img;
        var xMouse=0, yMouse=0;
        var estados = {
            jogar:0,
            jogando:1,
            perdeu:2
        };

        var chao = {
            y: 382,
            x: 0,
            altura: 90,

            desenha:function(){
               // ctx.fillStyle = this.cor;
              //  ctx.fillRect(0, this.y, LARGURA, this.altura);
              spriteChao.desenha(this.x, this.y);
            }
        };
        var bloco = {
            x: 50,
            y: 310,
            altura: cesta.altura,
            largura: cesta.largura,
            cor: "#ff4e4e",
            gravidade: 1.6,
            velocidade: 0,
            forcaDoPulo:23.6,
            qtdPulos:0,
            score:0,
            
            desenha:function(){
                cesta.desenha(this.x, this.y);
                //ctx.fillStyle = this.cor;
              // ctx.fillRect(this.x, this.y, this.largura, this.altura);
            }
        };

        var obstaculos = {
                _obs: [],
                cores: ["#ffbc1c", "#ff1c1c", "#ff85e1", "#52a7ff", "#78ff5d"],
                tipos: [1, 2, 3, 4], //tipo 1 - certo
                tempoInsere:0,

                insere:function(){
                    this._obs.push({ //adiciona itens no vetor de obstaculos
                        x:5+Math.floor(800*Math.random()),
                        y:0,
                       // largura: 30+ Math.floor(21*Math.random()), //aula3
                        largura:70,
                        altura:70,
                        cor: this.cores[Math.floor(5*Math.random())],
                        tipo: this.tipos[Math.floor(4*Math.random())], 
                    });
                    this.tempoInsere = 30;
                },

                atualiza:function(){
                    if(this.tempoInsere==0){
                        this.insere();
                    }else {
                        this.tempoInsere--;
                    }

                    var colidiuCerto = false;
                    for(var i = 0, tam = this._obs.length; i<tam; i++){

                        var obs = this._obs[i];
                        obs.y+=velocidadeObs;

                        if(bloco.y <= obs.y+obs.altura && obs.x>=bloco.x && obs.x<=bloco.x+bloco.largura && obs.tipo!=1){
                            estadoAtual = estados.perdeu;
                        } else if(bloco.y <= obs.y+obs.altura && obs.x>=bloco.x && obs.x<=bloco.x+bloco.largura && obs.tipo==1){
                            colidiuCerto = true;
                            this._obs.splice(i, 1);
                            tam--;
                            i--;
                            break;

                        }

                        if(obs.y>= ALTURA-obs.altura-chao.altura){
                            this._obs.splice(i, 1);
                            tam--;
                            i--;
                        }
                    }

                    if(colidiuCerto == true){
                        bloco.score++;
                        
                    }
                    
                },

                limpa:function(){ //limpa os objetos para eles nao 'continuarem' quando o jogo eh reiniciado
                    this._obs = [];
                },

                desenha:function(){
                    for(var i = 0, tam = this._obs.length; i<tam; i++){
                    
                        var obs = this._obs[i];
                        if(obs.tipo==1){
                            spriteHD.desenha(obs.x, obs.y);
                            //ctx.fillStyle = "#6f51b0";
                        } else if(obs.tipo==2){
                            spritePendrive.desenha(obs.x, obs.y);
                            //ctx.fillStyle = obs.cor;
                            //ctx.fillRect(obs.x, obs.y, obs.largura, obs.altura);
                        } else if(obs.tipo==3){
                            spriteProcessador.desenha(obs.x, obs.y);
                        } else {
                            spriteWifi.desenha(obs.x, obs.y);
                        }
                        //ctx.fillRect(obs.x, obs.y, obs.largura, obs.altura);
                        
                    }
                }
        };
        
        function clique(evento){
            if(estadoAtual==estados.jogar){
                estadoAtual = estados.jogando;
                bloco.score = 0;
            } else if(estadoAtual==estados.perdeu){
                estadoAtual=estados.jogar;
                obstaculos.limpa();   
            }       
        }

        function mover(evento){
            var key = evento.keyCode;
                
            if(key==37){
                if(bloco.x>0){
                    bloco.x-=20;
                }
                    
            } else if(key==39) {
                if(bloco.x<725){
                    bloco.x+=20;
                }
            }
              
        }
        
        //loop do jogo
        function roda(){
            atualiza();
            desenha();
            window.requestAnimationFrame(roda); //realiza o loop
        }

        //atualizar status personagens, obstaculos etc
        function atualiza(){
            frames++;
            if(estadoAtual==estados.jogando){  
                obstaculos.atualiza();
            } 
        }

        function desenha(){
            //ctx.fillStyle = "#50beff";
           // ctx.fillRect(0,0, LARGURA, ALTURA);
            bg.desenha(0,0);
            //cesta.desenha(bloco.x,bloco.y);

            //score
            ctx.fillStyle = "#84A80F";
            ctx.font = "50px Londrina Solid";
            ctx.fillText(bloco.score, 30, 50);
                
            if(estadoAtual==estados.jogando){
                obstaculos.desenha();
            }

            
            chao.desenha();
            bloco.desenha();

            if(estadoAtual==estados.jogar){
                spriteJogar.desenha(LARGURA/2 - spriteJogar.largura /2, ALTURA/2 - spriteJogar.altura/2-30);
            }
            if(estadoAtual==estados.perdeu){
              spritePerdeu.desenha(LARGURA/2 - spritePerdeu.largura /2, ALTURA/2 - spritePerdeu.altura/2+10);
            }

           
        }

        function main(){
            ALTURA = window.innerHeight;
            LARGURA = window.innerWidth;

            if(LARGURA>=500){
                LARGURA = 854;
                ALTURA = 480;
            }

            canvas  = document.createElement("canvas");
            canvas.width = LARGURA;
            canvas.height = ALTURA;
            canvas.style.border="1px solid #000";

            ctx = canvas.getContext("2d");
            var conteudo = document.getElementById("conteudo");
            conteudo.appendChild(canvas);
            canvas.addEventListener("mousedown", clique);
            document.addEventListener("keydown", mover);

            estadoAtual = estados.jogar;

            img = new Image();
            img.src="imgs/sprites-pegahd.png";
            roda();
        }

        main();
        </script>
        </div>
        <script src="../../../node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="../../../node_modules/popper.js/dist/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.js"></script>
    </body>
</html>
