$('#loginAdm').submit(function(){ //id do formulario
	
	$.ajax({
	url: '../control/login.php', //pagina que vai direcionar para o dao
	dataType: 'html', //tipo de dado que vai retornar
	type: 'POST',
	data: $('#loginAdm').serialize(),//manda os dados separados
	success:function(data){ // caso de certo ele pega a resposta (echo do php)
	  if(data=="Login efetuado com sucesso"){
		mostrarModalSucesso(data);
		$('#feedback').on('hidden.bs.modal', function () {
			document.location.href = "pag-home.php";
		  })
		setTimeout(() => {  document.location.href = "pag-home.php"; }, 6000);
	  }else{
		mostrarModalErro(data);
	  }
	}
	
	
  });
	  return false; //nao att a pagina
  });
