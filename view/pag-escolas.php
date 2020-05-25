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
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" data-auto-replace-svg></script>
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

            <div class="table-responsive-sm table-responsive-md">
                <table class="table mx-auto table-hover table-responsive-sm table-responsive-md table-estilizada">
                    <thead class="thead-estilizada">
                        <tr class="sweep-to-right2">
                            <th scope="col" style="width:45%;">Nome da escola</th>
                            <th scope="col" style="width:12%;">Professores</th>
                            <th scope="col" style="width:12%;">Alunos</th>
                            <th scope="col" style="width:12%;">Telefones</th>
                            <th scope="col" style="width:10%;"></th>
                            <!--visualizar-->
                            <th scope="col" style="width:4%;"></th>
                            <!--editar-->
                            <th scope="col" style="width:4%;"></th>
                             <!--excluir-->
                            <th scope="col" style="width:4%;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="sweep-to-right">
                            <td scope="row">Nome genérico</td>
                            <td>12</td>
                            <td>500</td>
                            <td>
                                <select class="form-control inputs">
                                    <option>
                                        11 1111-1111
                                    </option>
                                    <option>
                                        11 2222-222
                                    </option>
                                </select>
                            </td>
                            <td></td>
                            <td> <i class="fas fa-eye icons-table"></i></td>
                            <td><i class="fas fa-pen icons-table"></i></td>
                            <td><i class="fas fa-trash icons-table"></i></td>
                        </tr>
                        <tr class="sweep-to-right">
                            <td scope="row">Nome aleatório</td>
                            <td>18</td>
                            <td>215</td>
                            <td>
                                <select class="form-control inputs">
                                    <option>
                                        11 1111-1111
                                    </option>
                                    <option>
                                        11 2222-222
                                    </option>
                                </select>
                            </td>
                            <td></td>
                            <td><i class="fas fa-eye icons-table"></i></td>
                            <td><i class="fas fa-pen icons-table"></i></td>
                            <td><i class="fas fa-trash icons-table"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/popper.js/dist/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/menu.js"></script>
    <script src="js/modal.js"></script>
</body>

</html>