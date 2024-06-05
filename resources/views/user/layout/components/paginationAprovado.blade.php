<!-- CODIGO PARA GERAR PAGINAÇÃO -->
@if($paginator->hasPages())

    <ul class="pagination mb-1" id="paginationListaAprovado">

        @if($paginator->onFirstPage())
            <li class="page-item disabled">
                <a class="page-link" href="#" aria-label="Next">
                    <i class="fi-chevron-left"></i>
                </a>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{$paginator->previousPageUrl()}}" aria-label="Next">
                    <i class="fi-chevron-left"></i>
                </a>
            </li>
        @endif

        @foreach($elements as $element)
            
            @if(is_string($element))
                <li class="disabled">{{$element}}</li>
            @endif

            @if (is_array($element))
                @foreach ($element as $pageAprovado => $url)
                    @if ($pageAprovado == $paginator->currentPage())
                        <li class="page-item active d-none d-sm-block" aria-current="page">
                            <a class="page-link">{{ $pageAprovado }}</a>
                        </li>
                    @else
                        <li class="page-item d-none d-sm-block"><a class="page-link" href="{{ $url }}">{{ $pageAprovado }}</a></li>
                    @endif
                @endforeach
            @endif

        @endforeach

        @if($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{$paginator->nextPageUrl()}}" aria-label="Next">
                    <i class="fi-chevron-right"></i>
                </a>
            </li>
        @else
            <li class="page-item disabled">
                <a class="page-link" href="{{$paginator->nextPageUrl()}}" aria-label="Next">
                    <i class="fi-chevron-right"></i>
                </a>
            </li>
        @endif
    </ul>

@endif