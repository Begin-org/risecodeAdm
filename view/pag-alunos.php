<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Risecode</title>

    <!-- Imports para o boostrap funcionar -->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">

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
<!--confere se tem permissao para ver essa pagina-->
<?php require_once "includes/esta-logado.php" ?>

<body>
    <div class="wrapper">

        <!-- MENU LATERAL -->
        <?php include "includes/menu-lateral.php" ?>

        <!-- Page Content Holder -->
        <div id="content">

            <!-- MENU DE CIMA -->
            <?php include "includes/menu-de-cima.php" ?>

            <!-- CABECALHO DA TABELA -->
            <?php include "includes/cabecalho.php" ?>

            <div class="container" id="conteudoCards"></div>

        </div>
    </div>

    <!-- MODAL PARA FEEDBACK -->
    <?php include "includes/modal-feedback.php" ?>

    <!-- MODAL PARA CONSULTA -->
    <div id="myModal" class="modal fade" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Consulta de aluno</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-5" id="imgAlunoModal">
                        </div>
                        <div class="col-7">
                            <h4 id="nome"></h4>
                            <h6 id="ra"></h6>
                            <h6 id="usuario"></h6>
                            <h6 id="serie"></h6>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="../node_modules/jquery/dist/jquery.min.js"></script>
        <script src="../node_modules/popper.js/dist/popper.min.js"></script>
        <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="js/menu.js"></script>
        <script src="js/modal.js"></script>
        <script src="js/aluno.js"></script>
</body>

</html>