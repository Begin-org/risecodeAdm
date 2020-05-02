<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Risecode</title>

    <!-- Imports para o boostrap funcionar -->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">

    <!-- Import de CSS -->
    <link rel="stylesheet" href="estilo-adm.css">

    <!-- Imports de FontAwesome para os icones dinamicos de menu funcionarem -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>
<?php
session_start();
if (empty($_SESSION['logado']))
{
    header("Location:index1.html");
}
?>
<body>
    <div class="wrapper">
        
        <!-- Sidebar Holder -->
        <?php include "menuLateral.php" ?>

        <!-- Page Content Holder -->
        <div id="content">

         <!-- MENU DE CIMA -->

         <?php include "menuDeCima.php" ?>
            
            <div class="table-responsive-sm table-responsive-md">
                <table class="table mx-auto table-hover table-responsive-sm table-responsive-md table-estilizada">
                    <thead class="thead-estilizada">
                        <tr class="sweep-to-right2">
                            <th scope="col" style="width:45%;">Nome da escola</th>
                            <th scope="col" style="width:12%;">Professores</th>
                            <th scope="col" style="width:12%;">Alunos</th>
                            <th scope="col" style="width:12%;">Telefones</th>
                            <th scope="col" style="width:10%;"></th>
                            <th scope="col" style="width:4%;"></th>
                            <th scope="col" style="width:4%;"></th><!--editar-->
                            <th scope="col" style="width:4%;"></th><!--excluir-->
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr class="sweep-to-right">
                            <th scope="row">Nome genérico</th>
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
                            <td><img src="imgs/interface.png" class="btns-table"/></td>
                            <td><img src="imgs/img-edit.png" class="btns-table"/></td>
                            <td><img src="imgs/img-delete.png" class="btns-table"/></td>
                        </tr>
                        <tr class="sweep-to-right">
                            <th scope="row">Nome aleatório</th>
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
                            <td><img src="imgs/interface.png" class="btns-table"/></td>
                            <td><img src="imgs/img-edit.png" class="btns-table"/></td>
                            <td><img src="imgs/img-delete.png" class="btns-table"/></td>
                        </tr>

                    </tbody>
                </table>
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
