<div class="modal fade" id="comentarios-modal" role="dialog" aria-labelledby="mdWarningLabel" aria-hidden="true">
    <div class="container-modal-govco" id="modal_warning">
        <div class="modal-container-govco" id="exampleModalWarning" tabindex="-1" data-bs-backdrop="false"
            data-bs-keyboard="false" aria-labelledby="exampleModalAdvertencia" aria-hidden="true" aria-hidden="true"
            role="dialog">
            <div class="modal-dialog modal-dialog-govco">
                <form class="mt-2" method="POST">
                    @csrf
                    <div class="modal-content modal-content-govco">
                        <div class="modal-header modal-header-govco modal-header-alerts-govco">
                            <button type="button" disabled class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body modal-body-govco" style="margin: 12px 40px !important">
                            <div id="comentarios-container"
                                style="max-height: 400px;overflow-y: auto;overflow-x: clip; ">
                            </div>
                            <div class="row mt-2">
                                <p><strong>Nuevo Comentario:</strong></p>
                                <textarea required class="aservice-comentarios-textarea" name="comentario"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer-govco modal-footer-alerts-govco">
                            <div class="modal-buttons-govco d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary btn-modal-govco fit-content">
                                    Continuar
                                </button>
                                &nbsp;
                                <button type="button" class="btn btn-primary btn-modal-govco btn-contorno"
                                    data-bs-dismiss="modal">
                                    Cerrar
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>