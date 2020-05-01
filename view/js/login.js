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
	  }else{
		$( "#successful" ).hide();
		$( "#error" ).show( "fast" );
	  }
	  $('#myModal').modal('show');
	}
	
	
  });
	  return false; //nao att a pagina
  });
