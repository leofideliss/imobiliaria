@extends('index')

@section('content')

    <section class="bg-cinza py-5">
        <div class="container topo-padding-top topo-padding-bottom">

        <!-- CAMINHO DA PAGINA -->
        <nav class="mb-4 pb-lg-3 esconderMobile" aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home5')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Vender Imóvel</li>
            </ol>
        </nav>

        <!-- Page title-->
        <div class="mb-lg-5 mx-auto text-center" style="max-width: 856px;">
            <h1 class="display-5 mb-4 pb-lg-2">
                <span class='text-primary'>Venda</span> seu imóvel
            </h1>
            <p class="lead opacity-70">
                Temos técnica e expertise para conduzir a venda do seu imóvel. Estamos aqui para guiar você a cada passo, garantindo uma transação segura e bem-sucedida.
            </p>
        </div>
        </div>
    </section>

    <!-- Stats-->
    <section class="position-relative bg-white rounded-xxl-4 py-md-3 zindex-5 esconderMobile" style="margin-top: -30px;">
        <div class="container pt-5 pb-2">
        </div>
    </section>  

    <!-- BANNER -->
    <section class="container mb-5 pb-2 pb-md-4 pb-lg-5 paddingAjustesMobile-20 paddingTopMobile-40">
        <div class="row gy-4 align-items-md-center justify-center-venda" style="width:100%;margin: 0px !important;">
            <div class="col-md-6 width-imagem-venda">
                <img src="assets/img/real-estate/illustrations/sell.svg" width="441" alt="Imagem Venda Imóvel" class="imagemBanner">
            </div>
            <div class="col-lg-5 margin-left-6 col-md-6">
                <h2 class="mb-4">Te ajudamos a vender seu imóvel</h2>
                <p class="mb-4 pb-3 fs-lg">Ao cadastrar seu imóvel conosco, nossa equipe de corretores especializados entra em ação, garantindo que seu imóvel seja apresentado a diversos possíveis compradores, incluindo a disponibilização em várias plataformas digitais.</p>
                <a class="btn btn-lg btn-primary rounded-pill w-sm-auto w-100 ajusteBotaoMobiles" href="{{ route('user.perfil.loginCadastrar.entrar') }}">
                    Vender Imóvel<i class="fi-chevron-right ms-2 iconeAjusteMobile iconeFazerParteAjuste"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- FUNCIONAMENTO -->
    <section class="container mb-5 pb-lg-5 pb-3 pb-sm-4 paddingAjustesMobile-40">
        <h2 class="mb-4 pb-2 text-center textoMobile-35px">Como funciona</h2>
        <div class="mx-auto" style="max-width: 864px;">
        <div class="steps steps-vertical">
            <div class="step">
                <div class="step-progress">
                    <span class="step-progress-end"></span>
                    <span class="step-number bg-amarelo-numeros shadow-hover">1</span>
                </div>
                <div class="step-label">
                    <h3 class="h5 mb-2 pb-1">Faça seu cadastro pessoal em nosso site</h3>
                    <p class="mb-0 color-text-black">Precisamos das suas informações para iniciar essa jornada, afinal essa jornada demanda contatos, visitas ao imóvel etc. Esse é o primeiro passo para conectar seu imóvel a compradores qualificados e potencializar suas chances de sucesso.</p>
                </div>
            </div>
            <div class="step">
                <div class="step-progress">
                    <span class="step-progress-end"></span>
                    <span class="step-number bg-amarelo-numeros shadow-hover">2</span>
                </div>
                <div class="step-label">
                    <h3 class="h5 mb-2 pb-1">Cadastre seu imóvel</h3>
                    <p class="mb-0 color-text-black">É hora de adicionar informações importantes sobre o imóvel que deseja vender. Inclua fotos, detalhes e o endereço completo. Nosso compromisso é destacar os pontos fortes e apresentar seu imóvel de maneira única no mercado.</p>
                </div>
            </div>
            <div class="step">
                <div class="step-progress">
                    <span class="step-progress-end"></span>
                    <span class="step-number bg-amarelo-numeros shadow-hover">3</span></div>
                <div class="step-label">
                    <h3 class="h5 mb-2 pb-1">Nossa equipe cuidará de todos os detalhes</h3>
                    <p class="mb-0 color-text-black">Relaxe enquanto nossa equipe especializada toma conta de todos os aspectos, inclusive entrando em contato se precisarmos de mais detalhes. Estamos aqui para tornar o processo simples e eficiente.</p>
                </div>
            </div>
            <div class="step">
                <div class="step-progress">
                    <span class="step-progress-end"></span>
                    <span class="step-number bg-amarelo-numeros shadow-hover">4</span>
                </div>
                <div class="step-label">
                    <h3 class="h5 mb-2 pb-1">Entraremos em contato</h3>
                    <p class="mb-0 color-text-black">Entraremos em contato sempre que houver uma proposta. Mantemos nossos clientes informados em cada etapa do processo de venda. Juntos, alcançaremos o seu objetivo almejado.</p>
                </div>
            </div>
        </div>
        </div>
    </section>

    @php

        $configuracao = App\Http\Controllers\User\ContactController::getVideoVenda();
    
    @endphp

    @foreach ($configuracao as $configuracao)
        <!-- VIDEO -->
        @if($configuracao->link_vender != null)
            <div class="container mb-5 pb-2 pb-md-4 pb-lg-5 max-width-941 paddingAjustesMobile-20">
                {{-- <div class="position-relative"><a class="btn btn-icon btn-light-primary text-primary rounded-circle position-absolute start-50 top-50 translate-middle zindex-5" href="https://www.youtube.com/watch?v=7PIji8OubXU" data-bs-toggle="lightbox" data-video="true" style="width: 4.5rem; height: 4.5rem;"><i class="fi-play-filled fs-sm"></i></a><span class="position-absolute top-0 start-0 w-100 h-100 bg-dark rounded-3 opacity-40 zindex-1"></span><img class="rounded-3" src="assets/img/job-board/blog/15.jpg" alt="Video cover"></div> --}}
                <iframe src="{{ $configuracao->link_vender }}" class="videoInfosGerais"></iframe>
            </div>
        @endif
    @endforeach

    <!-- PERGUNTAS FREQUENTES -->
    <section class="container mb-5 pb-lg-5 paddingAjustesMobile-20">
        <h2 class="mb-sm-4 pb-md-2 text-center">Perguntas Frequentes</h2>
        <!-- FAQ grid-->
        <div class="row row-cols-lg-3 row-cols-sm-2 row-cols-1 g-sm-4 g-0">
            <!-- Grid item-->
            <div class="col">
                <div class="card border-0 h-100">
                    <div class="card-body">
                        <h3 class="h5 text-primary">01. Como funciona a Avaliação do Imóvel?</h3><a class="nav-link mb-2 p-0 fw-normal" href="#">Quis arcu euismod est, varius nisi?</a><a class="nav-link mb-2 p-0 fw-normal" href="#">Aliquam, commodo sed nibh?</a><a class="nav-link mb-2 p-0 fw-normal" href="#">Faucibus felis fames mauris dolor purus?</a><a class="nav-link mb-2 p-0 fw-normal" href="#">Odio diam, tellus facilisi?</a><a class="nav-link mb-2 p-0 fw-normal" href="#">Eu quisque libero, sed neque?</a><a class="nav-link mb-2 p-0 fw-normal" href="#">Lectus sed sit cursus amet, vitae tempor?</a>
                    </div>
                </div>
            </div>
            <!-- Grid item-->
            <div class="col">
                <div class="card border-0 h-100">
                    <div class="card-body">
                    <h3 class="h5 text-primary">02. Como e quando recebo meu dinheiro?</h3><a class="nav-link mb-2 p-0 fw-normal" href="#">Tincidunt molestie scelerisque?</a><a class="nav-link mb-2 p-0 fw-normal" href="#">Nunc, ipsum ut augue fusce ornare?</a><a class="nav-link mb-2 p-0 fw-normal" href="#">Velit, mauris amet feugiat condimentum mollis?</a><a class="nav-link mb-2 p-0 fw-normal" href="#">Lacus, sed fames mi cras id?</a><a class="nav-link mb-2 p-0 fw-normal" href="#">Adipiscing magna suspendisse?</a><a class="nav-link mb-2 p-0 fw-normal" href="#">Libero pellentesque ultricies maecenas?</a>
                    </div>
                </div>
            </div>
            <!-- Grid item-->
            <div class="col">
                <div class="card border-0 h-100">
                    <div class="card-body">
                    <h3 class="h5 text-primary">03. Quando recebo meu dinheiro?</h3><a class="nav-link mb-2 p-0 fw-normal" href="#">Cursus fusce volutpat tempor?</a><a class="nav-link mb-2 p-0 fw-normal" href="#">A senectus auctor sodales gravida non elit?</a><a class="nav-link mb-2 p-0 fw-normal" href="#">Mauris accumsan vel rhoncus?</a><a class="nav-link mb-2 p-0 fw-normal" href="#">Cras nunc, semper lectus turpis?</a><a class="nav-link mb-2 p-0 fw-normal" href="#">Pulvinar sed morbi massa nulla dolor eget?</a><a class="nav-link mb-2 p-0 fw-normal" href="#">Bibendum mattis amet amet?</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        
        (function () {

            var menuVendaImovel = document.getElementById('menuVendaImovel');


            if(menuVendaImovel != null){
                window.addEventListener('scroll', function () {
                    if (window.scrollY > 0) 
                    {
                        menuVendaImovel.classList.add('bg-header');
                        menuVendaImovel.classList.remove('bg-transparente');
                    }
                    else{
                        menuVendaImovel.classList.remove('bg-header');
                        menuVendaImovel.classList.add('bg-transparente');
                    } 
                });
            }


        })();

    </script>

@endsection