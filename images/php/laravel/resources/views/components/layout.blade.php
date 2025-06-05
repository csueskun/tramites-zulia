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
        <button class="idioma-icon-barra-superior-govco float-right" aria-label="Button to change the language of the page to English"></button>
    </nav>

    <div class="card no-border-bottom">
        <div class="card-body p-4">
            <div class="col-lg-12 p-4 text-start">
                <span class="govco-logo-entidad"></span>
                <nav aria-label="Miga de pan predeterminada de dos niveles">
                    <ul class="breadcrumb-govco">
                        <li class="breadcrumb-item-govco"><a href="/">Inicio</a></li>
                        @stack('breadcrumb')
                    </ul>
                </nav>
                @yield('content')
                @if ($errors->any() && app()->environment('local'))
                <br />
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>


    <!-- footer 1 -->
    <!-- <div class="govco-footer mt-5">
        <div class="govco-data-front">
            <div class="govco-footer-text">
                <div class="row govco-nombre-entidad">
                    <div class="col-xs-12 col-lg-6">
                        <p class="govco-text-header-1">Nombre completo de la Sede electrónica</p>
                    </div>
                    <div class="col-xs-12 col-lg-4 govco-logo-div-a">
                        <span class="govco-logo-entidad"></span>
                    </div>
                </div>

                <div class="col-xs-12 col-lg-7 govco-texto-sedes">
                    <p class="govco-text-header-2">Sede principal</p>
                    Dirección: xxxxxx xxx xxx Departamento y municipio. <br>
                    Código Postal: xxxx <br>
                    Horario de atención: Lunes a viernes xx:xx a.m. - xx:xx p.m. <br>
                    Teléfono conmutador: +57(xx) xxx xx xx <br>
                    Línea gratuita: +57(xx) xxx xx xx <br>
                    Línea anticorrupción: +57(xx) xxx xx xx <br>
                    Correo institucional: ministerio@ministerio.gov.co <br>
                    Correo de notificaciones judiciales: judiciales@gov.co
                </div>

                <div class="col-xs-12 col-lg-7 govco-network">
                    <div class="govco-iconContainer">
                        <span class="icon govco-twitter-square"></span>
                        <span class="govco-link-modal">@Entidad</span>
                    </div>
                    <div class="govco-iconContainer">
                        <span class="icon govco-instagram-square"></span>
                        <span class="govco-link-modal">@Entidad</span>
                    </div>
                    <div class="govco-iconContainer">
                        <span class="icon govco-facebook-square"></span>
                        <span class="govco-link-modal">@Entidad</span>
                    </div>
                </div>

                <div class="govco-listado-sedes">
                    <div class="row govco-sedes">
                        <div class="govco-sede-info col-xs-12 col-lg-6">
                            <p class="govco-text-header-2">Sede 1</p>
                            Dirección: xxxxxx xxx xxx Departamento y municipio. <br>
                            Horario de atención: Lunes a viernes xx:xx a.m. - xx:xx p.m.
                        </div>
                        <div class="govco-contacto-info col-xs-12 col-lg-6">
                            <p class="govco-text-header-3">Contacto</p>
                            Teléfono conmutador: +57(xx) xxx xx xx <br>
                            Correo institucional: ministerio@ministerio.gov.co
                        </div>
                    </div>

                    <div class="row govco-sedes">
                        <div class="govco-sede-info col-xs-12 col-lg-6">
                            <p class="govco-text-header-2">Sede 2</p>
                            Dirección: xxxxxx xxx xxx Departamento y municipio. <br>
                            Horario de atención: Lunes a viernes xx:xx a.m. - xx:xx p.m.
                        </div>
                        <div class="govco-contacto-info col-xs-12 col-lg-6">
                            <p class="govco-text-header-3">Contacto</p>
                            Teléfono conmutador: +57(xx) xxx xx xx <br>
                            Correo institucional: ministerio@ministerio.gov.co
                        </div>
                    </div>

                    <div class="row govco-sedes">
                        <div class="govco-sede-info col-xs-12 col-lg-6">
                            <p class="govco-text-header-2">Sede 3</p>
                            Dirección: xxxxxx xxx xxx Departamento y municipio. <br>
                            Horario de atención: Lunes a viernes xx:xx a.m. - xx:xx p.m.
                        </div>
                        <div class="govco-contacto-info col-xs-12 col-lg-6">
                            <p class="govco-text-header-3">Contacto</p>
                            Teléfono conmutador: +57(xx) xxx xx xx <br>
                            Correo institucional: ministerio@ministerio.gov.co
                        </div>
                    </div>
                </div>

                <div class="govco-links-container">
                    <a class="govco-link-modal" href="#">Políticas</a>
                    <a class="govco-link-modal" href="#">Mapa del sitio</a>
                    <a class="govco-link-modal" href="#">Términos y condiciones</a>
                    <a class="govco-link-modal" href="#">Accesibilidad</a>
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
    </div> -->

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

    <!-- footer 3 -->
    <!-- <div class="govco-footer mt-5">
        <div class="row govco-portales-contenedor m-0">
            <div class="col-4 govco-footer-logo-portal">
                <div class="govco-logo-container-portal">
                    <span class="govco-logo"></span>
                    <span class="govco-separator"></span>
                    <span class="govco-co"></span>
                </div>
            </div>
            <div class="col-4 govco-info-datos-portal">
                <div class="govco-separator-rows"></div>
                <div class="govco-texto-datos-portal">
                    <p class="govco-text-header-portal-1">
                        Nombre completo del portal
                    </p>
                    <p>Dirección: Av 5 Calle 13 y 14 esquina Norte de Santander, Cúcuta <br>
                        Código Postal: 111321 <br>
                        Horario de atención: Lunes a viernes 8:30 am - 4:00 pm </p>
                </div>
                <div class="govco-network extramt-network">
                    <a href="https://twitter.com/GoberNorte" class="govco-iconContainer">
                        <span class="icon-portal govco-twitter-square"></span>
                        <span class="govco-link-portal">@GoberNorte</span>
                    </a>
                    <a href="https://instagram.com/gobernorte" class="govco-iconContainer">
                        <span class="icon-portal govco-instagram-square"></span>
                        <span class="govco-link-portal">@gobenorte</span>
                    </a>
                    <a href="https://www.facebook.com/GobernaciondeNortedeSantander" class="govco-iconContainer">
                        <span class="icon-portal govco-facebook-square"></span>
                        <span class="govco-link-portal">@GobNortSan</span>
                    </a>
                </div>
            </div>

            <div class="col-4 govco-info-telefonos">
                <div class="govco-separator-rows"></div>
                <div class="govco-texto-telefonos">
                    <p class="govco-text-header-portal-1">
                        <span class="govco-phone-alt"></span>
                        Contacto
                    </p>
                    <p>Teléfono conmutador: <br>
                        +57(607) 571 02 90 - +57(607)5710590 <br>
                        Línea gratuita: 01-800-0944142 <br>
                        Línea anticorrupción: +57(607)5710290 <br>
                        Correo institucional: gobernacion@nortedesantander.gov.co <br>
                        Correo de notificaciones judiciales: gobernacion@nortedesantander.gov.co </p>
                </div>

                <div class="govco-links-portal-container">
                    <div class="col-12 m-0 mt-2">
                        <a class="govco-link-portal" href="https://www.nortedesantander.gov.co/#/pagina/politicas-de-privacidad-y-terminos-de-uso">Políticas</a>
                        <a class="govco-link-portal" href="https://www.nortedesantander.gov.co/#/mapa-del-sitio">Mapa del sitio</a>
                    </div>
                    <div class="col-12 m-0 mt-2">
                        <a class="govco-link-portal" href="https://www.nortedesantander.gov.co/#/pagina/terminos-y-condiciones-de-uso">Términos y condiciones</a> <br>
                    </div>
                    <div class="col-12 m-0 mt-2">
                        <a class="govco-link-portal" href="#">Accesibilidad</a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js') }}"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="{{ asset('assets/script.js') }}"></script>
    @stack('scripts')
</body>

</html>