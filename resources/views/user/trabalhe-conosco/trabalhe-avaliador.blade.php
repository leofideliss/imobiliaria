@extends('index')

@section('content')

    <!-- TOPO -->
    <section class="bg-cinza py-5">
        <div class="container topo-padding-top topo-padding-bottom">

            <!-- CAMINHO DA PAGINA -->
            <nav class="mb-4 pb-lg-3 esconderMobile" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home5')}}">Home</a></li>
                    <li class="breadcrumb-item"><a >Trabalhe Conosco</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Avaliador de Imóvel</li>
                </ol>
            </nav>

            <!-- Page title-->
            <div class="mb-lg-5 mx-auto text-center paddingAjustesMobile-20" style="max-width: 856px;">
                <h1 class="display-5 mb-4 pb-lg-2">
                    Trabalhe conosco como <span class='text-primary'>Avaliador de Imóveis</span>
                </h1>
                <p class="lead opacity-70">
                    Junte-se à nossa equipe como avaliador de imóveis e contribua com sua expertise para avaliações precisas e confiáveis.
                </p>
            </div>

        </div>
    </section>
    <!-- Stats-->
    <section class="position-relative bg-white rounded-xxl-4 py-md-3 zindex-5 esconderMobile" style="margin-top: -30px;">
        <div class="container pt-5 pb-2">

        </div>
    </section>  

    <!-- BANNER PRINCIPAL -->
    <section class="container mb-5 pb-lg-5 paddingAjustesMobile-20 paddingTopMobile-40">
        <div class="row align-items-center justify-content-lg-start justify-content-center flex-lg-nowrap gy-4">
            <div class="col-lg-9">
                <img class="rounded-3 tamanhoImagemTrabalhadores" src="assets/img//foto_avaliador_634.png" alt="Imagem Avaliador">
            </div>
            <div class="col-lg-4 ms-lg-n5 col-sm-9 text-lg-start text-center">
                <div class="ms-lg-n5 pe-xl-5">
                    <h1 class="mb-lg-4">Faça parte da nossa equipe</h1>
                    <p class="mb-4 pb-lg-3 fs-lg">Faça parte da nossa equipe de profissionais qualificados, dedicados a fornecer serviços imobiliárias com alto padrão de qualidade.</p>
                   
                    <a class="btn btn-lg btn-primary w-sm-auto w-100 ajusteBotaoMobiles deixarAutoBotao" >
                        Fazer parte <i class="fi-chevron-right ms-2 iconeAjusteMobile iconeFazerParteAjuste"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- COMO FUNCIONA -->
    <section class="container margin-bottom-70 mb-5 paddingAjustesMobile-40">
        <div class="d-sm-flex align-items-center justify-content-center">
            <h2 class="h3 mb-2 mb-sm-0 textoMobile-35px">Como funciona?</h2>
        </div>
        <div class="d-sm-flex justify-content-center">
            <div class="col-md-5 col-lg-4 pt-4 mt-2 pt-md-5 mt-md-3">
                <div class="d-flex pb-4 pb-md-5 mb-2"><i class="fi-file lead text-primary mt-1 order-md-2"></i>
                    <div class="text-md-end ps-3 ps-md-0 pe-md-3 order-md-1">
                    <h3 class="h6 mb-1">Preencha o formulário de cadastro</h3>
                    <p class="fs-sm mb-0">Inicie sua parceria conosco com um cadastro simples. Vamos avaliar seu perfil profissional e agendar reuniões para alinhamento inicial.</p>
                    </div>
                </div>
                <div class="d-flex pb-4 pb-md-5 mb-2"><i class="fi-route lead text-primary mt-1 order-md-2"></i>
                    <div class="text-md-end ps-3 ps-md-0 pe-md-3 order-md-1">
                    <h3 class="h6 mb-1">Treinamento</h3>
                    <p class="fs-sm mb-0">Após a aprovação do seu perfil, você Receberá um treinamento básico para assegurar a excelência em nossos serviços.</p>
                    </div>
                </div>
                <div class="d-flex pb-4 pb-md-5 mb-2"><i class="fi-user lead text-primary mt-1 order-md-2"></i>
                    <div class="text-md-end ps-3 ps-md-0 pe-md-3 order-md-1">
                    <h3 class="h6 mb-1">Receba seu Login ao Sistema</h3>
                    <p class="fs-sm mb-0">Você receberá um login, senha em seu e-mail cadastrado. A partir desse momento, você estará habilitado para receber as demandas e desenvolver seu trabalho.</p>
                    </div>
                </div>
            </div>
            <div style="width: 90px"></div>
            <div class="col-md-5 col-lg-4 pt-md-5 mt-md-3 padding-topTrabalhadores">
                <div class="d-flex pb-4 pb-md-5 mb-2"><i class="fi-info-circle lead text-primary mt-1"></i>
                    <div class="ps-3">
                    <h3 class="h6 mb-1">Receba as demandas</h3>
                    <p class="fs-sm mb-0">Distribuímos demandas de avaliação imobiliária baseadas em sua área de especialização, garantindo um serviço preciso e adequado às necessidades dos clientes.</p>
                    </div>
                </div>
                <div class="d-flex pb-4 pb-md-5 mb-2"><i class="fi-cash lead text-primary mt-1"></i>
                    <div class="ps-3">
                    <h3 class="h6 mb-1">Receba sua comissão por serviço realizado</h3>
                    <p class="fs-sm mb-0">Garantimos uma remuneração justa e rápida por cada serviço concluído.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    @php

        $configuracao = App\Http\Controllers\User\ContactController::getVideoVenda();
    
    @endphp

    @foreach ($configuracao as $configuracao)
        @if($configuracao->link_avaliadores != null)
            <!-- VIDEO -->
            <div class="container margin-bottom-123 max-width-941 paddingAjustesMobile-20">
                <iframe src="{{ $configuracao->link_avaliadores }}" class="videoInfosGerais"></iframe>
            </div>
        @endif
    @endforeach

    <!-- Encontrar serviços -->
    <section class="container margin-bottom-123 paddingAjustesMobile-40">
        <div class="row gy-4 align-items-md-center">
          <div class="col-md-6"><img src="assets/img/job-board/illustrations/steps.svg" alt="Illustration"></div>
          <div class="col-lg-5 offset-lg-1 col-md-6">
            <h2 class="mb-4">Encontrar novos serviços nunca foi tão fácil</h2>
            <p class="mb-4 pb-3 fs-lg">Nossa imobiliária direciona a você as demandas de avaliação de imóveis. Sua função é realizar avaliações precisas e detalhadas. Enquanto você se concentra na avaliação, cuidamos de capitar clientes e da coordenação.</p>
         
            <a class="btn btn-lg btn-primary rounded-pill w-sm-auto w-100 ajusteBotaoMobiles deixarAutoBotao">
                Fazer parte<i class="fi-chevron-right ms-2 iconeFazerParteAjuste iconeAjusteMobile"></i>
            </a>
          </div>
        </div>
    </section>

    {{-- <!-- SIMULE UMA VENDA -->
    <section class="container mb-5 pb-lg-5 paddingAjustesMobile-40">
        <h2 class="mb-sm-4 pb-md-2 text-center textoMobile-35px">Faça uma renda extra</h2>
        <p class="lead opacity-70" style="text-align: center">
            Simule quanto você pode retirar por mês apenas realizando serviços pela plataforma.
        </p>
        <div class="div-formulario-simulador">
            <div class="camposSimulador">
                <form id="form-simuladorFotografo">
                    <div class="input-box-simulador">
                        <label for="quantidadeServico" class="textoValorImovel">
                            Quantidade de serviços realizados no mês*
                        </label>
                        <div class="input-field-simulador">
                            <input type="number" id="quantidadeServico" oninput="validarNumeroInteiro(this)" class="form-control" required>
                            <span id="mensagemErro" style="color: red;"></span>
                        </div>
                    </div>

                    <div class="porcentagemComissao">
                        <span class="textoComissao">
                            Média do preço pago por serviço
                        </span>
                        <span class="textoPorcentagemComissao">R$ 200,00</span>
                    </div>

                    <button id="calcular" class="btn btn-lg btn-primary d-block w-100">
                        Calcular sua comissão
                    </button>
                </form>
            </div>
            <div id="infos" class="boxResultado">
                <div id="result">
                    <div id="valorComissao" class="hiddenResultado" style="">
                        <span class="textoSuaComissao">Sua comissão é de</span>
                        <span id="value" class="textoValorComissao"></span>
                    </div>
                </div>
            </div>
        </div>

    </section> --}}

    <!-- FAQ-->
    <section class="container mb-5 pb-lg-5">
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

            var menuAvaliadorHeader = document.getElementById('menuAvaliador');


            if(menuAvaliadorHeader != null){
            window.addEventListener('scroll', function () {
                if (window.scrollY > 0) 
                {
                    menuAvaliadorHeader.classList.add('bg-header');
                    menuAvaliadorHeader.classList.remove('bg-transparente');
                }
                else{
                    menuAvaliadorHeader.classList.remove('bg-header');
                    menuAvaliadorHeader.classList.add('bg-transparente');
                } 
            });
            }

        })();


        const form = document.getElementById('form-simuladorFotografo');

        function validarNumeroInteiro(input) {
            var valor = input.value;
            if (!/^[0-9]*$/.test(valor)) {
                document.getElementById('mensagemErro').textContent = "Digite apenas números inteiros.";
                input.value = '';
            } else {
                document.getElementById('mensagemErro').textContent = "";
            }
        }

        function formatarNumeroBrasileiro(numero) {
            var numeroFormatado = new Intl.NumberFormat('pt-BR', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }).format(numero);

            return numeroFormatado;
        }

        form.addEventListener('submit', function(event){
            event.preventDefault();

            const valor = document.getElementById('quantidadeServico').value;

            const resultadoConvertido = Number(valor);

            var valorComissao = (resultadoConvertido*200).toFixed(2);

            const valorFinal = document.getElementById('value');

            valorComissao = parseFloat(valorComissao);

            console.log(typeof valorComissao);

            valorComissao = formatarNumeroBrasileiro(valorComissao);

            // const comissaoConvertida = moedaMask(valorComissao);

            valorFinal.textContent = "R$ " + valorComissao;

            document.getElementById('valorComissao').classList.remove('hiddenResultado');
            document.getElementById('valorComissao').classList.add('formatacaoResultado');

        });
    </script>

@endsection