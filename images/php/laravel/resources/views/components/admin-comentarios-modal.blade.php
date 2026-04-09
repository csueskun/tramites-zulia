<div class="modal fade" id="comentarios-modal" role="dialog" aria-labelledby="comentarios-modal" aria-hidden="true">
    <div class="container-modal-govco" id="modal_comentarios">
        <div class="modal-container-govco" id="comentariosModalContainer" tabindex="-1" data-bs-backdrop="false"
            data-bs-keyboard="false" aria-labelledby="comentarios-modal" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-govco modal-lg">
                <form class="mt-2" method="POST">
                    @csrf
                    <div class="modal-content modal-content-govco">
                        <div class="modal-header modal-header-govco">
                            <a href="javascript:void(0)" role="button" data-bs-dismiss="modal" class="close-btn-modal"
                                aria-label="Close" aria-expanded="false" onclick="closeModal('modal_comentarios')">
                                <span class="modal-close-govco govco-times"></span>
                            </a>
                        </div>
                        <div class="modal-body modal-body-govco">
                            <h3 class="modal-title-govco mb-4">Comentarios de la solicitud</h3>
                            <div id="comentarios-container"
                                style="max-height: 400px;overflow-y: auto;overflow-x: clip; ">
                            </div>
                            <div class="row my-4">
                                <p class="modal-text-govco"><strong>Nuevo Comentario:</strong></p>
                                <textarea required class="aservice-comentarios-textarea" name="comentario"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer-govco">
                            <div class="modal-buttons-govco d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary btn-modal-govco">
                                    Guardar
                                </button>
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