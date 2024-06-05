    
    @if(Request::is(['404erro']) || Request::is(['home3']) || Route::currentRouteName() === 'fallback.404')

        <!-- SEM FOOTER -->
        
    @elseif(Request::is(['usuario.laravel']) || Route::currentRouteName() === 'home5')

        @php
            $dados = App\Http\Controllers\User\DadosUserController::getDados();
        @endphp

        @if(isset($dados) && $dados->count() > 0)
            @foreach ($dados as $dado)

            @php
                                
                $minhaString = $dado->whatsapp;

                // Remove '(' e ')' da string
                $semCaracteres = str_replace(array('(', ')', ' ', '-'), '', $minhaString);

            @endphp
            <!-- Footer-->
            <footer class="footer bg-secondary" style="position: fixed;bottom: 0; left:0; width:100%">
                <div class="border-top">
                    <div class="container pt-3 pb-3 d-flex flex-row divsInfinityScroll" style="align-items: center;">
                        <div class="text-center fs-sm">&copy; Nome da empresa
                        </div>

                        <div class="divRedesHomeFooter">
                            <div class="">
                                @if(isset($semCaracteres))
                                    <a class="btn btn-icon btn-light-primary btn-xs me-2" href="https://web.whatsapp.com/send?phone=55{{$semCaracteres}}&text=Olá, gostaria de mais informações sobre a Nome da empresa." target="_blank" style="background-color: transparent">
                                        <i class="fi-whatsapp"></i>
                                    </a>
                                @endif

                                @if(isset($dado->facebook))
                                    <a class="btn btn-icon btn-light-primary btn-xs me-2" href="{{$dado->facebook}}" style="background-color: transparent" target="_blank">
                                        <i class="fi-facebook"></i>
                                    </a>
                                @endif

                                @if(isset($dado->instagram))
                                    <a class="btn btn-icon btn-light-primary btn-xs me-2" href="{{$dado->instagram}}" style="background-color: transparent" target="_blank">
                                        <i class="fi-instagram"></i>
                                    </a>
                                @endif

                            </div>
                        </div>
                        
                        <div class="ulDivFooter">
                            <ul class="nav flex-row">
                                <li class="nav-item" style="margin-right: 20px"><a class="nav-link p-0 fs-sm" href="{{route('user.about.about')}}" style="font-weight:normal">Sobre</a>
                                </li>
                                <li class="nav-item" style="margin-right: 20px"><a class="nav-link p-0 fs-sm" href="{{route('user.blog.blog')}}" style="font-weight:normal">Blog</a></li>
                                <li class="nav-item" style="margin-right: 20px"><a class="nav-link p-0 fs-sm" href="{{route('user.contact.contact')}}" style="font-weight:normal">Contato</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </footer>
            @endforeach
        @else
            <!-- Footer-->
            <footer class="footer bg-secondary" style="position: fixed;bottom: 0; left:0; width:100%">
                <div class="border-top">
                    <div class="container pt-3 pb-3 d-flex flex-row divsInfinityScroll" style="align-items: center;">
                        <div class="text-center fs-sm">&copy; Nome da empresa
                        </div>
    
                        {{-- <div class="divRedesHomeFooter">
                            <div class="">
                                <a class="btn btn-icon btn-light-primary btn-xs me-2" href="#" style="background-color: transparent">
                                    <i class="fi-whatsapp"></i>
                                </a>
                                <a class="btn btn-icon btn-light-primary btn-xs me-2" href="#" style="background-color: transparent">
                                    <i class="fi-facebook"></i>
                                </a>
                                <a class="btn btn-icon btn-light-primary btn-xs me-2" href="#" style="background-color: transparent">
                                    <i class="fi-instagram"></i>
                                </a>
                            </div>
                        </div> --}}
                        
                        <div class="ulDivFooter">
                            <ul class="nav flex-row">
                                <li class="nav-item" style="margin-right: 20px"><a class="nav-link p-0 fs-sm" href="{{route('user.about.about')}}" style="font-weight:normal">Sobre</a>
                                </li>
                                <li class="nav-item" style="margin-right: 20px"><a class="nav-link p-0 fs-sm" href="{{route('user.blog.blog')}}" style="font-weight:normal">Blog</a></li>
                                <li class="nav-item" style="margin-right: 20px"><a class="nav-link p-0 fs-sm" href="{{route('user.contact.contact')}}" style="font-weight:normal">Contato</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
    
            </footer>
        @endif
    @else
    
        @php
            $dados = App\Http\Controllers\User\DadosUserController::getDados();
        @endphp

        
        @if(isset($dados) && $dados->count() > 0)
            @foreach ($dados as $dado)


            @php
                                
                $minhaString = $dado->whatsapp;

                // Remove '(' e ')' da string
                $semCaracteres = str_replace(array('(', ')', ' ', '-'), '', $minhaString);

            @endphp

            <!-- Footer-->
            <footer class="footer bg-secondary pt-5 personalizarFooter">
                <div class="container pt-lg-4 pb-4">
                    <!-- Links-->
                    <div class="row pb-md-3 pb-lg-4">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="d-flex flex-sm-row flex-column justify-content-between mx-n2">
                                <div class="mb-sm-0 mb-4 px-2">
                                    <a class="d-inline-block mb-4" href="#"><img src={{asset("assets/img/logo/logo-project.png")}} width="200" alt="logo"></a>
                                    <ul class="nav flex-column mb-sm-4 mb-2">

                                        @if(isset($dado->email))
                                        <li class="nav-item mb-2">
                                            <a class="nav-link p-0 fw-normal"
                                                href="mailto:{{$dado->email}}">
                                                <i class="fi-mail mt-n1 me-2 align-middle opacity-70"></i>{{$dado->email}}
                                            </a>
                                        </li>
                                        @endif

                                        @if(isset($dado->whatsapp))
                                        <li class="nav-item">
                                            <a class="nav-link p-0 fw-normal" href="https://web.whatsapp.com/send?phone=55{{$semCaracteres}}&text=Olá, gostaria de mais informações sobre a Nome da empresa.">
                                                <i class="fi-device-mobile mt-n1 me-2 align-middle opacity-70"></i>
                                                {{$dado->whatsapp}}
                                            </a>
                                        </li>
                                        @endif

                                    </ul>
                                    <div class="pt-2">

                                        @if(isset($dado->facebook))
                                        <a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle me-2 mb-2" href="{{$dado->facebook}}" target="_blank">
                                            <i class="fi-facebook"></i>
                                        </a>
                                        @endif

                                        @if(isset($dado->instagram))
                                        <a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle me-2 mb-2" href="{{$dado->instagram}}" target="_blank">
                                            <i class="fi-instagram"></i>
                                        </a>
                                        @endif

                                        @if(isset($dado->whatsapp))
                                        <a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle me-2 mb-2" href="https://web.whatsapp.com/send?phone=55{{$semCaracteres}}&text=Olá, gostaria de mais informações sobre a Nome da empresa." target="_blank">
                                            <i class="fi-whatsapp"></i>
                                        </a>
                                        @endif

                                    </div>
                                </div>
                                <div class="mb-sm-0 mb-4 px-2">
                                    <h4 class="h5">Serviços</h4>
                                    <ul class="nav flex-column">
                                        <li class="nav-item mb-2"><a class="nav-link p-0 fw-normal" href="{{route('home5')}}">Comprar/Alugar Imóvel</a></li>
                                        <li class="nav-item mb-2"><a class="nav-link p-0 fw-normal" href="{{route('user.vendaIndique.venda')}}">Venda seu Imóvel</a></li>
                                        <li class="nav-item mb-2"><a class="nav-link p-0 fw-normal" href="{{route('user.vendaIndique.indique')}}">Indicar Imóvel</a></li>                    
                                        <li class="nav-item mb-2"><a class="nav-link p-0 fw-normal" href="{{route('user.trabalhe-conosco.trabalhe-corretor')}}">Corretores</a></li>
                                        <li class="nav-item mb-2"><a class="nav-link p-0 fw-normal" href="{{route('user.trabalhe-conosco.trabalhe-fotografo')}}">Fotográfos</a></li>
                                        <li class="nav-item mb-2"><a class="nav-link p-0 fw-normal" href="{{route('user.trabalhe-conosco.trabalhe-avaliador')}}">Avaliador de Imóvel</a></li>
                                    </ul>
                                </div>
                                <div class="px-2">
                                    <h4 class="h5">Sobre</h4>
                                    <ul class="nav flex-column">
                                        <li class="nav-item mb-2"><a class="nav-link p-0 fw-normal" href="{{route('user.about.about')}}">Quem somos</a>
                                        </li>
                                        {{-- <li class="nav-item mb-2"><a class="nav-link p-0 fw-normal" href="{{route('user.contact.duvidas-frequentes')}}">Dúvidas Frequentes</a></li> --}}
                                        <li class="nav-item mb-2"><a class="nav-link p-0 fw-normal" href="{{route('user.blog.blog')}}">Blog</a></li>
                                        <li class="nav-item mb-2"><a class="nav-link p-0 fw-normal" href="{{route('user.contact.politica-privacidade')}}">Política de Privacidade</a>
                                        </li>
                                        <li class="nav-item mb-2"><a class="nav-link p-0 fw-normal" href="{{route('user.contact.contact')}}">Contato</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6 offset-xl-1">
                            <h4 class="h5">Última Postagem</h4>
                            
                            @php
                                $postRecente = App\Http\Controllers\User\BlogController::getPostRecente();


                            @endphp

                            @foreach ($postRecente as $post)

                            @php
                                $categoria = App\Http\Controllers\User\BlogController::getCategoria($post->type_post);

                                $comentarios = App\Http\Controllers\User\BlogController::getComentariosPost($post->id);

                                $texto = $post->only_text;
                                $limitarTexto = substr($texto, 0, 150);

                                $quantidadeCaracteres = strlen($texto);

                                
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

                            @endphp

                            <article class="d-flex align-items-start" style="max-width: 640px;">
                                <a class="d-none d-sm-block flex-shrink-0 me-sm-4 mb-sm-0 mb-3"
                                    href="{{route('user.blog.post', ['id' => $post->id])}}">
                                    <img class="rounded-3"
                                        src="{{ asset('storage_posts/' . $post->image_path) }}" width="100" alt="Blog post">
                                </a>
                                <div>
                                    <h6 class="mb-1 fs-xs fw-normal text-uppercase text-primary">{{$categoria->name}}</h6>
                                    <h5 class="mb-2 fs-base"><a class="nav-link" href="{{route('user.blog.post', ['id' => $post->id])}}">{{$post->title}}</a></h5>
                                    
                                        @if($quantidadeCaracteres > 150)
                                        <p class="mb-2 fs-sm">{{$limitarTexto}}...</p>
                                
                                        @else
                                        <p class="mb-2 fs-sm">{{$limitarTexto}}</p>
                                        @endif  
                                        <a class="nav-link nav-link-muted d-inline-block me-3 p-0 fs-xs fw-normal" href="{{route('user.blog.post', ['id' => $post->id])}}">
                                            <i class="fi-calendar mt-n1 me-1 fs-sm align-middle opacity-70"></i>{{$novaStringDia}}&nbsp;{{$mesFormatado}}
                                        </a>
                                        <a class="nav-link nav-link-muted d-inline-block me-3 p-0 fs-xs fw-normal" href="{{route('user.blog.post', ['id' => $post->id])}}">
                                            <i class="fi-chat-circle mt-n1 me-1 fs-sm align-middle opacity-70"></i>{{$quantidadeComentarios}}
                                        </a>
                                </div>
                            </article>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- FOOTER COPYRIGHT -->
                <div class="border-top">
                    <div class="container pt-4 pb-4 d-flex flex-row justify-content-between">
                        <div class="text-center fs-sm">&copy; Nome da empresa.
                        </div>
                        <div>
                            <ul class="nav flex-row">
                                <li class="nav-item" style="margin-right: 20px"><a class="nav-link p-0 fs-sm" href="{{route('user.about.about')}}" style="font-weight:normal">Sobre</a>
                                </li>
                                <li class="nav-item" style="margin-right: 20px"><a class="nav-link p-0 fs-sm" href="{{route('user.blog.blog')}}" style="font-weight:normal">Blog</a></li>
                                <li class="nav-item" style="margin-right: 20px"><a class="nav-link p-0 fs-sm" href="{{route('user.contact.contact')}}s" style="font-weight:normal">Contato</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </footer>
            @endforeach
        @else

            <!-- Footer-->
            <footer class="footer bg-secondary pt-5 personalizarFooter">
                <div class="container pt-lg-4 pb-4">
                    <!-- Links-->
                    <div class="row pb-md-3 pb-lg-4">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="d-flex flex-sm-row flex-column justify-content-between mx-n2">
                                <div class="mb-sm-0 mb-4 px-2">
                                    <a class="d-inline-block mb-4" href="#"><img src={{asset("assets/img/logo/logo-project.png")}} width="200" alt="logo"></a>
                                    {{-- <ul class="nav flex-column mb-sm-4 mb-2">
                                        
                                        <li class="nav-item mb-2">
                                            <a class="nav-link p-0 fw-normal"
                                                href="mailto:example@email.com">
                                                <i class="fi-mail mt-n1 me-2 align-middle opacity-70"></i>example@email.com
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link p-0 fw-normal" href="tel:4065550120">
                                                <i class="fi-device-mobile mt-n1 me-2 align-middle opacity-70"></i>
                                                (83) 9316-7304
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="pt-2">
                                        <a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle me-2 mb-2" href="#">
                                            <i class="fi-facebook"></i>
                                        </a>
                                        <a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle me-2 mb-2" href="#">
                                            <i class="fi-instagram"></i>
                                        </a>
                                        <a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle me-2 mb-2" href="#">
                                            <i class="fi-whatsapp"></i>
                                        </a>
                                    </div> --}}
                                </div>
                                <div class="mb-sm-0 mb-4 px-2">
                                    <h4 class="h5">Serviços</h4>
                                    <ul class="nav flex-column">
                                        <li class="nav-item mb-2"><a class="nav-link p-0 fw-normal" href="{{route('home5')}}">Comprar/Alugar Imóvel</a></li>
                                        <li class="nav-item mb-2"><a class="nav-link p-0 fw-normal" href="{{route('user.vendaIndique.venda')}}">Venda seu Imóvel</a></li>
                                        <li class="nav-item mb-2"><a class="nav-link p-0 fw-normal" href="{{route('user.vendaIndique.indique')}}">Indicar Imóvel</a></li>                    
                                        <li class="nav-item mb-2"><a class="nav-link p-0 fw-normal" href="{{route('user.trabalhe-conosco.trabalhe-corretor')}}">Corretores</a></li>
                                        <li class="nav-item mb-2"><a class="nav-link p-0 fw-normal" href="{{route('user.trabalhe-conosco.trabalhe-fotografo')}}">Fotográfos</a></li>
                                        <li class="nav-item mb-2"><a class="nav-link p-0 fw-normal" href="{{route('user.trabalhe-conosco.trabalhe-avaliador')}}">Avaliador de Imóvel</a></li>
                                    </ul>
                                </div>
                                <div class="px-2">
                                    <h4 class="h5">Sobre</h4>
                                    <ul class="nav flex-column">
                                        <li class="nav-item mb-2"><a class="nav-link p-0 fw-normal" href="{{route('user.about.about')}}">Quem somos</a>
                                        </li>
                                        {{-- <li class="nav-item mb-2"><a class="nav-link p-0 fw-normal" href="{{route('user.contact.duvidas-frequentes')}}">Dúvidas Frequentes</a></li> --}}
                                        <li class="nav-item mb-2"><a class="nav-link p-0 fw-normal" href="{{route('user.blog.blog')}}">Blog</a></li>
                                        <li class="nav-item mb-2"><a class="nav-link p-0 fw-normal" href="{{route('user.contact.politica-privacidade')}}">Política de Privacidade</a>
                                        </li>
                                        <li class="nav-item mb-2"><a class="nav-link p-0 fw-normal" href="{{route('user.contact.contact')}}">Contato</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6 offset-xl-1">
                            <h4 class="h5">Última Postagem</h4>
                            
                            @php
                                $postRecente = App\Http\Controllers\User\BlogController::getPostRecente();


                            @endphp

                            @foreach ($postRecente as $post)

                            @php
                                $categoria = App\Http\Controllers\User\BlogController::getCategoria($post->type_post);

                                $comentarios = App\Http\Controllers\User\BlogController::getComentariosPost($post->id);

                                $texto = $post->only_text;
                                $limitarTexto = substr($texto, 0, 150);

                                $quantidadeCaracteres = strlen($texto);

                                
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

                            @endphp

                            <article class="d-flex align-items-start" style="max-width: 640px;">
                                <a class="d-none d-sm-block flex-shrink-0 me-sm-4 mb-sm-0 mb-3"
                                    href="{{route('user.blog.post', ['id' => $post->id])}}">
                                    <img class="rounded-3"
                                        src="{{ asset('storage_posts/' . $post->image_path) }}" width="100" alt="Blog post">
                                </a>
                                <div>
                                    <h6 class="mb-1 fs-xs fw-normal text-uppercase text-primary">{{$categoria->name}}</h6>
                                    <h5 class="mb-2 fs-base"><a class="nav-link" href="{{route('user.blog.post', ['id' => $post->id])}}">{{$post->title}}</a></h5>
                                    
                                        @if($quantidadeCaracteres > 150)
                                        <p class="mb-2 fs-sm">{{$limitarTexto}}...</p>
                                
                                        @else
                                        <p class="mb-2 fs-sm">{{$limitarTexto}}</p>
                                        @endif  
                                        <a class="nav-link nav-link-muted d-inline-block me-3 p-0 fs-xs fw-normal" href="{{route('user.blog.post', ['id' => $post->id])}}">
                                            <i class="fi-calendar mt-n1 me-1 fs-sm align-middle opacity-70"></i>{{$novaStringDia}}&nbsp;{{$mesFormatado}}
                                        </a>
                                        <a class="nav-link nav-link-muted d-inline-block me-3 p-0 fs-xs fw-normal" href="{{route('user.blog.post', ['id' => $post->id])}}">
                                            <i class="fi-chat-circle mt-n1 me-1 fs-sm align-middle opacity-70"></i>{{$quantidadeComentarios}}
                                        </a>
                                </div>
                            </article>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- FOOTER COPYRIGHT -->
                <div class="border-top">
                    <div class="container pt-4 pb-4 d-flex flex-row justify-content-between">
                        <div class="text-center fs-sm">&copy; Nome da empresa.
                        </div>
                        <div>
                            <ul class="nav flex-row">
                                <li class="nav-item" style="margin-right: 20px"><a class="nav-link p-0 fs-sm" href="{{route('user.about.about')}}" style="font-weight:normal">Sobre</a>
                                </li>
                                <li class="nav-item" style="margin-right: 20px"><a class="nav-link p-0 fs-sm" href="{{route('user.blog.blog')}}" style="font-weight:normal">Blog</a></li>
                                <li class="nav-item" style="margin-right: 20px"><a class="nav-link p-0 fs-sm" href="{{route('user.contact.contact')}}s" style="font-weight:normal">Contato</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </footer>

        @endif
    @endif