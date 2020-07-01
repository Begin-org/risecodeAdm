<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Risecode</title>
    <!-- Imports para o boostrap funcionar -->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <!-- Import de CSS -->
    <link rel="stylesheet" href="css/estilo1.css">
    <!-- ESTILO FONT AWESOME-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Compiled and minified CSS MATERIALIZE-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>

<body>
<div class="container-fluid container-especializado">
  <div class="fixed-action-btn">
    <a class="btn-floating btn-large botao-fab">
      <i class="fa fa-question" id="icone-fab"></i>
    </a>
    <ul>
      <li><a class="btn-floating blue darken-4"><i class="fa fa-facebook fa-2x"></i></a></li>
      <li><a class="btn-floating blue"><i class="fa fa-twitter fa-2x"></i></a></li>
      <li><a class="btn-floating red darken-2"><i class="fa fa-youtube fa-2x"></i></a></li>
    </ul>
  </div>

  <div class="cabecalho">
    <a class="botao-login-adm" href="pag-login-adm.php" role="button">Administrador</a>
  </div>
  <div class="d-flex flex-wrap flex-row justify-content-center">
    <div class="col-12 d-flex justify-content-center">
    <img src="imgs/logo-site.png" alt="..."></div>
    <a data-toggle="collapse" href="#collapseLogin" role="button" aria-expanded="false" aria-controls="collapseLogin">
      <img src="imgs/botao-site.png" class="botao-jogar">
  </a>
  </div>
	<div class="chao"></div>
	<div class="content-chao">
    
    <div class="collapse" id="collapseLogin">
      <p class="titulo-login-aluno">Faça login</p>
      <div class="login-aluno row d-flex justify-content-center">  
        <form name="loginAluno" id="loginAluno" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <input type="hidden" id="tipoUsuario" name="txtTipo" value="4">
            <label for="loginAluno" class="labels-forms-login">Login</label>
            <input type="text" class="forms-login" id="txtLogin" placeholder="" name="txtLogin"> 
          </div>
          <div class="form-group form-group-personalizado">
            <label for="senhaAluno" class="labels-forms-login">Senha</label>
            <input type="password" class="forms-login" id="txtSenha" placeholder="" name="txtSenha">
          </div>
          <input type="submit" class="botao-form-login" value="Entrar">
        </form>
      </div>
    </div>

		<div class="content-video" id="content-video">
      <iframe class="content-video" src="https://www.youtube.com/embed/8x8snCopCpc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <div class="titulo-oque">
      O QUE É RISECODE?
    </div>
    <div class="content-para-alunos">
      <img src="imgs/girl-oque-e.png" class="girl-oque-e"/>
      <p class="titulo-para-alunos"> </p>
      <ul>
        <li class="estilo-li"><img src="imgs/topico1.png"> &nbsp Uma plataforma de jogos educativos.</li>
        <li class="estilo-li" style="margin-left:8vw;"><img src="imgs/topico2.png"> &nbsp Diversos mini-jogos voltados para lógica e informática.</li>
        <li class="estilo-li"><img src="imgs/topico1.png">  &nbsp Um jeito divertido de aprender.</li>
      </ul>
    </div>
    <div class="content-para-profes">
      <img src="imgs/boy-oque-e.png" class="boy-oque-e"/>
      <p class="titulo-para-alunos"> </p>
      <ul>
        <li class="estilo-li"><img src="imgs/topico1.png"> &nbsp Um sistema administrativo integrado a plataforma de jogos.</li>
        <li class="estilo-li" style="margin-left:8vw;"><img src="imgs/topico2.png"> &nbsp Professores podem acompanhar desempenho de alunos.</li>
        <li class="estilo-li"><img src="imgs/topico1.png">  &nbsp Escolas podem ensinar de uma forma descontraída.</li>
      </ul>
    </div>
  </div>
    <footer class="footer">Desenvolvido por <br><img src="imgs/logos-titulos-begin-branco.png"></footer> 
  </div>

    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/popper.js/dist/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/login.js"></script>
    <script src="js/modal.js"></script>

    <!-- MODAL PARA FEEDBACK -->
    <?php include "includes/modal-feedback.php" ?>
      <!-- Compiled and minified JavaScript MATERIALIZE-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
          
          <script>
              document.addEventListener('DOMContentLoaded', function() {
          var elems = document.querySelectorAll('.fixed-action-btn');
          var instances = M.FloatingActionButton.init(elems, {
            direction: 'top',
            hoverEnabled: false
          });
        });
      
        $(function(){
          $("#icone-fab").mouseenter(function(){
              document.getElementById('icone-fab').classList.remove('fa-at');
              document.getElementById('icone-fab').classList.add('fa-times');
          });
      
          $("#icone-fab").mouseout(function(){
              document.getElementById('icone-fab').classList.remove('fa-times');
              document.getElementById('icone-fab').classList.add('fa-desktop');
          });
      });
      
      </script>
</body>

</html>