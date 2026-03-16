@extends('components.layout')

@section('title', 'Recuperar contraseña')

@push('breadcrumb')
    <li class="breadcrumb-item-govco active" aria-current="page">Términos y condiciones</li>
@endpush

@section('content')


    <div class="new-user-content mt-2" data-content="natural">
        <div class="row justify-content-between">
            <div class="col-lg-8">
                <h3 class="">Términos y condiciones</h3>
                <div class="container-login-alerta-juridica-govco">
                    <div class="icon-informacion-login-govco"></div>
                </div>
                <div class="container-login-opcion-govco mt-4">

                <p>
                    El Portal Único del Estado Colombiano (<strong>GOV.CO</strong>) tiene por objeto facilitar al público en general el acceso a la información de las entidades públicas del nivel nacional y territorial. El uso de este Portal y su contenido está sujeto a las condiciones de uso que más adelante se expondrán. Las personas, en adelante <strong>“Ciudadanos-Usuarios”</strong>, al acceder, navegar o usar este portal Web, reconocen que han leído, entendido y se obligan a cumplir con estos términos y cumplir con todas las leyes y reglamentos aplicables. Si el Ciudadano - Usuario no está de acuerdo con estos términos y condiciones de uso o con cualquier disposición de la Política de Privacidad, le sugerimos que se abstenga de acceder o navegar por este Portal.
                </p>

                <h5>1. Aceptación de términos:</h5>
                <p>
                    La prestación del servicio del Portal Único del Estado Colombiano (<strong>GOV.CO</strong>) es de carácter libre y gratuito para los usuarios y se rige por los términos y condiciones que se incluyen a continuación, los cuales se entienden como conocidos y aceptados por los Ciudadanos-Usuarios del sitio. El uso de los datos personales del usuario se encuentra sujeto a la <a href="https://www.mintic.gov.co/portal/604/w3-article-2627.html" target="_blank">Política de Protección de Datos personales</a> del Ministerio/Fondo de Tecnologías de la Información y las Comunicaciones.
                </p>
                <p>
                    El Ministerio/Fondo de Tecnologías de la Información y las Comunicaciones se reserva el derecho de revisar y modificar de manera unilateral estos términos y condiciones de uso o la información contenida en el portal web en cualquier momento sin aviso previo, mediante la actualización de este anuncio. También puede realizar mejoras o cambios en los servicios descritos en este portal en cualquier momento y sin previo aviso.
                </p>
                <p>
                    La información contenida en este portal web es pública en los términos señalados en la Ley 1712 de 2014. Por tanto, toda la información que se publique puede ser accedida por cualquier persona que la requiera.
                </p>

                <h5>2. Derechos de propiedad intelectual:</h5>
                <p>
                    El Ministerio/Fondo de Tecnologías de la Información y las Comunicaciones es titular de todos los derechos sobre el software del portal Web, así como de los derechos de propiedad industrial e intelectual referidos a los contenidos que en ella se incluyan. Además, se reserva todos los derechos de autor, incluidos los no mencionados en este documento.
                </p>
                <p>
                    La propiedad intelectual sobre los contenidos del portal Web (textos, gráficos, logos, animaciones, sonidos y bases de datos, entre otros) o bien hacen parte del patrimonio del Ministerio/Fondo de Tecnologías de la Información y las Comunicaciones o, en su caso, su titularidad es de terceros que autorizaron el uso de estos en el Sitio Web o es información pública que se rige por las leyes de acceso a la información pública colombianas.
                </p>
                <p>
                    Algunos de los materiales de este portal Web pueden estar protegidos por derechos de autor cuando así sea mencionado en el contenido. Por tanto, cualquier uso no autorizado, así como el incumplimiento de los términos, condiciones o avisos contenidos en ella, puede violar la normatividad nacional vigente al respecto.
                </p>

                <h5>3. Información y sitios Web de terceros:</h5>
                <p>
                    El Portal Único del Estado Colombiano (<strong>GOV.CO</strong>) puede contener enlaces o acceso a sitios Web y contenidos de otras personas o entidades, pero no se hace responsable de su contenido, no controla, refrenda ni garantiza el contenido incluido en dichos sitios. Tampoco se responsabiliza del funcionamiento o accesibilidad de las páginas Web vinculadas ni sugiere, invita o recomienda la visita a las mismas.
                </p>
                <p>
                    En consecuencia, los <strong>“Ciudadanos-Usuarios”</strong> aceptan que el Ministerio/Fondo de Tecnologías de la Información y las Comunicaciones no es responsable de ningún contenido, enlace asociado, recurso o servicio asociado al sitio de un tercero, ni será responsable de ninguna pérdida o daño de cualquier tipo que se derive del uso que se realice de los contenidos de terceros.
                </p>

                <h5>Aviso Legal:</h5>
                <ol>
                    <li>El Ministerio/Fondo de Tecnologías de la Información y las Comunicaciones se reserva el derecho de modificar, complementar o suspender total o parcialmente la aplicación y el contenido que se genere por el uso de la aplicación.</li>
                    <li>El Ministerio/Fondo de Tecnologías de la Información y las Comunicaciones se reserva el derecho de cambiar los términos y condiciones de Uso en cualquier momento, con vigencia inmediata a partir del momento que se actualiza la aplicación.</li>
                    <li>Se considerará que los Ciudadanos-Usuario han leído y aceptado los términos y condiciones de uso para usar, acceder, descargar, instalar, obtener o brindar información hacia la aplicación.</li>
                    <li>El Ciudadano – Usuario declara que es consciente de que el contenido insertado en las aplicaciones es de exclusiva responsabilidad de cada una de las entidades que lo publican.</li>
                </ol>

                <p></p>
                    Para conocer más sobre la política de tratamiento de datos personales, lo invitamos a ingresar al sitio web <a href="https://www.mintic.gov.co/portal/604/w3-article-2627.html" target="_blank">https://www.mintic.gov.co/portal/604/w3-article-2627.html</a> donde se encuentra publicada bajo resolución 2007 del 25 de julio del 2018.
                </p>

                    
                </div>
            </div>
            <div class="col-lg-4">
                @include('components.area-servicio')
            </div>
        </div>
    </div>

@endsection