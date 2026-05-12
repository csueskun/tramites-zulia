{{-- Banner horizontal de valoración / comentarios (funciones `*Banner` en `area-de-servicio.js`). --}}
<div class="horizontal-banner-govco mt-4" id="horizontal-banner-experiencia">
    <div class="horizontal-banner-experiencia-inner">
        <div class="horizontal-banner-experiencia-col horizontal-banner-experiencia-col--question">
            <p class="horizontal-banner-experiencia-title">¿Cómo fue tu experiencia durante el proceso?</p>
        </div>
        <div class="horizontal-banner-experiencia-col horizontal-banner-experiencia-col--buttons" aria-label="Valoración de la experiencia">
            <div id="banner-experiencia-rating-wrap" class="horizontal-banner-experiencia-rating-wrap">
                <ul class="aservice-item-menu-ul horizontal-banner-experiencia-options">
                    <li class="aservice-item-menu-li">
                        <a class="dropdown-item aservice-item-govco" id="easy_item_banner"
                            href="javascript:void(0)"
                            onclick="selectedOptionBanner('easy_item_banner', 'hard_item_banner')">
                            <div class="aservice-item-icon-govco">
                                <span class="easy-icon-govco"></span>
                            </div>
                            <span>fácil</span>
                        </a>
                    </li>
                    <li class="aservice-item-menu-li">
                        <a class="dropdown-item aservice-item-govco" id="hard_item_banner"
                            href="javascript:void(0)"
                            onclick="selectedOptionBanner('hard_item_banner', 'easy_item_banner')">
                            <div class="aservice-item-icon-govco">
                                <span class="hard-icon-govco"></span>
                            </div>
                            <span>difícil</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="alert aservice-alerta-govco aservice-alerta-success-govco asuccess horizontal-banner-experiencia-alert horizontal-banner-experiencia-alert--col2"
                id="alerta-service-banner" style="display: none;" role="alert">
                <p class="aservice-alerta-content-text">
                    <span>¡Gracias!</span><br>Tus comentarios nos ayudan a mejorar los
                    servicios de nuestro país.
                </p>
            </div>
        </div>
        <div class="horizontal-banner-experiencia-col horizontal-banner-experiencia-col--send">
            <div class="horizontal-banner-experiencia-send-stack">
                <div class="container-button horizontal-banner-experiencia-step1" id="comentarios1-button-banner">
                    <button type="button" class="btn btn-primary btn-service-govco btn-contorno"
                        id="comentarios1-button-item-banner"
                        onclick="verComentariosBanner()">Envía tus comentarios</button>
                </div>
                <div class="aservice-comentarios horizontal-banner-experiencia-comentarios" id="aservice-comentarios-banner"
                    style="display: none;">
                    <p class="aservice-comentarios-fixed-text">Escribe tus comentarios:</p>
                    <textarea class="aservice-comentarios-textarea"
                        id="aservice-comentarios-textarea-banner"
                        placeholder="Queremos conocer tu experiencia, sugerencias y consejos..."
                        oninput="experienciaBannerOnInput()"
                        aria-label="Área de comentarios (banner)"></textarea>
                    <p class="aservice-comentarios-alert" id="aservice-comentarios-alert-banner"
                        style="display: none;">* Para
                        poder enviar su comentario, este debe contener, al menos, 10 caracteres.
                    </p>
                </div>
                <div class="container-button horizontal-banner-experiencia-step2" id="comentarios2-button-banner" style="display: none;">
                    <button type="button" id="comentarios2-button-item-banner" disabled
                        class="btn btn-primary btn-service-govco btn-contorno"
                        onclick="enviarComentariosBanner()">Envía tus comentarios</button>
                </div>
            </div>
        </div>
    </div>
</div>
@include('components.partials.area-de-servicio-script')
