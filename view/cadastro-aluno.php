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

            <div id="whiteBox2">
                <div class="form-group cadastro">
                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border" id="tituloBorda">Cadastro de aluno</legend>

                        <div class="todosForms">

                            <!-- PRIMEIRO FORMULARIO -->
                            <fieldset class="campos">
                                <form id="formAluno" name="formAluno" method="post" enctype="multipart/form-data">
                                    <div class="label-float">
                                        <input type="text" placeholder=" " name="txtNome" id="txtNome" required />
                                        <label>Nome</label>
                                    </div>
                                    <div class="label-float-file">
                                        <input type="file" class="filestyle" name="fotoUpload" id="fotoUpload"/>
                                    </div>
                                    <div class="label-float">
                                        <input type="text" placeholder=" " name="txtRa" id="txtRa" required />
                                        <label>RA</label>
                                    </div>
                                    <div class="label-float">
                                        <select class="form-control" id="select" name="turmas">
                                            <option value="0">*Selecione a turma</option>
                                        </select>
                                    </div>
                                    <div class="label-float">
                                        <input type="text" placeholder=" " id="txtUsuario" name="txtUsuario" required />
                                        <label>Usuário</label>
                                    </div>
                                    <div class="label-float">
                                        <input type="password" placeholder=" " id="txtSenha" name="txtSenha" required />
                                        <label>Senha</label>
                                    </div>

                                    <div class="aviso">
                                        <strong>Campos com asterísco (*) são obrigatórios</strong>
                                    </div>
                                    <div id="botoesForm">
                                        <button type="submit" class="btn btn-success btnForm next">Concluir</button>
                                    </div>
                                </form>
                            </fieldset>
                        </div>

                    </fieldset>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL PARA FEEDBACK -->
    <?php include "includes/modal-feedback.php" ?>

    <script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/popper.js/dist/popper.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="js/menu.js"></script>
    <script src="js/modal.js"></script>
    <script type="text/javascript"
        src="../node_modules/bootstrap/bootstrap-filestyle-2.1.0/src/bootstrap-filestyle.min.js"> </script>
    <script src="../node_modules/bootstrap/bootstrap-filestyle-2.1.0/bootstrap-filestyle.jquery.json"> </script>
    <script src="js/cadastro-aluno.js"></script>

</body>

</html>