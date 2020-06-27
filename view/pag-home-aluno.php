<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Risecode</title>

        <!-- Imports para o boostrap funcionar -->
        <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">

        <!-- Import de CSS -->
        <link rel="stylesheet" href="css/estilo-aluno.css">

        <!-- Imports de FontAwesome para os icones dinamicos de menu funcionarem -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    </head>
    <!--confere se tem permissao para ver essa pagina-->
<?php require_once "includes/esta-logado.php" ?>
    <body>
        <!-- Modal de perfil -->
        <div class="modal fade" id="modalPerfil" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content modal-content-perfil">
                    <h4 class="titulo-modal-perfil">Perfil</h4>
                    <div class="col-12">
                        <img src="./imgs/girl-modal.png" class="avatar-modal">
                    </div>
                    <div class="col-12">
                        <span class="badge badge-nome">Nome do aluno</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="cabecalho">
            <a class="" href="#">
                <img src="./imgs/LOGO-RISECODE2.png" class="icon-risecode-header" alt="">
            </a>
            <p class="texto-perfil-header" data-toggle="modal" data-target="#modalPerfil">Perfil</p>
        </div>
        <div class="container-fluid conteudo">
            <a href="jogos/pegahd/jogo-pegahd.php">
                <div class="card" style="width: 18rem; height: 14rem; cursor:pointer;">
                    <img class="card-img-top" style="height: 9rem;" src="./imgs/jogohd.png" alt="Imagem de capa do card">
                    <div class="card-body">
                        <p class="card-text">Pegue HD's e fuja de outros componentes.</p>
                    </div>
                </div>
            </a>
            <div class="card" style="width: 18rem; height: 14rem;">
                <img class="card-img-top" style="height: 9rem;" src="./imgs/jogohd.png" alt="Imagem de capa do card">
                <div class="card-body">
                    <p class="card-text">Pegue HD's e fuja de outros componentes.</p>
                </div>
            </div>
            <div class="card" style="width: 18rem; height: 14rem;">
                <img class="card-img-top" style="height: 9rem;" src="./imgs/jogohd.png" alt="Imagem de capa do card">
                <div class="card-body">
                    <p class="card-text">Pegue HD's e fuja de outros componentes.</p>
                </div>
            </div>
            
           
            <!--
            <div class="card text-center" style="width: 12rem; height:13rem;">
                <img class="card-img-top" src="./imgs/jogo1.jpg" alt="Imagem de capa do card">
                <div class="card-body">
                  <a href="#" class="btn btn-card-jogar"></a>
                </div>
              </div>
            

              <div class="card card-jogo text-center">
                    <img class="card-img-top img-card-jogo" src="./imgs/jogo4.png" alt="Imagem de capa do card">
                    <div class="card-body">
                        <img src="./imgs/0-estrelas.png" class="estrelas-card">
                        <a href="#" class="btn btn-card-jogar"></a>
                    </div>
               </div>

              <div class="card card-jogo text-center">
                    <img class="card-img-top img-card-jogo" src="./imgs/jogo4.png" alt="Imagem de capa do card">
                    <div class="card-body">
                        <img src="./imgs/1-estrelas.png" class="estrelas-card">
                        <a href="#" class="btn btn-card-jogar"></a>
                    </div>
               </div>
			   
			   <div class="card card-jogo text-center">
                    <img class="card-img-top img-card-jogo" src="./imgs/jogo3.png" alt="Imagem de capa do card">
                    <div class="card-body">
                        <img src="./imgs/2-estrelas.png" class="estrelas-card">
                        <a href="#" class="btn btn-card-jogar"></a>
                    </div>
               </div>

			   <div class="card card-jogo text-center">
                    <img class="card-img-top img-card-jogo" src="./imgs/jogo4.png" alt="Imagem de capa do card">
                    <div class="card-body">
                        <img src="./imgs/3-estrelas.png" class="estrelas-card">
                        <a href="#" class="btn btn-card-jogar"></a>
                    </div>
               </div>
              
               
            -->

        </div>
    <script src="../node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="../node_modules/popper.js/dist/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
    </body>
</html>