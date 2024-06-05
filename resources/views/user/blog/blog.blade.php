@extends('index')

@section('content')

    @php

        $postsCarrossel = App\Http\Controllers\User\BlogController::getListPost();


        $categorias = App\Http\Controllers\User\BlogController::getTodasCategorias();

    @endphp

    <div class="container mt-5 mb-md-4 py-5 paddingAjustesMobile-30 removerPaddingBottomMobile">

        <!-- CAMINHO DA PAGINA -->
        <nav class="mb-3 pt-md-3 " aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home5')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blog</li>
            </ol>
        </nav>

        <h1 class="d-flex align-items-end justify-content-between mb-4">Nome da empresa Blog</h1>

        <!-- CARROSSEL -->
        <div class="tns-carousel-wrapper">
            <div class="tns-carousel-inner" data-carousel-options="{&quot;mode&quot;: &quot;gallery&quot;, &quot;nav&quot;: false, &quot;controlsContainer&quot;: &quot;#sponsored-news-controls&quot;}">

                @foreach ($postsCarrossel as $post)

                @php
                    $categoria = App\Http\Controllers\User\BlogController::getCategoria($post->type_post);

                    $comentarios = App\Http\Controllers\User\BlogController::getComentariosPost($post->id);


                    $contComentario = 0;

                    foreach ($comentarios as $key => $comentario) {
                        $contComentario = $contComentario + 1;
                    }

                    if($contComentario == 0){
                        $quantidadeComentarios = "Sem comentários";
                    }
                    else {
                        if($contComentario == 1){
                            $quantidadeComentarios = $contComentario . " comentário" ;
                        }                        
                        else {
                            $quantidadeComentarios = $contComentario . " comentários" ;
                        }
                    }
                    
                    
                    $stringDataCriado  = strval($post->created_at);
    
                    $cont = 0;

                    for ($i = 0; $i < strlen($stringDataCriado); $i++) {
                        if ($stringDataCriado[$i] == '-') {
                            $cont = $cont + 1;

                            if ($cont == 1) {
                                $novaStringMes = $stringDataCriado[$i + 1] . "" . $stringDataCriado[$i + 2];
                            }

                            if ($cont == 2) {
                                $novaStringDia = $stringDataCriado[$i + 1] . "" . $stringDataCriado[$i + 2];
                            }
                        }
                    }

                    $mesFormatado = "";
                    if ($novaStringMes == '01') {
                        $mesFormatado = "Janeiro";
                        
                    } else if ($novaStringMes == '02') {
                        $mesFormatado = "Fevereiro";
                        
                    } else if ($novaStringMes == '03') {
                        $mesFormatado = "Março";
                        
                    } else if ($novaStringMes == '04') {
                        $mesFormatado = "Abril";
                        
                    } else if ($novaStringMes == '05') {
                        $mesFormatado = "Maio";
                        
                    } else if ($novaStringMes == '06') {
                        $mesFormatado = "Junho";
                        
                    } else if ($novaStringMes == '07') {
                        $mesFormatado = "Julho";
                        
                    } else if ($novaStringMes == '08') {
                        $mesFormatado = "Agosto";
                        
                    } else if ($novaStringMes == '09') {
                        $mesFormatado = "Setembro";
                        
                    } else if ($novaStringMes == '10') {
                        $mesFormatado = "Outubro";
                        
                    } else if ($novaStringMes == '11') {
                        $mesFormatado = "Novembro";
                        
                    } else if ($novaStringMes == '12') {
                        $mesFormatado = "Dezembro";
                        
                    }

                    $texto = $post->only_text;
                    $limitarTexto = substr($texto, 0, 280);

                    $quantidadeCaracteres = strlen($texto);

                @endphp
                <!-- Item-->
                <div>
                    <article class="row">
                        <div class="col-md-7 col-lg-8 mb-lg-0 mb-3 mb-md-0">
                            <a class="d-block position-relative" href="{{route('user.blog.post', ['id' => $post->id])}}">
                                <img class="rounded-3" src="{{ asset('storage_posts/' . $post->image_path) }}" alt="Imagem Post" style="    max-height: 400px;
                                width: 100%;">
                            </a>
                        </div>
                        <div class="col-md-5 col-lg-4">
                            <a class="fs-sm text-uppercase text-decoration-none">{{$categoria->name}}</a>
                                <h2 class="h5 pt-1">
                                    <a class="nav-link" href="{{route('user.blog.post', ['id' => $post->id])}}">{{$post->title}}</a>
                                </h2>
                                @if($quantidadeCaracteres > 280)
                                <p class="d-md-none d-xl-block mb-4">{{$limitarTexto}}...</p><a class="d-flex align-items-center text-decoration-none">
                                @else
                                <p class="d-md-none d-xl-block mb-4">{{$limitarTexto}}</p><a class="d-flex align-items-center text-decoration-none">
                                @endif
                                <div class="ps-2">
                                    
                                    <div class="d-flex text-body fs-sm">
                                        <span class="me-2 pe-1">
                                            <i class="fi-calendar-alt opacity-60 mt-n1 me-1"></i>{{$novaStringDia}}&nbsp;{{$mesFormatado}}
                                        </span>
                                        <span>
                                            <i class="fi-chat-circle opacity-60 mt-n1 me-1"></i>{{$quantidadeComentarios}}
                                        </span>
                                    </div>

                                </div>
                            </a>
                        </div>
                    </article>
                </div>
                @endforeach


            </div>
        </div>

        <!-- BOTÕES DO CARROSSEL -->
        <div class="tns-carousel-controls pb-5 pt-2 mt-4 mb-lg-3" id="sponsored-news-controls">
            <button class="me-3" type="button">
                <i class="fi-chevron-left fs-xs"></i>
            </button>
            <button type="button">
                <i class="fi-chevron-right fs-xs"></i>
            </button>
        </div>

        <!-- BUSCA E FILTROS -->
        
        <form action="" method="" id="form" class="form">
            <div class="row gy-3 mb-4 pb-2">
                <input type="hidden" id="page" name="page" value="0">

                <!-- BUSCA -->
                <div class="col-md-4 order-md-1 order-2">
                    <div class="position-relative">
                        <input class="form-control pe-5" type="text" id="nome" name="nome" placeholder="Pesquisar pelo Título">
                        <i class="fi-search position-absolute top-50 end-0 translate-middle-y me-3"></i>
                    </div>
                </div>

                <!-- FILTROS -->
                <div class="col-lg-6 col-md-8 offset-lg-2 order-md-2 order-1">
                    <div class="row gy-3">
                        
                        <div class="col-6 d-flex flex-sm-row flex-column align-items-sm-center">
                            <label class="d-inline-block me-sm-2 mb-sm-0 mb-2 text-nowrap" for="categories">
                                <i class="fi-align-left mt-n1 me-2 align-middle opacity-70"></i>
                                Categorias:
                            </label>
                            <select class="form-select" id="categories" name="categoria">
                                <option value="todas">Todas</option>
                                @foreach ($categorias as $categoria)
                                <option value="{{$categoria->id}}">{{ $categoria->name }}</option>
                                @endforeach     

                            </select>
                        </div>
                        <div class="col-6 d-flex flex-sm-row flex-column align-items-sm-center">
                            <label class="d-inline-block me-sm-2 mb-sm-0 mb-2 text-nowrap" for="ordenar">
                                <i class="fi-arrows-sort mt-n1 me-2 align-middle opacity-70"></i>
                                Ordenar por:
                            </label>
                            <select class="form-select" id="ordenar" name="ordenar">
                                <option value="novos">Mais Novos</option>
                                <option value="antigos">Mais Antigos</option>
                            </select>
                        </div>
                        
                    </div>
                </div>
            </div>
        </form>
        

        <!-- GRID PUBLICAÇÕES-->
        <div class=" carregar">


        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

    <script>

        $(document).ready(function() {
            carregarTabelaPost(0);
        });

        $(document).on('click', '#paginationLista a', function(e) {
            e.preventDefault();
            var pagina = $(this).attr('href').split('page=')[1];
            carregarTabelaPost(pagina);
        })

        $(document).on('keyup submit', '#nome', function(e){
            e.preventDefault();
            carregarTabelaPost(0);
        });

        $(document).on('change', '#ordenar', function(e){
            e.preventDefault();
            carregarTabelaPost(0);
        });

        $(document).on('change', '#categories', function(e){
            e.preventDefault();
            carregarTabelaPost(0);
        });

        function carregarTabelaPost(pagina) {
            $('.carregar').html('<div class="spinner-border m-5" role="status"><span class="sr-only"></span></div>');
            $('#page').val(pagina);
            var dados = $('#form').serialize();
            console.log(dados);
            $.ajax({
                url: "{{ route('list.post') }}",
                method: 'GET',
                data: dados
            }).done(function(data) {
                $('.carregar').html(data);
            });
        }

    </script>

@endsection