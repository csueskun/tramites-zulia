<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Inicio')</title>
    <link rel="icon" type="image/x-icon" href="https://www.nortedesantander.gov.co/favicon.ico">
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css') }}"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('https://precdn.www.gov.co/layout/v4/all.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/form/fix.css') }}">
    @stack('styles')
</head>

<body>
    <nav class="navbar navbar-expand-lg barra-superior-govco" aria-label="Barra superior">
        <a href="https://www.gov.co/" target="_blank" aria-label="Portal del Estado Colombiano - GOV.CO"></a>
        
        <div class="right-button-group" style="
    padding: 0;
    font-size: 10px;
    position: absolute;
    right: 5.375rem;">
            @if (Auth::check())
            
            <div class="btn-group me-2" style="vertical-align: top;">
            <button type="button" class="button-user" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                {{ Auth::user()->nombreCompleto }}
            </button>
            </div>
            @endif
            <button class="idioma-icon-barra-superior-govco-fix" aria-label="Button to change the language of the page to English"></button>
        
        </div>
    </nav>
    @yield('skip-to-main-content')
    <div class="card no-border-bottom" id="main-content">
        <div class="card-body p-4 pt-0">
            <div class="col-lg-12 p-4 text-start">
                <span class="govco-logo-entidad"></span>
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

    <!-- footer 2 -->
    <div class="govco-footer mt-5">
        <div class="govco-data-front">
            <div class="govco-footer-text">
                <div class="row govco-nombre-entidad">
                    <div class="col-xs-12 col-lg-6">
                        <p class="govco-text-header-1">Gobernación de Norte de Santander</p>
                    </div>
                    <div class="col-xs-12 col-lg-4 govco-logo-div-a">
                        <span class="govco-logo-entidad"></span>
                    </div>
                </div>

                <div class="col-xs-12 col-lg-7 govco-texto-sedes">
                    <p class="govco-text-header-2">Gobernación de Norte de Santander</p>
                    <p>Dirección: Av 5 Calle 13 y 14 esquina Norte de Santander, Cúcuta <br>
                        Código Postal: 111321 <br>
                        Horario de atención: Lunes a viernes 8:30 am - 4:00 pm </p>
                </div>

                <div class="col-xs-12 col-lg-7 govco-network">
                    <div class="govco-iconContainer">
                        <a href="https://twitter.com/GoberNorte" class="govco-iconContainer">
                            <span class="icon govco-twitter-square"></span>
                            <span class="govco-link-modal">@GoberNorte</span>
                        </a>
                    </div>
                    <div class="govco-iconContainer">
                        <a href="https://instagram.com/gobernorte" class="govco-iconContainer">
                            <span class="icon govco-instagram-square"></span>
                            <span class="govco-link-modal">@gobernorte</span>
                        </a>
                    </div>
                    <div class="govco-iconContainer">
                        <a href="https://www.facebook.com/GobernaciondeNortedeSantander" class="govco-iconContainer">
                            <span class="icon govco-facebook-square"></span>
                            <span class="govco-link-modal">@GobernaciondeNortedeSantander</span>
                        </a>
                    </div>
                </div>

                <div class="govco-links-directorio">
                    <a class="govco-link-modal" href="https://www.nortedesantander.gov.co/">Directorio Institucional</a>
                </div>

                <div class="govco-links-container">
                    <div class="col-12 m-0 mt-2">
                        <a class="govco-link-modal" href="https://www.nortedesantander.gov.co/#/pagina/politicas-de-privacidad-y-terminos-de-uso">Políticas</a>
                        <a class="govco-link-modal" href="https://www.nortedesantander.gov.co/#/mapa-del-sitio">Mapa del sitio</a>
                    </div>
                    <div class="col-12 m-0 mt-2">
                        <a class="govco-link-modal" href="https://www.nortedesantander.gov.co/#/pagina/terminos-y-condiciones-de-uso">Términos y condiciones</a> <br>
                    </div>
                    <div class="col-12 m-0 mt-2">
                        <a class="govco-link-modal" href="#">Accesibilidad</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="govco-footer-logo">
            <div class="govco-logo-container">
                <span class="govco-co"></span>
                <span class="govco-separator"></span>
                <span class="govco-logo"></span>
            </div>
        </div>
    </div>

    <div class="row" style="position: fixed; bottom: 20px; right: 10px; z-index: 1000;">
        <div class="col-md-5"></div>
        <div class="col-md-2 mt-5">
            <button class="volver-arriba-govco ml-5" aria-describedby="descripcionId" aria-label="Botón volver arriba">
            </button>
            <span class="d-none" id="descripcionId"> Seleccione esta opción como atajo para volver al inicio de esta página.
            </span>
        </div>
        <div class="col-md-5"></div>
    </div>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js') }}"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="{{ asset('assets/script.js') }}"></script>
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
                const goToTopButton = document.querySelector('.volver-arriba-govco');
                if (!goToTopButton) return;
                const scrollHeight = document.body.scrollHeight;
                const viewportHeight = window.innerHeight;
                const scrollTop = window.scrollY;
                if (scrollHeight <= viewportHeight || scrollTop === 0) {
                    goToTopButton.style.display = 'none';
                } else {
                    goToTopButton.style.display = 'block';
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