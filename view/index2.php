<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Index 1</title>
    <!-- Imports para o boostrap funcionar -->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <!-- Import de CSS -->
    <link rel="stylesheet" href="css/estilo2.css">
</head>

<body>
    <div class="container-fluid">

        <div class="cabecalho">
            <button type="button" class="btn botao-login-aluno" id="popover" data-placement="bottom"
                role="button">Aluno</button>
            <a class="btn botao-login-adm" href="pag-login-adm.php" role="button">Administrador</a>
        </div>
        <!-- popover de login de alunos acionado pelo  botao acima -->
        <div id="popover-head" class="d-none titulo-popover">
            <p class="titulo-popover">Login</p>
        </div>
        <div id="popover-content" class="d-none">
            <form>
                <div class="form-group labels-form">
                    <label for="username" class="labels-form">Endereço de email</label>
                    <input type="text" class="form-control" id="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="senha" class="labels-form">Senha</label>
                    <input type="password" class="form-control" id="senha" placeholder="Senha">
                </div>
                <button type="submit" class="btn botao-entrar">Entrar</button>
            </form>
        </div>

        <img src="imgs/LOGO-RISECODE17.png" class="round mx-auto d-block">
    </div>

    </div>

    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/popper.js/dist/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    <script>
    $(function() {
        $('[data-toggle="popover"]').popover()
    })

    $('#popover').popover({
        html: true,
        title: function() {
            return $("#popover-head").html();
        },
        content: function() {
            return $("#popover-content").html();
        }
    });
    </script>
</body>

</html>