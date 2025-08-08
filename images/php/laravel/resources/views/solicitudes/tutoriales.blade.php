@extends('components.layout')

@section('title', 'Recuperar contraseña')

@push('breadcrumb')
    <li class="breadcrumb-item-govco"><a href="/">Administración</a></li>
    <li class="breadcrumb-item-govco active" aria-current="page">Tutoriales</li>
@endpush

@section('content')


    <div class="new-user-content mt-2" data-content="natural">
        <div class="row justify-content-between">
            <div class="col-lg-6">
                <h3 class="govcolor-blue-dark">Te explicamos con video tutoriales</h3>
                <div class="container-login-alerta-juridica-govco">
                    <div class="icon-informacion-login-govco"></div>
                </div>
                <div class="container-login-opcion-govco mt-4">

                    @php
                        $videos = [
                            [
                                'title' => 'Traspaso de propiedad de vehículo',
                                'src' => 'https://www.youtube.com/embed/Uzh2zUQe_EY',
                                'description' => 'Aprende a crear una solicitud de traspaso de propiedad de vehículo'
                            ],
                            [
                                'title' => 'Traspaso de levantamiento de limitación o gravamen',
                                'src' => 'https://www.youtube.com/embed/lSUcGfbQvYs',
                                'description' => 'Aprende a crear una solicitud de traspaso de levantamiento de limitación o gravamen'
                            ],
                            [
                                'title' => 'Duplicado de placas de vehículo',
                                'src' => 'https://www.youtube.com/embed/KFMiadc06jA',
                                'description' => 'Aprende a crear una solicitud de duplicado de placas de vehículo'
                            ],
                            [
                                'title' => 'Renovación de licencia de conducción',
                                'src' => 'https://www.youtube.com/embed/O-8MP-1H4vg',
                                'description' => 'Aprende a crear una solicitud de renovación de licencia de conducción'
                            ],
                            [
                                'title' => 'Certificado de libertad y tradición',
                                'src' => 'https://www.youtube.com/embed/1CMk4xNKoZo',
                                'description' => 'Aprende a crear una solicitud de certificado de libertad y tradición'
                            ],
                            [
                                'title' => 'Recuperar Contraseña',
                                'src' => 'https://www.youtube.com/embed/9fq-d-fB3S4',
                                'description' => 'En este video te mostramos cómo recuperar tu contraseña de acceso al sistema de trámites.'
                            ],
                        ];
                    @endphp
                    @foreach ($videos as $index => $video)
                        <div class="accordion-govco" id="accordionExample{{  $index }}">
                            <div class="item-accordion-govco">
                                <h2 class="accordion-header" id="accordionPanels-example{{  $index }}">
                                    <button class="button-accordion-govco {{ $index === 0 ? '' : 'collapsed' }}" 
                                        type="button" data-bs-toggle="collapse"
                                        data-bs-target="#accordionPanels-collapse{{  $index }}"
                                        aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                        aria-controls="accordionPanels-collapse{{  $index }}">
                                        <span class="text-button-accordion-govco">{{ $video['title'] }}</span>
                                    </button>
                                </h2>
                                <div id="accordionPanels-collapse{{  $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                    aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                    aria-labelledby="accordionPanels-example{{  $index }}" data-bs-parent="#accordionExample{{  $index }}">
                                    <div class="body-accordion-govco">
                                        <iframe src="{{ $video['src'] }}" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            style="width: 100%; height: 250px;"
                                            allowfullscreen></iframe>
                                        <p class="text-one-accordion-govco">{{ $video['description'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4">
                @include('components.area-servicio')
            </div>
        </div>
    </div>

@endsection