<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Inicio')</title>
    <link rel="icon" type="image/x-icon" href="https://www.nortedesantander.gov.co/favicon.ico">
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css') }}"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    rel="stylesheet" crossorigin="anonymous">
    <link href="{{ asset('assets/all.css') }}" rel="stylesheet" type="text/css">
    <!-- <link rel="stylesheet" href="{{ asset('assets/general/styles.css') }}"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/form/fix.css') }}">
    <link rel="stylesheet" href="https://cdn.www.gov.co/assets/fonts/icons/Govco-icons.woff2" type="font/woff2">
    <!-- 
    <link href="{{ asset('assets/transversal/botones.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/transversal/alerta-notificacion.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/transversal/barra-superior.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/transversal/volver-arriba.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/transversal/barra-accesibilidad.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/transversal/botones.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/transversal/pie-de-pagina.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/transversal/tipografia.css') }}" rel="stylesheet" type="text/css"> 
    -->
    
    @stack('styles')
</head>

<body>
    <div class="card-body p-0">
        <div class="barra-superior-govco">
            <a href="https://www.gov.co/" target="_blank" rel=noopener
                aria-label="Portal del Estado Colombiano - GOV.CO"></a>
                <button type="button" class="btn btn-white-primary btn-xsm rounded idioma-btn-barra-superior-govco" style="visibility: hidden;">EN</button>
                @if (Auth::check())
                <div class="btn-group">
                    <button type="button" class="btn btn-transparent-primary color-white btn-xsm rounded dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                        <span class="govco-user"></span>
                        <span class="user-label"><strong>{{ Auth::user()->label() }}</strong></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
                        <li class="user-label-xs"><h6 class="dropdown-header">{{ Auth::user()->label() }}</h6></li>
                        <li><button class="dropdown-item" type="button" onclick="location.href='/logout'"><span class="govco-door-closed"></span> Cerrar sesión</button></li>
                    </ul>
                </div>
                @endif
        </div>
    </div>

    @yield('skip-to-main-content')
    <div class="card no-border-bottom" id="main-content">
        <div class="card-body p-4 pt-0">
            <div class="col-lg-12 p-4 text-start">
                <a href="/"><span class="govco-logo-entidad"></span></a>
                <nav aria-label="Miga de pan predeterminada de dos niveles">
                    <ul class="breadcrumb-govco">
                        <li class="breadcrumb-item-govco"><a href="/">Inicio</a></li>
                        @stack('breadcrumb')
                    </ul>
                </nav>
                @yield('content')
                @if ($errors->any() && config('app.debug'))
                <br />
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->getMessages() as $key => $messages)
                        <li><strong>{{ $key }}:</strong> {{ implode(', ', $messages) }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="pie-pagina-govco">
        <div class="first-section">
            <h4>Gobernación de Norte de Santander</h4>
            <div class="logo-container">
                <a href="/"><span class="govco-logo-entidad"></span></a>
            </div>
            <ul class="contact-data-container">
                <li>
                    <p>Dirección: Av 5 Calle 13 y 14 esquina Norte de Santander, Cúcuta </p>
                </li>
                <li>
                    <p>Código postal: 540001</p>
                </li>
                <li>
                    <p>Horario de atención: Lunes a viernes </p>
                    <p>7:30 a.m a 11:30 a.m. y 2:00 p.m. a 5:30 p.m.</p>
                </li>
                <li>
                    <p>Teléfono conmutador: +57 (607) 5956200.</p>
                </li>
                <li>
                    <p>Línea gratuita: 01 8000 185783.</p>
                </li>
                <li>
                    <p>Línea anticorrupción: +57 (607) 5915060.</p>
                </li>
                <li>
                    <p>
                        Correo institucional:
                        <a href="mailto:ministerio@ministerio.gov.co" class="btn-govco link-btn-govco"
                            aria-label="Permite enviar correo" target="_blank">ministerio@ministerio.gov.co</a>
                    </p>
                </li>
                <li>
                    <p>
                        Correo de notificaciones judiciales:
                        <a href="mailto:judiciales@gov.co" class="btn-govco link-btn-govco"
                            aria-label="Permite enviar correo" target="_blank">judiciales@gov.co</a>
                    </p>
                </li>
            </ul>
            <div class="links-container">
                <a href="https://twitter.com/GoberNorte" role="button" class="btn-govco link-btn-govco" style="width: 123px; height: 33px;"
                    aria-label="enlace al twiter de la entidad">
                    <span class="govco-svg govco-twitter" aria-hidden="true"></span>
                    <span>@GoberNorte</span>
                </a>
                <a href="https://instagram.com/gobernorte" role="button" class="btn-govco link-btn-govco" style="width: 123px; height: 33px;"
                    aria-label="enlace al instagram de la entidad">
                    <span class="govco-svg govco-instagram" aria-hidden="true"></span>
                    <span>@gobernorte</span>
                </a>
                <a href="https://www.facebook.com/GobernaciondeNortedeSantander" role="button" class="btn-govco link-btn-govco" style="width: 123px; height: 33px;"
                    aria-label="enlace al facebook de la entidad">
                    <span class="govco-svg govco-facebook-f" aria-hidden="true"></span>
                    <span>@GobernaciondeNortedeSantander</span>
                </a>
            </div>
            <div class="end-links-container add-link-container">
                <a href="https://www.nortedesantander.gov.co/" class="btn-govco link-btn-govco">Directorio Institucional</a>
            </div>
            <div class="end-links-container">
                <a href="https://www.nortedesantander.gov.co/#/pagina/politicas-de-privacidad-y-terminos-de-uso" class="btn-govco link-btn-govco">Políticas</a>
                <a href="https://www.nortedesantander.gov.co/#/mapa-del-sitio" class="btn-govco link-btn-govco">Mapa del sitio</a>
                <a href="https://www.nortedesantander.gov.co/#/pagina/terminos-y-condiciones-de-uso" class="btn-govco link-btn-govco">Términos y condiciones</a>
            </div>
        </div>
        <div class="second-section">
            <a href="https://www.gov.co/" target="_blank"><span class="govco-logo"></span></a>
            <span class="separator"></span>
            <a href="https://www.colombia.co/" target="_blank"><span class="govco-co mt-0"></span></a>
        </div>
    </div>

    <button id="back-to-top" class="btn btn-primary btn-lg" type="button" aria-label="Volver arriba"
        data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="Volver arriba" style="">
        <span>Volver<br>arriba</span>
    </button>
      <div class="position-fixed top-50 translate-middle-y" style="right: 0; z-index: 1200;">
        <div class="barra-accesibilidad-govco d-none d-lg-flex">
          <button class="contrast" aria-label="Cambiar contraste">
            <span class="govco-contrast"></span>
          </button>
          <button class="decrease-font-size" aria-label="Disminuir letra" data-decrease-limit="-5">
            <span class="govco-font-minimize"></span>
          </button>
          <button class="increase-font-size" aria-label="Aumentar letra" data-increase-limit="5">
            <span class="govco-font-maximize"></span>
          </button>
        </div>
      </div>



    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js') }}"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="{{ asset('assets/script.js') }}"></script>
    <script src="{{ asset('assets/transversal/barra-accesibilidad.js') }}"></script>
    <script src="{{ asset('assets/transversal/barra-superior.js') }}"></script>
    <script src="{{ asset('assets/transversal/volver-arriba.js') }}"></script>
    <script src="{{ asset('assets/transversal/alerta-notificacion.js') }}"></script>
    <script src="{{ asset('assets/transversal/barra-accesibilidad.js') }}"></script>
    <script>
        var firstTab = true;
        document.addEventListener('focusin', function () {
            firstTab = false;
        });
        document.addEventListener('keydown', function (event) {
            if (event.key === 'Tab') {
                showSkipToMainContent();
            }
        });
        document.addEventListener('DOMContentLoaded', function () {
            function toggleGoToTopButton() {
                const goToTopButton = document.getElementById('back-to-top');
                if (!goToTopButton) return;
                const scrollTop = window.scrollY;
                if (scrollTop > 100) {
                    goToTopButton.style.display = 'block';
                } else {
                    goToTopButton.style.display = 'none';
                }
            }
            toggleGoToTopButton();
            window.addEventListener('scroll', toggleGoToTopButton);
            window.addEventListener('resize', toggleGoToTopButton);

        });
    </script>
    @stack('scripts')
    
</body>

</html>