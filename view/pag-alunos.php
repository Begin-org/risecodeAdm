<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Risecode</title>

    <!-- Imports para o boostrap funcionar -->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">

    <!-- Import de CSS -->
    <link rel="stylesheet" href="css/estilo-adm.css">

    <!-- Imports de FontAwesome para os icones dinamicos de menu funcionarem -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>

</head>
<?php
session_start();
if (empty($_SESSION['logado']))
{
    header("Location:index1.php");
}
?>

<body>
    <div class="wrapper">

        <!-- Sidebar Holder -->
        <?php include "includes/menu-lateral.php" ?>

        <!-- Page Content Holder -->
        <div id="content">

            <!-- MENU DE CIMA -->

            <?php include "includes/menu-de-cima.php" ?>


            <?php include "includes/cabecalho.php" ?>


            <div class="card card-estilizado d-inline-block center-block">
                <div class="card-header header-card-estilizado"><img src="imgs/img-user.jpg"
                        class="mx-auto d-block img-card"></div>
                <div class="card-body">
                    <h5 class="card-title text-center title-card-estilizado">Fulano de tal</h5>
                    <div class="mx-auto d-block label-aluno">
                        <img src="imgs/users.png" /> Aluno
                    </div>
                    <div class="mx-auto d-block" style="margin-top:20px;">
                        <button type="button" class="btn botao-card">
                            <p>Editar</p>
                        </button>
                        <button type="button" class="btn botao-card">
                            <p>Excluir</p>
                        </button>
                    </div>

                </div>
                <div class="card-footer footer-card-estilizado">Ver perfil</div>
            </div>

            <div class="card card-estilizado d-inline-block center-block">
                <div class="card-header header-card-estilizado"><img src="imgs/img-user.jpg"
                        class="mx-auto d-block img-card"></div>
                <div class="card-body">
                    <h5 class="card-title text-center title-card-estilizado">Fulano de tal</h5>
                    <div class="mx-auto d-block label-aluno">
                        <img src="imgs/users.png" /> Aluno
                    </div>
                    <div class="mx-auto d-block" style="margin-top:20px;">
                        <button type="button" class="btn botao-card">
                            <p>Editar</p>
                        </button>
                        <button type="button" class="btn botao-card">
                            <p>Excluir</p>
                        </button>
                    </div>

                </div>
                <div class="card-footer footer-card-estilizado">Ver perfil</div>
            </div>

            <div class="card card-estilizado d-inline-block center-block">
                <div class="card-header header-card-estilizado"><img src="imgs/img-user.jpg"
                        class="mx-auto d-block img-card"></div>
                <div class="card-body">
                    <h5 class="card-title text-center title-card-estilizado">Fulano de tal</h5>
                    <div class="mx-auto d-block label-aluno">
                        <img src="imgs/users.png" /> Aluno
                    </div>
                    <div class="mx-auto d-block" style="margin-top:20px;">
                        <button type="button" class="btn botao-card">
                            <p>Editar</p>
                        </button>
                        <button type="button" class="btn botao-card">
                            <p>Excluir</p>
                        </button>
                    </div>

                </div>
                <div class="card-footer footer-card-estilizado">Ver perfil</div>
            </div>
        </div>
    </div>
    </div>

    <script src="../node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="../node_modules/popper.js/dist/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="js/menu.js"></script>

</body>

</html>