//se clicar no botao de novo
$("#novo").click(function () {
    location.replace("cadastro-aluno.php"); //vai pra tela de cadastro
});

$(document).ready(function () {
    $('#pesquisaTabela').attr('placeholder','Pesquise pelo nome ou RA do aluno');
    $.ajax({
        url: '../control/consultar-aluno.php', //pagina que vai direcionar para o dao
        data: "",
        type: 'POST', //define que o tipo que ta sendo enviado eh post
        dataType: "json", //define que o tipo que ta sendo retornado eh json, nesse caso ta retornando as linhas da tabelas previamente ja escritas
        success: function (data) { // caso de certo ele pega a resposta (echo do php)
            $("#conteudoCards").empty();
            for (let i = 0; i < data.length; i++) { //faz iteracao no json
                let cardAtual = data[i];
                $("#conteudoCards").append(cardAtual);
            }
        }
    });
});

//se pesquisa as turmas na barra de pesquisa
function pesquisar() {
    $("#tabelaTurmas td").parent().remove(); //remove os rows para atualizar em tempo real com os novos enquanto digita
    let texto = document.getElementById('pesquisaTabela').value; //pega o texto atual da barra de pesquisa
    $.ajax({
        url: '../control/consultar-aluno.php', //pagina que vai direcionar para o dao
        data: { "txtNome": texto }, //o que foi digitado na barra de pesquisa
        type: 'POST', //define que o tipo que ta sendo enviado eh post
        dataType: "json", //define que o tipo que ta sendo retornado eh json, nesse caso ta retornando as linhas da tabelas previamente ja escritas
        success: function (data) { // caso de certo ele pega a resposta (echo do php)
            $("#conteudoCards").empty();
            for (let i = 0; i < data.length; i++) { //faz iteracao no json
                let cardAtual = data[i];
                $("#conteudoCards").append(cardAtual);
            }
        }
    });
}


$(document).on('click', '.verPerfil', function () {
    let idAluno = $(this).parent().attr("id"); //pega o id da div que eh pai da div onde o click disparou
    $.ajax({
        url: '../control/consultar-aluno-especifico.php', //pagina que vai direcionar para o dao
        data: {"idAluno":idAluno},
        type: 'POST', //define que o tipo que ta sendo enviado eh post
        dataType: "json", //define que o tipo que ta sendo retornado eh json, nesse caso ta retornando as linhas da tabelas previamente ja escritas
        success: function (data) { // caso de certo ele pega a resposta (echo do php)
            $('#imgAlunoModal').html(`<img src='uploads/${data[0].foto}' class='img-fluid' alt=''>`);
            $('#nome').text(data[0].nome);
            $('#ra').text(`RA: ${data[0].ra}`);
            $('#usuario').text(`Usuário: ${data[0].usuario}`);
            $('#serie').text(data[0].turma);
            $('#myModal').modal('show');
        }
    });
});

$(document).on('click', '.excluir', function () {
    let idAluno = $(this).parent().parent().parent().attr("id"); //parent pega o nome da div em que essa ta dentro e attr pega o nome do que voce precisa (id nesse caso)
    let nomeAluno = $(this).parent().parent().find("h5").text(); //find encontra o elemento desejado que tem na div em questao
    mostrarModalConfirmacao("Tem certeza que deseja excluir o aluno " + nomeAluno + "?");

    $('#btnConfirmarModal').click(function () {
        $.ajax({
            url: '../control/excluir-aluno.php', //pagina do controller que vai direcionar para o dao
            data: { "idAluno": idAluno }, //manda o id do aluno pro arquivo no controller
            type: 'POST', //define que o tipo que ta sendo enviado eh post
            dataType: "html", //define que o tipo que ta sendo retorno eh html, para poder injetar no modal a resposta
            success: function (data) { // caso de certo ele pega a resposta (echo do php)
                $('#feedback').on('hidden.bs.modal', function () { //se o modal for fechado
                    document.location.reload(true); //recarrega a pagina para ver as alteracoes
                });
            }
        });
    });
});

$(document).on('click', '.editar', function () {
    let idAluno = $(this).parent().parent().parent().attr("id"); //parent pega o nome da div em que essa ta dentro e attr pega o nome do que voce precisa (id nesse caso)
    $.ajax({
        url: '../control/consultar-aluno-especifico.php', //pagina que vai direcionar para o dao
        data: {"idAluno":idAluno},
        type: 'POST', //define que o tipo que ta sendo enviado eh post
        dataType: "json", //define que o tipo que ta sendo retornado eh json, nesse caso ta retornando as linhas da tabelas previamente ja escritas
        success: function (data) { // caso de certo ele pega a resposta (echo do php)
            localStorage.setItem('edicaoAluno', JSON.stringify(data)); //guarda o aluno no localstorage pra pegar no outro arquivo js
            location.replace("cadastro-aluno.php"); //vai pra tela de cadastro
        }
    });
});



