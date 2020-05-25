//serve para saber se eh edicao ou exclusao
let funcaoAtual = null;
//serve para editar a turma posteriormente
let edicaoIdTurma = 0;
let edicaoTurma = null;

//se clicar no botao de novo
$("#novo").click(function () {
    $('#textoTituloModal').html("Cadastro de turma"); //muda o titulo do modal
    $('input[name=txtDescricao]').val(""); //o campo deve aparecer vazio
    $('#myModal').modal('show'); //mostra o modal para cadastrar
    funcaoAtual = "cadastro";
});

//se clicar no botao de edicao
$(document).on('click', '.fa-pen', function () { //se clicar em algum icone de lapis
    $('#textoTituloModal').html("Alteração de turma"); //muda o titulo do modal
    edicaoIdTurma = $(this).closest("tr").attr("id"); //pega a linha da tabela mais proxima do icone de lapis que foi clicado e pega o id dessa linha 
    edicaoTurma = $(this).closest("tr").text(); //pega o texto (descricao da turma) que contem na linha da tabela que esta mais proxima do icone de lapis que foi clicado
    $('input[name=txtDescricao]').val(edicaoTurma); //vem com a descricao previamente no campo
    $('#myModal').modal('show'); //mostra o modal para editar
    funcaoAtual = "edicao";
});


//se submeter o form enquanto esta cadastrando ou editando
$('#cadastroTurma').submit(function () { //id do formulario

    $('#myModal').modal('hide'); //fecha o modal com o campo da turma para o modal de feedback aparecer sem problemas

    if(funcaoAtual == "cadastro"){

        $.ajax({
            url: '../control/cadastrar-turma.php', //pagina que vai direcionar para o dao
            dataType: 'html', //tipo de dado que vai retornar
            type: 'POST',
            data: $('#cadastroTurma').serialize(),//manda os dados separados
            success: function (data) { // caso de certo ele pega a resposta (echo do php)
                if (data == "Dados cadastrados com sucesso!") {
                    mostrarModalSucesso(data);
                    $('#feedback').on('hidden.bs.modal', function () { //se o modal for fechado
                        document.location.reload(true); //recarrega a pagina para ver as alteracoes
                    });
                } else {
                    mostrarModalErro(data);
                }
            }
        });

    }else{

        edicaoTurma = $('input[name=txtDescricao]').val(); //pega a nova descricao da turma que foi alterada

        $.ajax({
            url: '../control/alterar-turma.php', //pagina que vai direcionar para o dao
            dataType: 'html', //tipo de dado que vai retornar
            type: 'POST', //define que o tipo que ta sendo enviado eh post
            data: { "idTurma": edicaoIdTurma, "descricao": edicaoTurma }, //manda o id da turma e a descricao pro arquivo no controller
            success: function (data) { // caso de certo ele pega a resposta (echo do php)
                if (data == "Dados editados com sucesso!") {
                    mostrarModalSucesso(data);
                    $('#feedback').on('hidden.bs.modal', function () { //se o modal for fechado
                        document.location.reload(true); //recarrega a pagina para ver as alteracoes
                    });
                } else {
                    mostrarModalErro(data);
                }
            }
        });

    }
    return false; //nao att a pagina
});


//se carrega a pagina de turmas
$(document).ready(function () {
    $.ajax({
        url: '../control/consultar-turma.php', //pagina que vai direcionar para o dao
        data: "",
        type: 'POST', //define que o tipo que ta sendo enviado eh post
        dataType: "json", //define que o tipo que ta sendo retornado eh json, nesse caso ta retornando as linhas da tabelas previamente ja escritas
        success: function (data) { // caso de certo ele pega a resposta (echo do php)
            for (let i = 0; i < data.length; i++) { //faz iteracao no json
                let linhaAtual = data[i];
                $("#tabelaTurmas tr:last").after(linhaAtual); //pega a ultima linha, e apos essa ultima linha coloca a linha nova
            }
        }
    });
    return false; //nao att a pagina

});

//se pesquisa as turmas na barra de pesquisa
function pesquisar() {
    $("#tabelaTurmas td").parent().remove(); //remove os rows para atualizar em tempo real com os novos enquanto digita
    let texto = document.getElementById('pesquisaTabela').value; //pega o texto atual da barra de pesquisa
    $.ajax({
        url: '../control/consultar-turma.php', //pagina que vai direcionar para o dao
        data: { "txtDescricao": texto }, //o que foi digitado na barra de pesquisa
        type: 'POST', //define que o tipo que ta sendo enviado eh post
        dataType: "json", //define que o tipo que ta sendo retornado eh json, nesse caso ta retornando as linhas da tabelas previamente ja escritas
        success: function (data) { // caso de certo ele pega a resposta (echo do php)
            for (let i = 0; i < data.length; i++) { //faz iteracao no json
                let linhaAtual = data[i];
                $("#tabelaTurmas tr:last").after(linhaAtual); //pega a ultima linha, e apos essa ultima linha coloca a linha nova
            }
        }
    });
}

//funcao de exclusao
$(document).on('click', '.fa-trash', function () { //se clicar em algum icone de lixeira
    let idTurma = $(this).closest("tr").attr("id"); //pega a linha da tabela mais proxima do icone de lixeira que foi clicado e pega o id dessa linha 
    let turma = $(this).closest("tr").text(); //pega o texto (descricao da turma) que contem na linha da tabela que esta mais proxima do icone de lixeira que foi clicado
    mostrarModalConfirmacao("Tem certeza que deseja excluir a turma " + turma + "?");

    $('#btnConfirmarModal').click(function () {
        $.ajax({
            url: '../control/excluir-turma.php', //pagina do controller que vai direcionar para o dao
            data: { "idTurma": idTurma, "descricao": turma }, //manda o id da turma e a descricao pro arquivo no controller
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