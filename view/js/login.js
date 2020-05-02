$('#loginAdm').submit(function(){ //id do formulario
	
	$.ajax({
	url: '../control/login.php', //pagina que vai direcionar para o dao
	dataType: 'html', //tipo de dado que vai retornar
	type: 'POST',
	data: $('#loginAdm').serialize(),//manda os dados separados
	success:function(data){ // caso de certo ele pega a resposta (echo do php)
	  $('#conteudo').html(data); // coloca os dados na caixa de dialogo
	  if(data=="Login efetuado com sucesso"){
		$( "#error" ).hide();
		$( "#successful" ).show( "fast" );
		$('#myModal').modal('show');
		$('#myModal').on('hidden.bs.modal', function () {
			document.location.href = "pag-home.php";
		  })
		setTimeout(() => {  document.location.href = "pag-home.php"; }, 6000);
	  }else{
		$('#myModal').modal('show');
		$( "#successful" ).hide();
		$( "#error" ).show( "fast" );
	  }
	}
	
	
  });
	  return false; //nao att a pagina
  });
