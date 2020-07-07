<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Risecode</title>

    <!-- Imports para o boostrap funcionar -->
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.css">

    <!-- Import de CSS -->
    <link rel="stylesheet" href="estilo-conjuntos.css">

    <!-- Imports de FontAwesome para os icones dinamicos de menu funcionarem -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>

    <script src="sprite-conjuntos.js"></script>
</head>

<body>
    <!-- Modal de perfil -->
    <div class="modal fade" id="modalPerfil" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content modal-content-perfil">
                <h4 class="titulo-modal-perfil">Perfil</h4>
                <div class="col-12">
                    <img src="../../imgs/girl-modal.png" class="avatar-modal">
                </div>
                <div class="col-12">
                    <span class="badge badge-nome">Nome do aluno</span>
                </div>
            </div>
        </div>
    </div>
    <div class="cabecalho">
            <a class="" href="../../pag-home-aluno.php">
                <img src="../../imgs/LOGO-RISECODE2.png" class="icon-risecode-header" alt="">
            </a>
            <p class="texto-perfil-header" data-toggle="modal" data-target="#modalPerfil">Perfil</p>
    </div>

    <div class="conteudo container-fluid">
        <div class="listas">
            <p>Salmão: Mouse, Placa Mãe, Disco Rígido</p>
            <p>Azul: Teclado, Mouse</p>
        </div>
        <div class="game">
            <div class="avisos">
                <img src="imgs/play.png" id="play" onclick="jogar()"/>
                <img src="imgs/perdeu.png" id="perdeu" onclick="jogar()"/>
                <a class="" href="jogo-conjuntos.php"><img src="imgs/ganhou.png" id="ganhou"></a>
            </div>
            <div class="jogo">
                <img src="imgs/Disk_pack1.svg" id="gate" class="droppable gate">
                <img src="imgs/Disk_pack1.svg" id="gate2" class="droppable gate">

                <img src="imgs/1488543.svg" id="ball" class="ball">
                <img src="imgs/62831-computer-mouse-icon.png"
                    id="ball2" class="ball">
                <img src="imgs/62829-keyboard-icon.png" id="ball3"
                    class="ball">
                <img src="imgs/clipart-hard-drive-9.png" id="ball4" class="ball">
                <button class="btn btn-primary espaco" id="terminar" onclick="terminar()">Terminei!</button>
            </div>
        </div>
    </div>

    <script src="jogo.js"></script>
    <script src="../../../node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="../../../node_modules/popper.js/dist/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>

</html>