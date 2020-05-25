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
                        <legend class="scheduler-border">Cadastro exemplo</legend>

                        <!-- MOSTRA QUANTOS PASSOS TEM E QUAL O PASSO ATUAL -->
                        <div id="conteudoProgresso">
                            <ul id="progressbar">
                                <li class="active" id="passo1"><strong>Passo</strong></li>
                                <li id="passo2"><strong>Passo</strong></li>
                                <li id="passo3"><strong>Passo</strong></li>
                            </ul>
                        </div>

                        <!-- BARRA DE PROGRESSO DAS ETAPAS DO FORMULARIO -->
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                        <div class="todosForms">
                        
                             <!-- PRIMEIRO FORMULARIO -->
                            <fieldset class="campos" id="campo1">
                                <form id="form1">
                                    <div class="label-float">
                                        <input type="text" placeholder=" " required />
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
                                    <div class="label-float">
                                        <input type="text" placeholder=" " />
                                        <label>Placeholder</label>
                                    </div>
                                </form>
                            </fieldset>

                             <!-- SEGUNDO FORMULARIO -->
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

                             <!-- TERCEIRO FORMULARIO -->
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

    <!-- MODAL PARA FEEDBACK -->
    <?php include "includes/modal-feedback.php" ?>

    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/popper.js/dist/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/menu.js"></script>
    <script src="js/steps.js"></script>
    <script src="js/modal.js"></script>

</body>

</html>