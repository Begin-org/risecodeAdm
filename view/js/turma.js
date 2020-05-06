$("#novo").click(function () {
	$('#myModal').modal('show');
});

$('#cadastroTurma').submit(function () { //id do formulario

	$.ajax({
		url: '../control/cadastrar-turma.php', //pagina que vai direcionar para o dao
		dataType: 'html', //tipo de dado que vai retornar
		type: 'POST',
		data: $('#cadastroTurma').serialize(),//manda os dados separados
		success: function (data) { // caso de certo ele pega a resposta (echo do php)
			$('#conteudoModal').html(data); // coloca os dados na caixa de dialogo
			$('#myModal').modal('toggle');
			if (data == "Dados cadastrados com sucesso!") {
				$("#error").hide();
				$("#successful").show("fast");
				$('#feedback').modal('show');
				$('#feedback').on('hidden.bs.modal', function () {
					document.location.reload(true);
				});
			} else {
				$("#successful").hide();
				$("#error").show("fast");
				$('#feedback').modal('show');
			}
		}
	});
	return false; //nao att a pagina
});


$(document).ready(function () {
    $.ajax({
        url: '../control/consultar-turma.php', //pagina que vai direcionar para o dao
        data: "",
        type: 'POST',
        dataType:"json",
        success: function (data) { // caso de certo ele pega a resposta (echo do php)
            for(let i=0;i<data.length;i++){
                let linhaAtual = data[i];
                $("#tabelaTurmas tr:last").after(linhaAtual);
            }
        }
    });
    return false; //nao att a pagina

});

function pesquisar(){
    $("#tabelaTurmas td").parent().remove();
    let texto = document.getElementById('pesquisaTabela').value;
    $.ajax({
        url: '../control/consultar-turma.php', //pagina que vai direcionar para o dao
        data: {"txtDescricao":texto},
        type: 'POST',
        dataType:"json",
        success: function (data) { // caso de certo ele pega a resposta (echo do php)
            for(let i=0;i<data.length;i++){
                let linhaAtual = data[i];
                $("#tabelaTurmas tr:last").after(linhaAtual);
            }
        }
    });
}

$(document).on('click','.fa-trash', function(){
   alert($(this).closest("tr").attr("id"));
       //$(this).attr('class').replace('.icons-table ', ''));
  }
 );