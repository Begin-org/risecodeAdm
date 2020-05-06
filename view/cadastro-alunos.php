<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Risecode</title>

    <!-- Imports para o boostrap funcionar -->
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.css">

    <!-- Import de CSS -->
    <link rel="stylesheet" href="../css/estilo-adm.css">

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

            <div id="whiteBox2">
                <div class="form-group cadastro">
                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border">Cadastro de aluno</legend>
                        <div id="conteudoProgresso">
                            <ul id="progressbar">
                                <li class="active" id="passo1"><strong>Passo</strong></li>
                                <li id="passo2"><strong>Passo</strong></li>
                                <li id="passo3"><strong>Passo</strong></li>
                            </ul>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="todosForms">
                            <fieldset class="campos" id="campo1">
                                <form id="form1">
                                    <div class="label-float">
                                        <input type="text" placeholder=" " required />
                                        <label>Nome</label>
                                    </div>
                                    <div class="label-float">
                                        <input type="text" placeholder=" " required />
                                        <label>Foto</label>
                                    </div>
                                    <div class="label-float">
                                        <input type="text" placeholder=" " required />
                                        <label>Usuário</label>
                                    </div>
                                    <div class="label-float">
                                        <input type="text" placeholder=" " required />
                                        <label>Senha</label>
                                    </div>
                                    <div class="label-float">
                                        <input type="text" placeholder=" " required />
                                        <label>RA</label>
                                    </div>
                                    <div class="label-float">
                                        <input type="text" placeholder=" " />
                                        <label>Turma</label>
                                    </div>
                                </form>
                            </fieldset>

                            <fieldset class="campos" id="campo2">
                                <form id="form2">
                                    <div class="label-float">
                                        <input type="text" placeholder=" " />
                                        <label>Placeholder</label>
                                    </div>
                                    <div class="label-float">
                                        <input type="text" placeholder=" " />
                                        <label>Placeholder</label>
                                    </div>
                                    <div class="label-float">
                                        <input type="text" placeholder=" " required />
                                        <label>Placeholder</label>
                                    </div>
                                    <div class="label-float">
                                        <input type="text" placeholder=" " />
                                        <label>Placeholder</label>
                                    </div>
                                    <div class="label-float">
                                        <input type="text" placeholder=" " />
                                        <label>Placeholder</label>
                                    </div>
                                    <div class="label-float">
                                        <input type="text" placeholder=" " />
                                        <label>Placeholder</label>
                                    </div>
                                </form>
                            </fieldset>

                            <fieldset class="campos" id="campo3">
                                <form id="form3">
                                    <div class="label-float">
                                        <input type="text" placeholder=" " />
                                        <label>Placeholder</label>
                                    </div>
                                    <div class="label-float">
                                        <input type="text" placeholder=" " />
                                        <label>Placeholder</label>
                                    </div>
                                    <div class="label-float">
                                        <input type="text" placeholder=" " required />
                                        <label>Placeholder</label>
                                    </div>
                                    <div class="label-float">
                                        <input type="text" placeholder=" " />
                                        <label>Placeholder</label>
                                    </div>
                                    <div class="label-float">
                                        <input type="text" placeholder=" " />
                                        <label>Placeholder</label>
                                    </div>
                                    <div class="label-float">
                                        <input type="text" placeholder=" " />
                                        <label>Placeholder</label>
                                    </div>
                                </form>
                            </fieldset>


                            <div class="aviso">
                                <strong>Campos com asterísco (*) são obrigatórios</strong>
                            </div>
                            <div id="botoesForm">
                                <button type="button" class="btn btn-danger btnForm previous" value="Previous"
                                    name="previous" id="previous"> ◄◄ Anterior</button>
                                <button type="button" class="btn btn-success btnForm next" value="Next" name="next"
                                    id="next">Próximo ►►</button>
                            </div>
                        </div>

                    </fieldset>
                </div>
            </div>


        </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-sm modal-dialog-centered">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" style="text-align: center;">
                    <img src="imgs/successful.png" / style="display: none;" id="successful" class="fe-pulse" />
                    <img src="imgs/error.png" style="display: none;" id="error" class="fe-pulse" />
                    <h4 id="conteudoModal" style="margin-top:1rem;" class="fe-pulse"></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../../node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="../../node_modules/popper.js/dist/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="../js/menu.js"></script>
    <script src="../js/steps.js"></script>

</body>

</html>