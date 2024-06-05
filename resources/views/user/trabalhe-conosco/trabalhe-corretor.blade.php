@extends('index')

@section('content')

    {{-- <!-- MODAL PROCURA IMÓVEIS -->
    <div class="modal fade" id="porcentagemValor" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered p-2 my-0 mx-auto" style="max-width: 950px;">
            <div class="modal-content">
                <div class="modal-body px-0 py-2 py-sm-0">
                    <button class="btn-close position-absolute top-0 end-0 mt-3 me-3" type="button"
                        data-bs-dismiss="modal"></button>
                    
                    <div class="">

                        <div class="col-md-12 ">
                            <div class="conteudoGraficoPizza">
                                <h2 class="tituloGraficoPizza">Como é dividido a comissão</h2>

                                <canvas id="myChart" class="tamanhoGraficoPizza" ></canvas>

                                <div class="divsInfosGrafico">
                                    <div style="width:60%;display:flex;flex-direction:column" class="textosInfosGrafico">
                                        <h2 class="tituloGraficoPizza">Comissão de Venda (5%)</h2>
                                        <span>Valor da comissão acordada entre o consultor imobiliário e o proprietário do imóvel.</span>
                                    </div>
                                    <div class="valorInfosGratifo" style="width:40%;">
                                        <span >R$ 5.000,00</span>
                                    </div>
                                    
                                </div>
                                

                                <div class="detailsGrafico">
                                    <ul>
                                        <li>Seu Ganho: <span class="porcentualGrafico">R$ 5.000,00</span></li>
                                        <li>Taxa de Sucesso Nome da empresa: <span class="porcentualGrafico">R$ 5.000,00</span></li>
                                        <li>Teste: <span class="porcentualGrafico">30%</span></li>
                                        <li>Teste: <span class="porcentualGrafico">30%</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 px-4 pt-2 pb-4 px-sm-5 pb-sm-5 pt-md-5 ">

                        </div>

                    </div>
                    
                </div>
            </div>
        </div>
    </div> --}}

    <!-- TOPO -->
    <section class="bg-cinza py-5">
        <div class="container topo-padding-top topo-padding-bottom">

            <!-- CAMINHO DA PAGINA -->
            <nav class="mb-4 pb-lg-3 esconderMobile" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home5')}}">Home</a></li>
                    <li class="breadcrumb-item"><a>Trabalhe Conosco</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Corretor</li>
                </ol>
            </nav>

            <!-- Page title-->
            <div class="mb-lg-5 mx-auto text-center paddingAjustesMobile-20" style="max-width: 856px;">
                <h1 class="display-5 mb-4 pb-lg-2">
                    Trabalhe conosco como <span class='text-primary'>Corretor</span>
                </h1>
                <p class="lead opacity-70">
                    Junte-se à nossa equipe de corretores talentosos e faça parte de uma jornada de sucesso no mercado imobiliário. Valorizamos sua expertise e comprometimento.
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
                <img class="rounded-3 tamanhoImagemTrabalhadores" src="assets/img//new_foto_corretor.png" alt="Imagem Corretor">
            </div>
            <div class="col-lg-4 ms-lg-n5 col-sm-9 text-lg-start text-center">
                <div class="ms-lg-n5 pe-xl-5">
                    <h1 class="mb-lg-4">Faça parte da nossa equipe</h1>
                    <p class="mb-4 pb-lg-3 fs-lg">Seja parte de uma equipe dedicada e apaixonada pelo ramo imobiliário. Aqui, valorizamos cada membro e oferecemos oportunidades para crescimento e sucesso.</p>
                  
                    <a class="btn btn-lg btn-primary w-sm-auto w-100 ajusteBotaoMobiles deixarAutoBotao" >
                        Fazer parte <i class="fi-chevron-right ms-2 iconeAjusteMobile iconeFazerParteAjuste"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- COMO FUNCIONA -->
    <section class="container mb-5 margin-bottom-70 paddingAjustesMobile-40">
        <div class="d-sm-flex align-items-center justify-content-center">
            <h2 class="h3 mb-2 mb-sm-0 textoMobile-35px">Como funciona</h2>
        </div>
        <div class="d-sm-flex justify-content-center">
            <div class="col-md-5 col-lg-4 pt-4 mt-2 pt-md-5 mt-md-3">
                <div class="d-flex pb-4 pb-md-5 mb-2"><i class="fi-file lead text-primary mt-1 order-md-2"></i>
                    <div class="text-md-end ps-3 ps-md-0 pe-md-3 order-md-1">
                    <h3 class="h6 mb-1">Preencha o formulário de cadastro</h3>
                    <p class="fs-sm mb-0">Seu primeiro passo é o cadastro. Avaliaremos seu perfil e faremos reuniões iniciais.</p>
                    </div>
                </div>
                <div class="d-flex pb-4 pb-md-5 mb-2"><i class="fi-route lead text-primary mt-1 order-md-2"></i>
                    <div class="text-md-end ps-3 ps-md-0 pe-md-3 order-md-1">
                    <h3 class="h6 mb-1">Treinamento</h3>
                    <p class="fs-sm mb-0">Ofereceremos treinamentos para garantir serviços de alta qualidade e eficiência, preparando-o para um atendimento excepcional aos clientes.</p>
                    </div>
                </div>
                <div class="d-flex pb-4 pb-md-5 mb-2"><i class="fi-user lead text-primary mt-1 order-md-2"></i>
                    <div class="text-md-end ps-3 ps-md-0 pe-md-3 order-md-1">
                    <h3 class="h6 mb-1">Receba seu Login ao Sistema</h3>
                    <p class="fs-sm mb-0">Você receberá credenciais para acessar nosso sistema, permitindo começar os atendimentos.</p>
                    </div>
                </div>
            </div>
            <div style="width: 90px"></div>
            <div class="col-md-5 col-lg-4 pt-md-5 mt-md-3 padding-topTrabalhadores" >
                <div class="d-flex pb-4 pb-md-5 mb-2"><i class="fi-info-circle lead text-primary mt-1"></i>
                    <div class="ps-3">
                    <h3 class="h6 mb-1">Receba os leads para atendimento</h3>
                    <p class="fs-sm mb-0">Disponibilizamos leads de clientes de forma justa e equitativa, proporcionando oportunidades consistentes de negociação.</p>
                    </div>
                </div>
                <div class="d-flex pb-4 pb-md-5 mb-2"><i class="fi-dashboard lead text-primary mt-1"></i>
                    <div class="ps-3">
                    <h3 class="h6 mb-1">Realize outros serviços extras</h3>
                    <p class="fs-sm mb-0">Além de transações imobiliárias, oferecemos atividades remuneradas adicionais, alinhadas às suas habilidades e interesses.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @php

        $configuracao = App\Http\Controllers\User\ContactController::getVideoVenda();
    
    @endphp

    @foreach ($configuracao as $configuracao)
        @if($configuracao->link_corretores != null)
            <!-- VIDEO -->
            <div class="container margin-bottom-123 max-width-941 paddingAjustesMobile-20">
                <iframe src="{{ $configuracao->link_corretores }}" class="videoInfosGerais"></iframe>
            </div>
        @endif
    @endforeach

    <!-- Encontrar serviços -->
    <section class="container margin-bottom-123 paddingAjustesMobile-40">
        <div class="row gy-4 align-items-md-center">
          <div class="col-md-6"><img src="assets/img/job-board/illustrations/steps.svg" alt="Illustration"></div>
          <div class="col-lg-5 offset-lg-1 col-md-6">
            <h2 class="mb-4">Concentre-se em Vender, Nós Cuidamos do Resto</h2>
            <p class="mb-4 pb-3 fs-lg">Nossa imobiliária encaminha clientes interessados a você. Seu papel é atender, mostrar imóveis e fechar vendas. Assim, o corretor parceiro foca no cliente, e nós fazemos o resto.</p>
           
            <a class="btn btn-lg btn-primary rounded-pill w-sm-auto w-100 ajusteBotaoMobiles deixarAutoBotao">
                Fazer parte<i class="fi-chevron-right ms-2 iconeFazerParteAjuste iconeAjusteMobile"></i>
            </a>
          </div>
        </div>
    </section>

    {{-- <!-- EXEMPLO BITRIX -->
    <button>
    
    </button> --}}

    {{-- <!-- SIMULE UMA VENDA -->
    <section class="container mb-5 pb-lg-5">
        <h2 class="mb-sm-4 pb-md-2 text-center">Simule uma Venda</h2>
        <p class="lead opacity-70" style="text-align: center">
            Preencha o valor de imóvel e simule a comissão que você receberá.
        </p>
        <div class="div-formulario-simulador">
            <div class="camposSimulador">
                <form id="form-simulador">
                    <div class="input-box-simulador">
                        <label for="valor-imovel" class="textoValorImovel">
                            Valor do Imóvel*
                        </label>
                        <div class="input-field-simulador">
                            <input type="text" id="valor-imovel" onkeyup="handleMoeda(event)" maxlength="14" class="form-control" required>
                        </div>
                    </div>

                    <div class="porcentagemComissao">
                        <span class="textoComissao">
                            Comissão
                        </span>
                        <span class="textoPorcentagemComissao">5% do valor do Imóvel</span>
                    </div>

                    <button id="calcular" class="btn btn-lg btn-primary d-block w-100">
                        Calcular sua comissão
                    </button>
                </form>
            </div>
            <div id="infos" class="boxResultado">
                <div id="result">
                    <div id="valorComissao" class="hiddenResultado" style="">
                        <span class="textoSuaComissao">Sua faturamento é de</span>
                        <span id="value" class="textoValorComissao"></span>

                        <span class="textoSuaTaxa">E o valor de taxa de de sucesso que você vai pagar é de</span>
                        <span id="valueTaxa" class="textoValorTaxa"></span>
                        <button data-bs-toggle="modal" id="" href="#porcentagemValor" class="btn btn-lg btn-primary d-block botaoEntendaMelhor">
                            Entenda Melhor
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </section> --}}

    {{-- <div class="chart-container">
        <canvas id="my-chart" width="400" height="400"></canvas>
    </div> --}}
    {{-- 
    <div class="conteudoGraficoPizza">
        <canvas id="myChart" class="tamanhoGraficoPizza" ></canvas>

        <div class="detailsGrafico">
            <ul>
                <li>Teste: <span class="porcentualGrafico">30%</span></li>
                <li>Teste: <span class="porcentualGrafico">30%</span></li>
                <li>Teste: <span class="porcentualGrafico">30%</span></li>
                <li>Teste: <span class="porcentualGrafico">30%</span></li>
            </ul>
        </div>
    </div> --}}
      
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      --}}

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

    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{asset("assets/js/user/corretor/corretor.bundle.js")}}"></script> --}}

    <script>
        // const form = document.getElementById('form-simulador');

        // form.addEventListener('submit', function(event){
        //     event.preventDefault();

        //     const valor = document.getElementById('valor-imovel').value;

        //     const valorFormatado = valor.replace(/,/g, "").replace(/\./g, "");

        //     const primeiraParte = valorFormatado.slice(0, -2);
        //     const duasUltimasLetras = valorFormatado.slice(-2);

        //     const resultado = primeiraParte + '.' + duasUltimasLetras;

        //     const resultadoConvertido = Number(resultado);

        //     const porcentagem = (resultadoConvertido*0.05).toFixed(2);

        //     const valorFinal = document.getElementById('value');

        //     const porcentagemConvertida = moedaMask(porcentagem);

        //     //PEGUEI O CAMPO TAXA
        //     const campoTaxa = document.getElementById('valueTaxa');

        //     //SETAR O VALOR NELE
        //     var valorTaxa = '5000.00';

        //     //FORMATANDO O VALOR
        //     var formatarTaxa = moedaMask(valorTaxa);

        //     campoTaxa.textContent = "R$ " + formatarTaxa;
        //     valorFinal.textContent = "R$ " + porcentagemConvertida;

        //     document.getElementById('valorComissao').classList.remove('hiddenResultado');
        //     document.getElementById('valorComissao').classList.add('formatacaoResultado');

        // });       

        // const ctx = document.getElementById('myChart');
    
        // new Chart(ctx, {
        //     type: 'doughnut',
        //     data: {
        //         labels: ['Seu Ganho', 'Taxa Nome da empresa'],
        //         datasets: [{
        //             data: [{id: 'Sales', nested: {value: 1500}}, {id: 'Purchases', nested: {value: 500}}]
        //         }]
        //         // labels: ['Seu Ganho', 'Taxa Nome da empresa', 'Quem indicou', 'Green', 'Purple', 'Orange'],
        //         // datasets: [{
        //         //     label: '# of Votes',
        //         //     data: [50, 19, 3, 5, 2, 3],
                    
        //         // }]
        //     },
        //     options: {
        //         borderWidth: 10,
        //         borderRadius: 2,
        //         hoverBorderWidth: 0,
        //         plugins: {
        //             legend: {
        //                 display: false
        //             }
        //         },    
        //         parsing: {
        //             key: 'nested.value'
        //         }
        //     }
        // });


        (function () {

            var menuCorretorHeader = document.getElementById('menuCorretor');

            if(menuCorretorHeader != null){
                window.addEventListener('scroll', function () {
                    if (window.scrollY > 0) 
                    {
                        menuCorretorHeader.classList.add('bg-header');
                        menuCorretorHeader.classList.remove('bg-transparente');
                    }
                    else{
                        menuCorretorHeader.classList.remove('bg-header');
                        menuCorretorHeader.classList.add('bg-transparente');
                    } 
                });
            }

        })();

    </script>
@endsection