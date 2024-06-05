@extends('index')

@section('content')

    @php
    
    $dadosInternos = App\Http\Controllers\User\DadosUserController::getDados();

    @endphp

    <!-- Breadcrumb-->
    <div class="container mt-5 mb-md-4 pt-5 paddingAjustesMobile-20">
        <nav class="mb-3 pt-md-3" aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home5')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contato</li>
            </ol>
        </nav>
    </div>

    <!-- Hero-->
    <section class="container mb-5 pb-2 pb-md-4 pb-lg-5 paddingAjustesMobile-30">
        <div class="row align-items-md-start align-items-center gy-4">
            <div class="col-lg-5 col-md-6">
                <div class="mx-md-0 mx-auto mb-4 text-md-start text-center" style="max-width: 416px;">
                    <h1 class="mb-4 textoMobile-35px">Entre em Contato</h1>
                    <p class="mb-0 fs-lg text-muted textoContatoMobile">Oferecemos uma variedade de canais de atendimento para garantir que a comunicação com nossos clientes seja sempre conveniente e eficaz.</p>
                </div>

                @if(isset($dadosInternos) && $dadosInternos->count() > 0)
                    @foreach ($dadosInternos as $dado)

                    @php
                            
                        $minhaString = $dado->whatsapp;

                        $stringTelefone = $dado->phone;

                        // Remove '(' e ')' da string
                        $semCaracteres = str_replace(array('(', ')', ' ', '-'), '', $minhaString);

                        $telefoneSemCaractere = str_replace(array('(', ')', ' ', '-'), '', $stringTelefone);

                    @endphp

                    <div class="col-lg-4 col-md-6 margin-icons-contato">

                        @if(isset($telefoneSemCaractere))
                        <div class="d-flex align-items-start mb-4 pb-md-3">
                            <img class="me-3 flex-shrink-0 ajusteImgContato" src="assets/img/suaempresa/icons/telefone.svg" width="32" alt="Icone Telefone">
                            <div>
                                <h3 class="h6 mb-2 pb-1">Telefone</h3>
                                <p class="mb-0"><a class="ms-1 text-nowrap color-text-black remover-decoracao" href="https://web.whatsapp.com/send?phone=55{{$telefoneSemCaractere}}&text=Olá, gostaria de mais informações sobre a Nome da empresa." target="_blank">{{$dado->phone}}</a></p>
                            </div>
                        </div>
                        @endif

                        @if(isset($semCaracteres))
                            <div class="d-flex align-items-start mb-4 pb-md-3">
                                <img class="me-3 flex-shrink-0 ajusteImgContato" src="assets/img/suaempresa/icons/whatsapp.svg" width="32" alt="Icone WhatsApp">
                                <div>
                                    <h3 class="h6 mb-2 pb-1">WhatsApp</h3>
                                    <p class="mb-0 "><a class="ms-1 text-nowrap color-text-black remover-decoracao" href="https://web.whatsapp.com/send?phone=55{{$semCaracteres}}" target="_blank">{{$dado->whatsapp}}</a></p>
                                </div>
                            </div>
                        @endif

                        @if(isset($dado->facebook))
                        <div class="d-flex align-items-start mb-4 pb-md-3">
                            <img class="me-3 flex-shrink-0 ajusteImgContato" src="assets/img/suaempresa/icons/face.svg" width="32" alt="Icone Facebook">
                            <div>
                                <h3 class="h6 mb-2 pb-1">Facebook</h3>
                                <p class="mb-0 "><a class="ms-1 text-nowrap color-text-black remover-decoracao" href="{{$dado->facebook}}" target="_blank">{{$dado->facebook}}</a></p>
                            </div>
                        </div>
                        @endif

                        @if(isset($dado->instagram))
                        <div class="d-flex align-items-start mb-4 pb-md-3">
                            <img class="me-3 flex-shrink-0 ajusteImgContato" src="assets/img/suaempresa/icons/instagram.svg" width="32" alt="Icone Instagram">
                            <div>
                                <h3 class="h6 mb-2 pb-1">Instagram</h3>
                                <p class="mb-0 "><a class="ms-1 text-nowrap color-text-black remover-decoracao" href="{{$dado->instagram}}" target="_blank">{{$dado->instagram}}</a></p>
                            </div>
                        </div>
                        @endif
                    </div>
                    @endforeach
                @else
                    <div class="col-lg-4 col-md-6 margin-icons-contato">

                        <div class="d-flex align-items-start mb-4 pb-md-3">
                            <img class="me-3 flex-shrink-0 ajusteImgContato" src="assets/img/suaempresa/icons/telefone.svg" width="32" alt="Icone Telefone">
                            <div>
                                <h3 class="h6 mb-2 pb-1">Telefone</h3>
                                <p class="mb-0"><a class="ms-1 text-nowrap color-text-black remover-decoracao" href="#">(823) 9316-1232</a></p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mb-4 pb-md-3">
                            <img class="me-3 flex-shrink-0 ajusteImgContato" src="assets/img/suaempresa/icons/whatsapp.svg" width="32" alt="Icone WhatsApp">
                            <div>
                                <h3 class="h6 mb-2 pb-1">WhatsApp</h3>
                                <p class="mb-0 "><a class="ms-1 text-nowrap color-text-black remover-decoracao" href="#">(832) 9316-1322</a></p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mb-4 pb-md-3">
                            <img class="me-3 flex-shrink-0 ajusteImgContato" src="assets/img/suaempresa/icons/face.svg" width="32" alt="Icone Facebook">
                            <div>
                                <h3 class="h6 mb-2 pb-1">Facebook</h3>
                                <p class="mb-0 "><a class="ms-1 text-nowrap color-text-black remover-decoracao" href="#">www.facebook.com.br/nome</a></p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mb-4 pb-md-3">
                            <img class="me-3 flex-shrink-0 ajusteImgContato" src="assets/img/suaempresa/icons/instagram.svg" width="32" alt="Icone Instagram">
                            <div>
                                <h3 class="h6 mb-2 pb-1">Instagram</h3>
                                <p class="mb-0 "><a class="ms-1 text-nowrap color-text-black remover-decoracao" href="#">www.instagram.com/nome</a></p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-md-6 offset-lg-1">

                      

            </div>
        </div>
    </section>


@endsection