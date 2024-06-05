@extends('index')

@section('content')

  @php

    $posts = App\Http\Controllers\User\BlogController::getListPost();

  @endphp

  <!-- Caminho da rota -->
  <div class="container mt-5 mb-md-4 pt-5 paddingAjustesMobile-20">
    <nav class="mb-3 pt-md-3" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home5')}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Quem Somos</li>
      </ol>
    </nav>
  </div>

  <!-- Cabeçalho - carrossel -->
  <section class="container mb-5 pb-2 paddingAjustesMobile-20">

    <div class="row align-items-center justify-content-center">

      <!-- INFORMAÇÕES CARROSSEL -->
      <div class="col-lg-4 col-md-5 col-sm-9 order-md-1 order-2 text-md-start text-center">
        <h1 class="mb-4">Sobre a Nome da empresa</h1>
        <p class="mb-4 pb-3 fs-lg">Imobiliária inovadora focada em oferecer serviços imobiliários eficientes e confiáveis, utilizando tecnologia avançada para simplificar a compra e venda de imóveis. Nosso compromisso é com a transparência e a satisfação do cliente.</p>
        <a class="btn btn-lg btn-primary ajusteBotaoMobiles" href="{{route('user.contact.contact')}}">Fale Conosco</a>
      </div>

      <!-- IMAGENS CARROSSEL -->
      <div class="col-lg-7 col-md-6 offset-md-1 col-12 order-md-2 order-1">
        <div id="#imagensSobre" class="tns-carousel-wrapper tns-controls-static tns-nav-outside">

          <div class="tns-carousel-inner" data-carousel-options='{"controls": true ,"nav": true,"loop": false, "gutter":16}'>
            <div><img class="rounded-3" src="assets/img/real-estate/about/hero/01.jpg" alt="Imagem Carrossel"></div>
            <div><img class="rounded-3" src="assets/img/real-estate/about/hero/02.jpg" alt="Imagem Carrossel"></div>
          </div>
        </div>
      </div>

    </div>

  </section>

  <!-- NOSSOS SERVIÇOS -->
  <section class="container mb-5 pb-2 pb-lg-4 paddingAjustesMobile-40">
    <div class="row gy-4">
      <div class="col-md-5 col-12"><img class="d-block mx-auto" src="assets/img/real-estate/illustrations/find.svg" alt="Illustration"></div>
      <div class="col-lg-6 offset-lg-1 col-md-7 col-12">
        <h2 class="h3 mb-lg-5 mb-sm-4 textoMobile-35px">Nossos Serviços</h2>
        <div class="steps steps-vertical">
          <div class="step active">
            <div class="step-progress"><span class="step-number">1</span></div>
            <div class="step-label ms-4">
              <h3 class="h5 mb-2 pb-1">Compra de Imóveis</h3>
              <p class="mb-0">Na Nome da empresa, facilitamos sua jornada na busca pelo imóvel ideal. Com nossa ampla seleção de propriedades, ferramentas de busca intuitivas e suporte especializado, garantimos um processo de compra eficiente e seguro. Confie em nossa expertise para encontrar o lar dos seus sonhos.</p>
            </div>
          </div>
          <div class="step active">
            <div class="step-progress"><span class="step-number">2</span></div>
            <div class="step-label ms-4">
              <h3 class="h5 mb-2 pb-1">Venda de Imóveis</h3>
              <p class="mb-0">Vender seu imóvel com a Nome da empresa significa ter ao seu lado uma equipe de profissionais dedicados a obter o melhor resultado. Utilizamos estratégias de marketing inovadoras e uma vasta rede de contatos para assegurar que seu imóvel alcance o público certo, garantindo uma venda rápida e rentável.</p>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </section>

  <!-- CADASTRE SEU IMÓVEL -->
  <section class="container mb-5 pb-2 pb-lg-5 paddingAjustesMobile-30">
    <h2 class="h3 mb-2 pb-sm-4 textoMobile-35px">Missão, Visão e Valores da Nome da empresa</h2>
    <!-- Grid card-->
    <div class="row row-cols-lg-3 row-cols-sm-2 row-cols-1 gy-sm-5 gy-3 margin-top-setas">
      <!-- Card item-->
      <div class="col">
        <div class="card border-0 shadow-sm position-relative h-100">
          <div class="card-body">
            <div class="h2 mb-2 text-primary">Missão</div>
            
            {{-- <h3 class="h5 card-title mb-2">Missão</h3> --}}
            <p class="card-text fs-sm">Simplificar e acelerar as transações imobiliárias com soluções digitais seguras, proporcionando uma experiência personalizada e protegida para clientes.</p>
          </div>
          <!-- Arrow-->
          <svg class="position-absolute top-0 end-0 mt-n2 d-sm-block d-none" xmlns="http://www.w3.org/2000/svg" width="78" height="30" fill="none" style="transform: translateY(-100%) translateX(70%);">
            <path d="M77.955 14.396c.128-2.86 0-4.67-.576-4.745s-1.279 1.607-2.11 4.378l-1.279 4.897-.563 2.683c-.612-1.434-1.352-2.81-2.212-4.113-2.718-4.072-6.226-7.569-10.321-10.288C54.205 2.687 46.332.186 38.233.008c-8.823-.165-17.491 2.305-24.874 7.087C6.581 11.549 2.118 17.395.66 22.191.033 24.057-.15 26.04.123 27.987c.243 1.367.627 2.037.755 2.012.396 0-.396-3.025 1.522-7.264s6.394-9.339 12.789-13.123c6.905-4.018 14.838-5.974 22.841-5.631 3.811.182 7.574.924 11.164 2.202 7.323 2.623 13.717 7.296 18.403 13.452 1.061 1.417 1.816 2.531 2.404 3.417l-1.637-.278-5.295-1.012c-3.031-.569-4.988-.848-5.179-.392s1.419 1.544 4.335 2.759a47.66 47.66 0 0 0 5.269 1.772c1.023.278 2.097.544 3.21.772.588.127 1.1.228 1.765.342.541.152 1.109.184 1.663.094a3.86 3.86 0 0 0 1.547-.613 2.76 2.76 0 0 0 .934-1.265c.088-.252.156-.51.205-.772l.09-.595.23-1.544.384-2.949c.217-1.873.371-3.569.435-5.062" fill="#eeaa11"></path>
          </svg>
        </div>
      </div>
      <!-- Card item-->
      <div class="col">
        <div class="card border-0 shadow-sm position-relative h-100">
          <div class="card-body">
            <div class="h2 mb-2 text-primary">Visão</div>
            
            {{-- <h3 class="h5 card-title mb-2">Visão</h3> --}}
            <p class="card-text fs-sm">Ser líder em imobiliária digital, reconhecida por excelente atendimento, inovação e segurança nas transações e proteção de dados dos usuários.Nossa equipe verifica as informações do seu imóvel para garantir precisão e qualidade antes da publicação. </p>
          </div>
          <!-- Arrow-->
          <svg class="position-absolute top-0 end-0 mt-n2 d-lg-block d-none" xmlns="http://www.w3.org/2000/svg" width="78" height="30" fill="none" style="transform: translateY(-100%) translateX(70%);">
            <path d="M77.955 14.396c.128-2.86 0-4.67-.576-4.745s-1.279 1.607-2.11 4.378l-1.279 4.897-.563 2.683c-.612-1.434-1.352-2.81-2.212-4.113-2.718-4.072-6.226-7.569-10.321-10.288C54.205 2.687 46.332.186 38.233.008c-8.823-.165-17.491 2.305-24.874 7.087C6.581 11.549 2.118 17.395.66 22.191.033 24.057-.15 26.04.123 27.987c.243 1.367.627 2.037.755 2.012.396 0-.396-3.025 1.522-7.264s6.394-9.339 12.789-13.123c6.905-4.018 14.838-5.974 22.841-5.631 3.811.182 7.574.924 11.164 2.202 7.323 2.623 13.717 7.296 18.403 13.452 1.061 1.417 1.816 2.531 2.404 3.417l-1.637-.278-5.295-1.012c-3.031-.569-4.988-.848-5.179-.392s1.419 1.544 4.335 2.759a47.66 47.66 0 0 0 5.269 1.772c1.023.278 2.097.544 3.21.772.588.127 1.1.228 1.765.342.541.152 1.109.184 1.663.094a3.86 3.86 0 0 0 1.547-.613 2.76 2.76 0 0 0 .934-1.265c.088-.252.156-.51.205-.772l.09-.595.23-1.544.384-2.949c.217-1.873.371-3.569.435-5.062" fill="#eeaa11"></path>
          </svg>
        </div>
      </div>
      <!-- Card item-->
      <div class="col">
        <div class="card border-0 shadow-sm position-relative h-100">
          <div class="card-body">
            <div class="h2 mb-2 text-primary">Valores</div>
            
            {{-- <h3 class="h5 card-title mb-2">Valores</h3> --}}
            <p class="card-text fs-sm">
              1)	Compromisso com o Cliente: Exceder expectativas com transações seguras e satisfação do cliente.
              <br>
              <br>
              2)	Integridade e Segurança: Operar com honestidade, transparência e aderência às práticas de segurança digital.
              <br>
              <br>
              3)	Inovação Contínua: Busca constante por melhorias e reforço nas implementações das boas práticas.
              <br>
              <br>
              4)	Colaboração e Confidencialidade: Promover parcerias confiáveis, aumentando o potencial de negócios imobiliários, com foco na satisfação do cliente.
              </p>
          </div>
          {{-- <!-- Arrow-->
          <svg class="position-absolute top-0 end-0 mt-n2 d-sm-block d-none" xmlns="http://www.w3.org/2000/svg" width="78" height="30" fill="none" style="transform: translateY(-100%) translateX(70%);">
            <path d="M77.955 14.396c.128-2.86 0-4.67-.576-4.745s-1.279 1.607-2.11 4.378l-1.279 4.897-.563 2.683c-.612-1.434-1.352-2.81-2.212-4.113-2.718-4.072-6.226-7.569-10.321-10.288C54.205 2.687 46.332.186 38.233.008c-8.823-.165-17.491 2.305-24.874 7.087C6.581 11.549 2.118 17.395.66 22.191.033 24.057-.15 26.04.123 27.987c.243 1.367.627 2.037.755 2.012.396 0-.396-3.025 1.522-7.264s6.394-9.339 12.789-13.123c6.905-4.018 14.838-5.974 22.841-5.631 3.811.182 7.574.924 11.164 2.202 7.323 2.623 13.717 7.296 18.403 13.452 1.061 1.417 1.816 2.531 2.404 3.417l-1.637-.278-5.295-1.012c-3.031-.569-4.988-.848-5.179-.392s1.419 1.544 4.335 2.759a47.66 47.66 0 0 0 5.269 1.772c1.023.278 2.097.544 3.21.772.588.127 1.1.228 1.765.342.541.152 1.109.184 1.663.094a3.86 3.86 0 0 0 1.547-.613 2.76 2.76 0 0 0 .934-1.265c.088-.252.156-.51.205-.772l.09-.595.23-1.544.384-2.949c.217-1.873.371-3.569.435-5.062" fill="#eeaa11"></path>
          </svg> --}}
        </div>
      </div>
      <!-- Card item-->
      
    </div>
  </section>

  <!-- ESCUTE OS NOSSOS CLIENTES -->
  {{-- <section class="container mb-5 pb-xl-5 pb-md-2 paddingAjustesMobile-20">
    <h2 class="h3 mb-3 text-center textoMobile-35px">Escute nossos clientes</h2>
    <!-- Testimonials carousel-->
    <div id="#testemunhas" class="tns-carousel-wrapper tns-controls-outside-lg tns-nav-outside tns-nav-outside-flush col-lg-10 mx-auto px-0">
      <div class="tns-carousel-inner" data-carousel-options='{"controls": true ,"nav": true,"loop": false, "gutter":24}'>
        <!-- Testimonial slide-->
        <div class="d-flex flex-md-row flex-column align-items-md-start mx-3 py-3"><img class="d-md-block d-none me-4 rounded-3" src="assets/img/real-estate/about/testimonials/01.jpg" width="306" alt="Customer image">
          <div class="card border-0 shadow-sm h-100">
            <blockquote class="blockquote card-body">
              <p>Eu massa, pharetra massa integer. Sed molestie sollicitudin morbi ultrices. Odio is euismodtelle faucibus. Venenatis nunc, tristique turpis cras sodales. In dui, viverra et ac. Id justo, varius nunc, faucibus erat proin elit. Amet diam, aliquet nec quis vel. Donec ut quisque in lorem sapien.</p>
              <footer class="d-flex align-items-center"><img src="{{asset("assets/img/avatars/22.jpg")}}" width="56" alt="Logo">
                <div class="ps-3">
                  <h6 class="fs-base mb-0">João Silva</h6>
                </div>
              </footer>
            </blockquote>
          </div>
        </div>
        <!-- Testimonial slide-->
        <div class="d-flex align-items-start mx-3 py-3"><img class="d-md-block d-none me-4 rounded-3" src="assets/img/real-estate/about/testimonials/02.jpg" width="306" alt="Customer image">
          <div class="card border-0 shadow-sm h-100">
            <blockquote class="blockquote card-body">
              <p>Eu massa, pharetra massa integer. Sed molestie sollicitudin morbi ultrices. Odio is euismodtelle faucibus. Venenatis nunc, tristique turpis cras sodales. In dui, viverra et ac. Id justo, varius nunc, faucibus erat proin elit. Amet diam, aliquet nec quis vel. Donec ut quisque in lorem sapien.</p>
              <footer class="d-flex align-items-center"><img src="{{asset("assets/img/avatars/22.jpg")}}" width="56" alt="Logo">
                <div class="ps-3">
                  <h6 class="fs-base mb-0">João Silva</h6>
                  
                </div>
              </footer>
            </blockquote>
          </div>
        </div>
      </div>
    </div>
  </section> --}}

  <!-- BANNER -->
  <section class="container mb-5 pb-sm-3 pb-lg-4 paddingAjustesMobile-20">
    <div class="bg-secondary rounded-3">
      <div class="col-md-11 col-12 offset-md-1 p-md-0 p-2 d-flex align-items-center justify-content-between">
        <div class="me-md-5 py-md-5 px-md-0 p-4" style="max-width: 526px;">
          <h2 class="mb-md-4">
            Compre ou Venda imóveis com segurança.
          </h2>
          <p class="mb-4 pb-md-3 fs-lg">Estamos aqui para guiar você a cada passo, garantindo uma transação segura e bem-sucedida.</p>
          <a class="btn btn-lg btn-primary ajusteBotaoMobiles" href="{{route('home5')}}"><i class="fi-search me-2 iconeAjusteMobile"></i>Encontrar Imóvel</a>
        </div>
        <div class="col-4 d-md-block d-none align-self-end px-0"><img class="mt-n5" src="assets/img/real-estate/about/01.png" width="406" alt="Cover image"></div>
      </div>
    </div>
  </section>

  <!-- POSTS RECENTES -->
  <section class="container mb-5 pb-lg-5 paddingAjustesMobile-20">
    <div class="d-sm-flex align-items-center justify-content-between mb-4 pb-2">
      <h2 class="h3 mb-sm-0 textoMobile-35px">Nossos Posts em Destaque</h2><a class="btn btn-link fw-normal ms-sm-3 p-0" href="{{route('user.blog.blog')}}">Ir para o Blog<i class="fi-arrow-long-right ms-2"></i></a>
    </div>
    <!-- Carousel-->
    <div class="tns-carousel-wrapper tns-nav-outside">

      <div class="tns-carousel-inner d-block" data-carousel-options='{"controls": true ,"nav": false,"loop": false, "autoHeight":true ,"gutter":16,"responsive": {"0":{"items":1, "gutter": 10},"500":{"items":2, "gutter": 10},"850":{"items":3, "gutter": 10},"1200":{"items":3, "gutter": 10}} }'>

        @foreach ($posts as $post)

          @php
            $categoria = App\Http\Controllers\User\BlogController::getCategoria($post->type_post);


          @endphp

          <!-- Item-->
          <article>
            
            <a class="d-block mb-3" href="{{route('user.blog.post', ['id' => $post->id])}}">
              <img class="rounded-3" src="{{ asset('storage_posts/' . $post->image_path) }}" alt="Imagem Post">
            </a>
            <a class="fs-xs text-uppercase text-decoration-none">{{$categoria->name}}</a>
            <h3 class="fs-base pt-1"><a class="nav-link" href="{{route('user.blog.post', ['id' => $post->id])}}">{{$post->title}}</a></h3>
          </article>

        @endforeach

        
      </div>
    </div>
  </section>

@endsection