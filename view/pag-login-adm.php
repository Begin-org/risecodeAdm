<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>RISECODE - LOGIN</title>
    <!-- Imports para o boostrap funcionar -->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">
    <!-- Import de CSS -->
    <link rel="stylesheet" type="text/css" href="css/estilo-login-adm.css">

</head>

<body>
    <div class="wrapper">
        <img src="imgs/login-com-fundo.png" class="img-login" />
        <div id="content">
            <h1 class="titulo">Acesse sua conta</h1>
            <form class="formulario" name="loginAdm" id="loginAdm" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="input-container">
                        <i class="fa fa-user icon"></i>
                        <select id="" class="form-control inputs" name="txtTipo" id="txtTipo">
                            <option value="0">Selecione o tipo de usuário</option>
                            <option value="1">Administrador</option>
                            <option value="2">Escola</option>
                            <option value="3">Professor</option>
                        </select>
                    </div>

                </div>
                <div class="form-group">
                    <div class="input-container">
                        <i class="fa fa-user icon"></i>
                        <input type="text" class="form-control inputs" name="txtLogin" id="txtLogin"
                            placeholder="Usuário" required />
                    </div>

                </div>
                <div class="form-group">
                    <div class="input-container">
                        <i class="fas fa-lock icon"></i>
                        <input type="password" class="form-control inputs" name="txtSenha" id="txtSenha"
                            placeholder="Senha" required />
                    </div>
                </div>

                <button type="submit" class="btn btn-primary botao">Entrar</button>
            </form>
            <p class="texto-esqueceu"> Esqueceu sua senha? </p>
        </div>

    </div>


    <!-- MODAL PARA FEEDBACK -->
    <?php include "includes/modal-feedback.php" ?>


    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="https://getbootstrap.com/docs/4.1/assets/js/vendor/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="https://kit.fontawesome.com/07afd95a3d.js" crossorigin="anonymous"></script>
    <script src="js/login.js"></script>
    <script src="js/modal.js"></script>
</body>




</html>