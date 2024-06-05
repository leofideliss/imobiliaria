@extends('index')

@section('content')

    <section class="bg-cinza py-5">
        <div class="container topo-padding-top topo-padding-bottom">

        <!-- CAMINHO DA PAGINA -->
        <nav class="mb-4 pb-lg-3 esconderMobile" aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home5')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Indique Imóvel</li>
            </ol>
        </nav>

        <!-- Page title-->
        <div class="mb-lg-5 mx-auto text-center" style="max-width: 856px;">
            <h1 class="display-5 mb-4 pb-lg-2">
                <span class='text-primary'>Indique</span> Imóvel ou Cliente
            </h1>
            <p class="lead opacity-70">
                Você pode indicar imóveis de qualquer pessoa ou Clientes interessados em comprar um imóvel. Quando a compra/venda for concluída por nossa imobiliária, expressamos nossa gratidão com uma recompensa pela parceria e confiança. Indique quantos quiser.
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
        <div class="row gy-4 align-items-md-center justify-center-venda" style="width:100%">
            <div class="col-md-6 width-imagem-venda">
                <img src="assets/img/real-estate/illustrations/rent.svg" width="441" alt="Imagem Venda Imóvel">
            </div>
            <div class="col-lg-5 margin-left-6 col-md-6">
                <h2 class="mb-4">Faça uma grana extra</h2>
                <div class="pb-3">
                    <p class="fs-lg">Indique imóveis ou clientes e receba uma recompensa assim que o imóvel for vendido por nossa imobiliária. Você será notificado sempre que o negócio indicado for concluído.</p>
                    <ul>
                        <li>Ganhe R$ 1.000,00 com a venda do imóvel indicado ou compra pelo cliente indicado.</li>
                        {{-- <li>Ganhe R$ XX,00 na venda do imóvel.</li> --}}
                    </ul>
                </div>

               

                <a class="btn btn-lg btn-primary rounded-pill w-sm-auto w-100 ajusteBotaoMobiles" id="botaoIndique" >
                    Indicar Imóvel<i class="fi-chevron-right ms-2 iconeAjusteMobile iconeFazerParteAjuste"></i>
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
                    <h3 class="h5 mb-2 pb-1">Preencha o formulário de indicação</h3>
                    <p class="mb-0 color-text-black">Preencha nosso formulário com seus dados, informações do imóvel e do proprietário ou do cliente indicado. Você pode optar por anonimato no processo de indicação.</p>
                </div>
            </div>
            <div class="step">
                <div class="step-progress">
                    <span class="step-progress-end"></span>
                    <span class="step-number bg-amarelo-numeros shadow-hover">2</span>
                </div>
                <div class="step-label">
                    <h3 class="h5 mb-2 pb-1">Contato com Proprietário ou Cliente</h3>
                    <p class="mb-0 color-text-black">Entraremos em contato com o proprietário do imóvel  ou com cliente indicado para sabermos mais detalhes, sempre com profissionalismo e eficiência.</p>
                </div>
            </div>
            <div class="step">
                <div class="step-progress">
                    <span class="step-progress-end"></span>
                    <span class="step-number bg-amarelo-numeros shadow-hover">3</span></div>
                <div class="step-label">
                    <h3 class="h5 mb-2 pb-1">Divulgação do imóvel</h3>
                    <p class="mb-0 color-text-black">Promovemos o imóvel em várias plataformas digitais, aplicando técnicas de venda eficazes para atrair compradores.</p>
                </div>
            </div>
            <div class="step">
                <div class="step-progress">
                    <span class="step-progress-end"></span>
                    <span class="step-number bg-amarelo-numeros shadow-hover">4</span>
                </div>
                <div class="step-label">
                    <h3 class="h5 mb-2 pb-1">Finalização e Recompensa</h3>
                    <p class="mb-0 color-text-black">Ao concluir a venda, você será notificado e receberá R$ 1.000,00 via PIX como agradecimento pela indicação bem-sucedida.</p>
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
        @if($configuracao->link_indicar != null)
            <div class="container mb-5 pb-2 pb-md-4 pb-lg-5 max-width-941 paddingAjustesMobile-20">
                {{-- <div class="position-relative"><a class="btn btn-icon btn-light-primary text-primary rounded-circle position-absolute start-50 top-50 translate-middle zindex-5" href="https://www.youtube.com/watch?v=7PIji8OubXU" data-bs-toggle="lightbox" data-video="true" style="width: 4.5rem; height: 4.5rem;"><i class="fi-play-filled fs-sm"></i></a><span class="position-absolute top-0 start-0 w-100 h-100 bg-dark rounded-3 opacity-40 zindex-1"></span><img class="rounded-3" src="assets/img/job-board/blog/15.jpg" alt="Video cover"></div> --}}
                <iframe src="{{ $configuracao->link_indicar }}" class="videoInfosGerais"></iframe>
            </div>
        @endif
    @endforeach
    
    <!-- PERGUNTAS FREQUENTES -->
    <section class="container mb-5 pb-lg-5 paddingAjustesMobile-20">
        <h2 class="mb-sm-4 pb-md-2 text-center textoMobile-35px">Perguntas Frequentes</h2>
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

            var menuIndiqueImovel = document.getElementById('menuIndiqueImovel');


            if(menuIndiqueImovel != null){
                window.addEventListener('scroll', function () {
                    if (window.scrollY > 0) 
                    {
                        menuIndiqueImovel.classList.add('bg-header');
                        menuIndiqueImovel.classList.remove('bg-transparente');
                    }
                    else{
                        menuIndiqueImovel.classList.remove('bg-header');
                        menuIndiqueImovel.classList.add('bg-transparente');
                    } 
                });
            }


        })();


    </script>

  

@endsection