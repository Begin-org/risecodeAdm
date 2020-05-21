function mostrarModalSucesso(data){
    $('#conteudoModal').html(data); // coloca os dados na caixa de dialogo
    $("#btnFecharModal").show("fast");
    $("#btnCancelarModal").hide();
    $("#btnConfirmarModal").hide();
    $("#question").hide();
    $("#error").hide();
    $("#successful").show("fast");
    $('#feedback').modal('show');
}
function mostrarModalErro(data){
    $('#conteudoModal').html(data); // coloca os dados na caixa de dialogo
    $("#btnFecharModal").show("fast");
    $("#btnCancelarModal").hide();
    $("#btnConfirmarModal").hide();
    $("#question").hide();
    $("#successful").hide();
    $("#error").show("fast");
    $('#feedback').modal('show');

}
function mostrarModalConfirmacao(data){
    $('#conteudoModal').html(data); // coloca os dados na caixa de dialogo
    $("#btnCancelarModal").show("fast");
    $("#btnConfirmarModal").show("fast");
    $("#btnFecharModal").hide();
    $("#successful").hide();
    $("#error").hide();
    $("#question").show("fast");
    $('#feedback').modal('show');
}