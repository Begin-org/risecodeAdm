<hmlt>

    <body>
        <!-- Modal -->
        <div id="feedback" class="modal fade" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-sm modal-dialog-centered">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" style="text-align: center;">
                        <img src="imgs/successful.png" / style="display: none;" id="successful" class="fe-pulse" />
                        <img src="imgs/error.png" style="display: none;" id="error" class="fe-pulse" />
                        <img src="imgs/question.png" style="display: none;" id="question" class="fe-pulse" />
                        <h4 id="conteudoModal" style="margin-top:1rem;" class="fe-pulse"></h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCancelarModal" class="btn btn-danger" data-dismiss="modal" style="display: none;">Cancelar</button>
                        <button type="button" id="btnConfirmarModal" class="btn btn-success" data-dismiss="modal" style="display: none;">Confirmar</button>
                        <button type="button" id="btnFecharModal" class="btn btn-default" data-dismiss="modal" style="display: none;">Fechar</button>
                    </div>
                </div>
            </div>
        </div>