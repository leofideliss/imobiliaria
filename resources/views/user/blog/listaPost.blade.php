@if (isset($posts) && $posts->count() > 0)
    <div class="row row-cols-md-2 row-cols-1 gy-md-5 gy-4 mb-lg-5 mb-4">
        @foreach ($posts as $post)
            @php
                $categoria = App\Http\Controllers\User\BlogController::getCategoria($post->type_post);
                
                $stringDataCriado = strval($post->created_at);
                
                $cont = 0;
                
                for ($i = 0; $i < strlen($stringDataCriado); $i++) {
                    if ($stringDataCriado[$i] == '-') {
                        $cont = $cont + 1;
                
                        if ($cont == 1) {
                            $novaStringMes = $stringDataCriado[$i + 1] . '' . $stringDataCriado[$i + 2];
                        }
                
                        if ($cont == 2) {
                            $novaStringDia = $stringDataCriado[$i + 1] . '' . $stringDataCriado[$i + 2];
                        }
                    }
                }
                
                $mesFormatado = '';
                if ($novaStringMes == '01') {
                    $mesFormatado = 'Janeiro';
                } elseif ($novaStringMes == '02') {
                    $mesFormatado = 'Fevereiro';
                } elseif ($novaStringMes == '03') {
                    $mesFormatado = 'Março';
                } elseif ($novaStringMes == '04') {
                    $mesFormatado = 'Abril';
                } elseif ($novaStringMes == '05') {
                    $mesFormatado = 'Maio';
                } elseif ($novaStringMes == '06') {
                    $mesFormatado = 'Junho';
                } elseif ($novaStringMes == '07') {
                    $mesFormatado = 'Julho';
                } elseif ($novaStringMes == '08') {
                    $mesFormatado = 'Agosto';
                } elseif ($novaStringMes == '09') {
                    $mesFormatado = 'Setembro';
                } elseif ($novaStringMes == '10') {
                    $mesFormatado = 'Outubro';
                } elseif ($novaStringMes == '11') {
                    $mesFormatado = 'Novembro';
                } elseif ($novaStringMes == '12') {
                    $mesFormatado = 'Dezembro';
                }
                
                $comentarios = App\Http\Controllers\User\BlogController::getComentariosPost($post->id);
                
                $contComentario = 0;
                
                foreach ($comentarios as $key => $comentario) {
                    $contComentario = $contComentario + 1;
                }
                
                if ($contComentario == 0) {
                    $quantidadeComentarios = 'Sem comentários';
                } else {
                    if ($contComentario == 1) {
                        $quantidadeComentarios = $contComentario . ' comentário';
                    } else {
                        $quantidadeComentarios = $contComentario . ' comentários';
                    }
                }
                

                $texto = $post->only_text;
                $limitarTexto = substr($texto, 0, 150);

                $quantidadeCaracteres = strlen($texto);
            @endphp

            <article class="col pb-2 pb-md-1">
                <a class="d-block position-relative mb-3" href="{{ route('user.blog.post', ['id' => $post->id]) }}">
                    <img class="d-block rounded-3" src="{{ asset('storage_posts/' . $post->image_path) }}"
                        alt="Imagem do Post" style="height: 300px;width:100%">
                </a>
                <a class="fs-sm text-uppercase text-decoration-none">{{ $categoria->name }}</a>
                <h3 class="h5 mb-2 pt-1">
                    <a class="nav-link"
                        href="{{ route('user.blog.post', ['id' => $post->id]) }}">{{ $post->title }}</a>
                </h3>
                @if($quantidadeCaracteres > 150)
                <p class="d-md-none d-xl-block mb-4">{{$limitarTexto}}...</p><a class="d-flex align-items-center text-decoration-none">
                @else
                <p class="d-md-none d-xl-block mb-4">{{$limitarTexto}}</p><a class="d-flex align-items-center text-decoration-none">
                @endif
                <a class="d-flex align-items-center text-decoration-none">
                    <div>
                        <div class="d-flex text-body fs-sm">
                            <span class="me-2 pe-1">
                                <i
                                    class="fi-calendar-alt opacity-70 mt-n1 me-1 align-middle"></i>{{ $novaStringDia }}&nbsp;{{ $mesFormatado }}
                            </span>
                            <span>
                                <i
                                    class="fi-chat-circle opacity-70 mt-n1 me-1 align-middle"></i>{{ $quantidadeComentarios }}
                            </span>
                        </div>
                    </div>
                </a>
            </article>
        @endforeach
    </div>
@else
    <div>
        Nenhum post encontrado
    </div>
@endif

<nav class="pb-md-4 pt-4 mt-2">
    {{ $posts->links('user.layout.components.pagination') }}
</nav>
