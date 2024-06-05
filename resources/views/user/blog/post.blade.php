@extends('index')

@section('content')
    @foreach ($posts as $post)

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

        @endphp

        <div class="container mt-5 mb-md-4 py-5 paddingAjustesMobile-30">

            <!-- CAMINHO -->
            <nav class="mb-3 pt-md-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home5') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('user.blog.blog') }}">Blog</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
                </ol>
            </nav>

            <!-- TITULO -->
            <a class="nav-link d-inline-block fw-normal text-uppercase px-0 mb-2">{{ $categoria->name}}</a>
            <h1 class="h2 mb-4">{{ $post->title }}</h1>
            <div id="dataCriado" style="display:none">{{ $post->created_at }}</div>
            <div class="mb-4 pb-1">
                <ul class="list-unstyled d-flex flex-wrap mb-0 text-nowrap">
                    <li class="me-3" style="display: flex;align-items: baseline;">
                        <i class="fi-calendar-alt me-2 mt-n1 opacity-60"></i>
                        <div id="dataFormatada"></div>
                    </li>
                    <li class="me-3 border-end"></li>
                    <li class="me-3"><a class="nav-link-muted" href="#comments" data-scroll><i
                                class="fi-chat-circle me-2 mt-n1 opacity-60"></i>{{$quantidadeComentarios}}</a></li>
                </ul>
            </div>

            <!-- Post content-->
            <div class="mb-4 pb-md-3">
                <img class="rounded-3" src="{{ asset('storage_posts/' . $post->image_path) }}" alt="Imagem do Post"
                    style="width: 100%;max-height: 700px;">
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-1 mb-md-0 mb-4 mt-md-n5">
                    <!-- Sharing-->
                    <div class="sticky-top py-md-5 mt-md-5">
                        <div class="d-flex flex-md-column align-items-center my-2 mt-md-4 pt-md-5">
                            <div class="d-md-none fw-bold text-nowrap me-2 pe-1">
                                Compartilhar:
                            </div>
                            <a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle mb-md-2 me-md-0 me-2"
                                href="https://www.facebook.com/sharer/sharer.php?u=https://development..com/post/{{ $post->id }}" data-bs-toggle="tooltip" target="_blank" title="Compartilhar no Facebook">
                                <i class="fi-facebook"></i>
                            </a>
                            <a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle mb-md-2 me-md-0 me-2"
                                href="https://api.whatsapp.com/send?text=https://development..com/post/{{$post->id}}" target="_blank" data-bs-toggle="tooltip" title="Compartilhar no WhatsApp">
                                <i class="fi-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-10">

                    <!-- CONTEUDO -->
                    <div id="post-conteudo" style="display:none">
                        {{ $post->content_text }}
                    </div>

                    <div id="conteudoHtmlPost">

                    </div>


                    {{-- <h6>Feugiat eget gravida urna placerat posuere pulvinar. Id nibh hendrerit semper urna consequat. Mauris elit tellus risus ultricies ut consequat. Tempor tellus imperdiet nec velit fames pellentesque sed sed arcu. Neque quam id pellentesque in diam in.</h6>
                    <p>Purus ornare nisl est nec. Nunc, enim tellus pretium viverra quisque id in metus volutpat. Urna eget velit venenatis, commodo eget massa. Magna donec dictum cras nullam platea. Diam rhoncus massa lectus pellentesque tristique. Amet commodo, egestas vitae bibendum. Volutpat elit condimentum integer tortor porttitor justo vel lobortis risus. Lacinia pellentesque fermentum tellus orci mauris, velit duis eget. Commodo justo, hac ligula molestie felis, iaculis. Vitae dui at ante orci, dictum fusce. Urna, sed urna fringilla faucibus euismod aliquet nec. Quis libero, fermentum amet eu, condimentum auctor. Sit vel ipsum sem tempus gravida et. Scelerisque blandit orci, est quis. Nisi, tellus amet est nascetur habitant faucibus ornare et vivamus.</p>
                    <p>Convallis massa nunc, tempus eget egestas sollicitudin mauris. Purus donec sed neque arcu, dictumst tortor nisi, odio. A sit lectus sem velit orci, rhoncus pharetra facilisis. Cras sodales a, dui pellentesque enim odio rutrum leo. Auctor viverra sit sit ut. Massa, elit venenatis, ultrices viverra at sagittis, velit. Cursus tempus phasellus consectetur suspendisse a blandit pellentesque diam neque. Massa est nibh congue elit amet, diam faucibus. Morbi non est semper ullamcorper quam iaculis at.</p>
                    <blockquote class="blockquote">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <footer class="fs-base">— João Silva</footer>
                    </blockquote>
                    <p>Praesent sed pulvinar posuere nisl tincidunt. Iaculis sit quam magna congue. Amet vel non aliquet habitasse. Egestas erat odio et, eleifend turpis etiam blandit interdum. Nec augue ut senectus quisque diam quis. At augue accumsan, in bibendum. A eget et, eget quisque egestas netus vel. Velit, aliquet turpis convallis ullamcorper. Scelerisque sagittis condimentum pretium in vitae etiam lacinia quis amet. Porttitor consequat, sollicitudin vivamus pharetra nibh faucibus neque, viverra. Praesent amet sed lacus vitae.</p>
                    <p>Velit parturient tellus tellus, congue pulvinar tellus viverra. In cum massa mattis ac. Amet vitae massa ut mi etiam. Auctor aliquam tristique felis donec eu sit nisi. Accumsan mauris eget convallis mattis sed etiam scelerisque.</p> --}}
                    <!-- Post tags-->
                    <div class="d-flex align-items-center my-md-5 my-4 py-md-4 py-3 border-top">
                        {{-- <div class="fw-bold text-nowrap mb-2 me-2 pe-1">Tags:</div>
                    <div class="d-flex flex-wrap"><a class="btn btn-xs btn-outline-secondary rounded-pill fs-sm fw-normal me-2 mb-2" href="#">Tutorial</a><a class="btn btn-xs btn-outline-secondary rounded-pill fs-sm fw-normal me-2 mb-2" href="#">Imóvel</a><a class="btn btn-xs btn-outline-secondary rounded-pill fs-sm fw-normal mb-2" href="#">Venda</a></div> --}}
                    </div>
                    <!-- Comments-->
                    <div class="mb-4 mb-md-5" id="comments">
                        <h3 class="mb-4 pb-2">{{ count($comments) }} comentários</h3>
                        <!-- Comment-->
                        @foreach ($comments as $item)
                            <div class="border-bottom pb-4 mb-4">
                                <div class="d-flex align-items-center pe-2">
                                    <div class="">
                                        <h6 class="fs-base mb-0">{{ $item->name }}</h6><span
                                            class="text-muted fs-sm">{{ $item->created_at->format('d/m/y H:i') }}</span>
                                    </div>
                                </div>


                                <span>{{ $item->comment }}</span>

                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

            <!-- FORMULÁRIO DE COMENTÁRIOS -->
            <div class="card py-md-4 py-3 shadow-sm">
                <div class="card-body col-lg-8 col-md-10 mx-auto px-md-0 px-4">
                    <h3 class="mb-4 pb-sm-2">Deixe seu Comentário</h3>
                    <form id="form_user_add_post" class="needs-validation row gy-md-4 gy-3" novalidate
                        data-request="{{ route('user.blog.addComment') }}">
                        <input type="hidden" name="csrf_token" value="{{ csrf_token() }}" />

                        <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}">
                        <div class="col-sm-6">
                            <label class="form-label" for="comment-name">Nome</label>
                            <input class="form-control form-control-lg" type="text" id="comment-name"
                                placeholder="Digite seu nome" required>
                            <div class="invalid-feedback">Digite seu nome.</div>
                        </div>

                        <div class="col-sm-6">
                            <label class="form-label" for="comment-email">E-mail</label>
                            <input class="form-control form-control-lg" type="email" id="comment-email"
                                placeholder="Digite um e-mail" required>
                            <div class="invalid-feedback">Digite um e-mail.</div>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="comment-text">Comentário</label>
                            <textarea class="form-control form-control-lg" id="comment-text" rows="4" placeholder="Digite seu comentário"
                                required></textarea>
                            <div class="invalid-feedback">Digite seu comentário.</div>
                        </div>
                        <div class="col-12 py-2">
                            <button class="btn btn-lg btn-primary" type="submit" id="submit_form_add_post">Adicionar
                                Comentário</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- FORMULÁRIO DE COMENTÁRIOS -->
        {{-- <div class="card py-md-4 py-3 shadow-sm">
            <div class="card-body col-lg-8 col-md-10 mx-auto px-md-0 px-4">
                <h3 class="mb-4 pb-sm-2">Deixe seu Comentário</h3>
                <form id="form_user_add_post" class="needs-validation row gy-md-4 gy-3" novalidate
                    data-request="{{ route('user.blog.addComment') }}">
                    <input type="hidden" name="csrf_token" value="{{ csrf_token() }}" />

                    <div class="col-sm-6">
                        <label class="form-label" for="comment-name">Nome</label>
                        <input class="form-control form-control-lg" type="text" id="comment-name"
                            placeholder="Digite seu nome" required>
                        <div class="invalid-feedback">Digite seu nome.</div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="comment-email">E-mail</label>
                        <input class="form-control form-control-lg" type="email" id="comment-email"
                            placeholder="Digite um e-mail" required>
                        <div class="invalid-feedback">Digite um e-mail.</div>
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="comment-text">Comentário</label>
                        <textarea class="form-control form-control-lg" id="comment-text" rows="4" placeholder="Digite seu comentário"
                            required></textarea>
                        <div class="invalid-feedback">Digite seu comentário.</div>
                    </div>
                    <div class="col-12 py-2">
                        <button class="btn btn-lg btn-primary" id="submit_form_add_post" type="submit">Adicionar
                            Comentário</button>
                    </div>
                </form>
            </div>
        </div> --}}
        </div>
        <script>
          

            var conteudoPost = document.getElementById("post-conteudo");

            var conteudoPostString = conteudoPost.innerHTML;
            var stringAdicional = 'blockquote class="blockquote"'
            var stringCorrigida = conteudoPostString.replace(/&lt;/g, "<");
            stringCorrigida = stringCorrigida.replace(/&gt;/g, ">");
            stringCorrigida = stringCorrigida.replace(/&amp;nbsp;/g, "<br/>");
            stringCorrigida = stringCorrigida.replace("blockquote", stringAdicional);

            console.log(stringCorrigida);

            var conteudoHtmlPost = document.getElementById("conteudoHtmlPost");
            conteudoHtmlPost.insertAdjacentHTML("beforeend", stringCorrigida);

            var dataCriado = document.getElementById("dataCriado");
            var stringDataCriado = dataCriado.innerHTML;
            console.log(stringDataCriado);

            var cont = 0;

            for (var i = 0; i < stringDataCriado.length; i++) {
                if (stringDataCriado[i] == '-') {
                    cont = cont + 1;

                    if (cont == 1) {
                        var novaStringMes = stringDataCriado[i + 1] + stringDataCriado[i + 2];
                    }

                    if (cont == 2) {
                        var novaStringDia = stringDataCriado[i + 1] + stringDataCriado[i + 2];
                    }
                }
            }

            var mesFormatado = "";
            if (novaStringMes == '01') {
                mesFormatado = "Janeiro";
                console.log(mesFormatado);
            } else if (novaStringMes == '02') {
                mesFormatado = "Fevereiro";
                console.log(mesFormatado);
            } else if (novaStringMes == '03') {
                mesFormatado = "Março";
                console.log(mesFormatado);
            } else if (novaStringMes == '04') {
                mesFormatado = "Abril";
                console.log(mesFormatado);
            } else if (novaStringMes == '05') {
                mesFormatado = "Maio";
                console.log(mesFormatado);
            } else if (novaStringMes == '06') {
                mesFormatado = "Junho";
                console.log(mesFormatado);
            } else if (novaStringMes == '07') {
                mesFormatado = "Julho";
                console.log(mesFormatado);
            } else if (novaStringMes == '08') {
                mesFormatado = "Agosto";
                console.log(mesFormatado);
            } else if (novaStringMes == '09') {
                mesFormatado = "Setembro";
                console.log(mesFormatado);
            } else if (novaStringMes == '10') {
                mesFormatado = "Outubro";
                console.log(mesFormatado);
            } else if (novaStringMes == '11') {
                mesFormatado = "Novembro";
                console.log(mesFormatado);
            } else if (novaStringMes == '12') {
                mesFormatado = "Dezembro";
                console.log(mesFormatado);
            }

            var dataFormatada = document.getElementById("dataFormatada");
            dataFormatada.innerHTML = novaStringDia + " " + mesFormatado;
        </script>
    @endforeach
@endsection
