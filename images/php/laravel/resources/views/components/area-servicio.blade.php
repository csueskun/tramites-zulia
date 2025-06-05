<div class="aservice-container">
    <a href="/logout" tabindex="-1" class="aservice-spacing no-decoration" id="logout">
        <div class="aservice" tabindex="0">
            <div class="aservice-item link-card">
                <p class="aservice-text-govco aservice-link-govco aservice-spacing-card no-decoration">
                    <span class="govco-door-closed"></span>
                    Cerrar sesión
                </p>
            </div>
        </div>
    </a>
    <a href="javascript:void(0)" tabindex="-1" class="aservice-spacing no-decoration" id="aserviceTutorial">
        <div class="aservice" tabindex="0">
            <div class="aservice-item link-card">
                <p class="aservice-text-govco aservice-link-govco aservice-spacing-card no-decoration">
                    Te explicamos con tutoriales
                </p>
            </div>
        </div>
    </a>
    <div class="aservice aservice-spacing" id="aserviceConsulta">
        <div class="aservice-item">
            <h2 class="aservice-header-govco" id="headingOne">
                <button class="button-aservice-govco collapsed" type="button"
                    data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false"
                    aria-controls="collapseOne" id="collapseOneButton">
                    <a class="aservice-text-govco">
                        ¿Tienes dudas sobre este trámite o consulta?
                    </a>
                </button>
            </h2>
            <div id="collapseOne" class="aservice-collapse collapse" aria-labelledby="headingOne"
                data-bs-parent="#aserviceExampleOne">
                <div class="aservice-body">
                    <div class="row aservice-row-govco">
                        <span class="mail-icon-govco"></span>
                        <div class="aservice-mailto-container">
                            <a href="mailto:soporteccc@mintic.gov.co" class="aservice-mailto-govco">
                                Enviar correo electrónico
                            </a>
                        </div>
                    </div>
                    <div class="row aservice-row-govco aservice-row-center-govco">
                        <span class="headset-icon-govco"></span>
                        <p class="aservice-number-govco">(601) 123-45-78<br>01-8000-456-768</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="aservice" id="aserviceProceso">
        <div class="aservice-item">
            <h2 class="aservice-header-govco" id="headingTwo">
                <button class="button-aservice-govco collapsed" type="button"
                    data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                    aria-controls="collapseTwo" id="collapseTwoButton">
                    <a class="aservice-text-govco">
                        ¿Cómo fue tu experiencia durante el proceso?
                    </a>
                </button>
            </h2>
            <div id="collapseTwo" class="aservice-collapse collapse" aria-labelledby="headingTwo"
                data-bs-parent="#aserviceExampleTwo">
                <div class="aservice-body aservice-body-two">
                    <ul class="aservice-item-menu-ul">
                        <li class="aservice-item-menu-li">
                            <a class="dropdown-item aservice-item-govco" id="easy_item"
                                href="javascript:void(0)"
                                onclick="selectedOption('easy_item', 'hard_item')">
                                <div class="aservice-item-icon-govco">
                                    <span class="easy-icon-govco"></span>
                                </div>
                                <span>fácil</span>
                            </a>
                        </li>
                        <li class="aservice-item-menu-li">
                            <a class="dropdown-item aservice-item-govco" id="hard_item"
                                href="javascript:void(0)"
                                onclick="selectedOption('hard_item', 'easy_item')">
                                <div class="aservice-item-icon-govco">
                                    <span class="hard-icon-govco"></span>
                                </div>
                                <span>difícil</span>
                            </a>
                        </li>
                    </ul>
                    <div class="alert aservice-alerta-govco aservice-alerta-success-govco asuccess"
                        id="alerta-service" style="display: none;" role="alert">
                        <p class="aservice-alerta-content-text">
                            <span>¡Gracias!</span><br>Tus comentarios nos ayudan a mejorar los
                            servicios de nuestro país.
                        </p>
                    </div>
                    <div class="container-button" id="comentarios1-button" style="display: none;">
                        <button type="button" class="btn btn-primary btn-service-govco btn-contorno"
                            onclick="verComentarios()">Envía tus comentarios</button>
                    </div>
                    <div class="aservice-comentarios" id="aservice-comentarios"
                        style="display: none;">
                        <p class="aservice-comentarios-fixed-text">Escribe tus comentarios:</p>
                        <textarea class="aservice-comentarios-textarea"
                            id="aservice-comentarios-textarea"
                            placeholder="Queremos conocer tu experiencia, sugerencias y consejos..."
                            onkeypress="contadorTextArea()"
                            aria-label="area de comentarios"></textarea>
                        <p class="aservice-comentarios-alert" id="aservice-comentarios-alert"
                            style="display: none;">* Para
                            poder enviar su comentario, este debe contener, al menos, 10 caracteres.
                        </p>
                    </div>
                    <div class="container-button" id="comentarios2-button" style="display: none;">
                        <button type="button" id="comentarios2-button-item" disabled="true"
                            class="btn btn-primary btn-service-govco btn-contorno"
                            onclick="enviarComentarios()">Envía tus comentarios</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>