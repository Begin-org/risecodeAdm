<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Risecode</title>

    <!-- Imports para o boostrap funcionar -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">

    <!-- Import de CSS -->
    <link rel="stylesheet" href="css/estilo-configuracoes.css">

    <!-- Imports de FontAwesome para os icones dinamicos de menu funcionarem -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>
<body>
    <div class="wrapper">
        
        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light menu-horizontal">
                <div class="container-fluid">
                <a class="navbar-brand" href="#">
                            <img src="LOGO-RISECODE-original.png" width="70" height="50" alt="">
                        </a>
                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="background-color:rgb(255, 255, 255);">
                        
                            <ul class="nav navbar-nav md-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#" class="navbar-sair">Configurações do sistema</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Configurações do perfil</a>
                                </li>
                                
                            </ul>

                            <ul class="nav navbar-nav ml-auto">
                            <button type="button" class="btn btn-outline-primary btn-voltar">Voltar ao sistema</button>
                            </ul>
                    </div>

                </div>
            </nav>
            
            <h3> Configurações do Sistema </h3>
        </div>
    </div>    

  <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
  <script src="node_modules/popper.js/dist/popper.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
  
</body>
</html>
