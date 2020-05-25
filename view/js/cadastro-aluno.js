//configuracoes do input file, deixar aqui fora pra funcionar
$(":file").filestyle();
$(":file").filestyle('btnClass', 'btn-primary');
$(":file").filestyle('placeholder', 'Nenhuma foto selecionada');
$(".buttonText").html('Escolher foto');

let aluno; //se for edicao, essa variavel vai pegar do localstorage

//CADASTRO e EDICAO
$('#formAluno').submit(function (e) { //id do formulário
    e.preventDefault();

    var formData = new FormData(this); //dados do formulario

    let url;

    if(aluno==null || aluno==undefined){
        url = '../control/cadastrar-aluno.php';
    }else{
        url = '../control/editar-aluno.php';
        formData.append("fotoAnterior", aluno[0].foto); //se o usuario nao mudar a foto, manda o nome da foto atual
        formData.append("idAluno", aluno[0].idAluno); //precisa do id do aluno pra editar
        formData.append("idUsuario", aluno[0].idUsuario); //precisa do id do usuario pra editar
    }

    $.ajax({
        url: url, //pagina que vai direcionar para o dao
        dataType: 'html', //tipo de dado que vai retornar
        type: 'POST', //o tipo que esta mandando eh post
        data: formData,//manda os dados do formulario
        success: function (data) { // caso de certo ele pega a resposta (echo do php)
            if (data == "Dados cadastrados com sucesso!" || data == "Dados editados com sucesso!") {
                mostrarModalSucesso(data);
                $('#feedback').on('hidden.bs.modal', function () {
                    document.location.href = "pag-alunos.php";
                });
                setTimeout(() => { document.location.href = "pag-alunos.php"; }, 6000);
            } else {
                mostrarModalErro(data);
            }
        },
        //parte que permite foto   
        cache: false,
        contentType: false, //fala pro jquery nao setar o content type
        processData: false, //fala pro jquery nao processar os dados
        xhr: function () {  // XMLHttpRequest customizado
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                myXhr.upload.addEventListener('progress', function () {
                    /* faz alguma coisa durante o progresso do upload */
                }, false);
            }
            return myXhr;
        }
    });

});


$(document).ready(function () {
    //pega o aluno no localstorage, se nao for edicao entao aqui vem nulo
    aluno = JSON.parse(localStorage.getItem('edicaoAluno'));

    //preencher o select de turmas
    $.ajax({
        url: '../control/preencher-select-turma.php', //pagina que vai direcionar para o dao
        data: "",
        type: 'POST', //define que o tipo que ta sendo enviado eh post
        dataType: "json", //define que o tipo que ta sendo retornado eh json, nesse caso ta retornando as linhas da tabelas previamente ja escritas
        success: function (data) { // caso de certo ele pega a resposta (echo do php)
            for (let i = 0; i < data.length; i++) { //faz iteracao no json
                let linhaAtual = data[i];
                $("select[name=turmas]").append(new Option(linhaAtual.descricao, linhaAtual.idTurma)); //adiciona uma nova opcao no select (texto,valor)
            }
            $("select[name=turmas] option").css("color", "rgb(26, 37, 82)");
        }
        //usa o then pra executar esse trecho de codigo so depois que o anterior for terminado, senao vai dar problema no select
    }).then(function() {
        //se aluno não for null eh edicao
        if(aluno!=null){ 
            //preenche os campos com as informacoes cadastradas         
            $("#tituloBorda").text("Edição de aluno");
            $("#txtNome").val(aluno[0].nome);
            $(":file").filestyle('placeholder', aluno[0].foto);
            $("#txtRa").val(aluno[0].ra);
            $("#txtUsuario").val(aluno[0].usuario);
            $("#txtSenha").val(aluno[0].senha);
            //coloca dentro de uma function senao vai dar problemas na atualizacao do select
            $(function(){
                $("select[name=turmas]").val(aluno[0].idTurma);
            });
        }
      //usa o then pra executar esse trecho de codigo so depois que o anterior for terminado
      //colocando depois da execucao do codigo anterior pra deixar as cores certas, senao vai deixar baguncado
    }).then(function(){
        //esse trecho de codigo deixa a primeira opcao do select vermelha, para o usuario saber que tem que selecionar as opcoes abaixo
        if ($('select[name=turmas]')[0].selectedIndex === 0) {
            $("select[name=turmas]").css("color", "red");
        } else {
            $("select[name=turmas]").css("color", "rgb(26, 37, 82)");
        }
        $('select[name=turmas]').change(function () {
            if ($(this).children('option:first-child').is(':selected')) {
                $("select[name=turmas]").css("color", "red");
                $("select[name=turmas] option").css("color", "rgb(26, 37, 82)");
            } else {
                $("select[name=turmas]").css("color", "rgb(26, 37, 82)");
            }
        });
    });

});

//remove o item do local storage se sair dessa pagina
$(window).bind('beforeunload', function () {
    localStorage.removeItem('edicaoAluno');
});




