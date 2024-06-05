
@if (isset($properties) && $properties->count() > 0)

    @foreach ($properties as $imoveis)
        @php
            $cidadeImovel = App\Http\Controllers\User\ListController::getCitie($imoveis->city_id);

            $numeroAluguelformatado = null;

            if ($imoveis->prop_price != null) {
                $numeroVendaFormatado = number_format($imoveis->prop_price, 2, ',', '.');
            }

            if ($imoveis->prop_rent != null) {
                $numeroAluguelformatado = number_format($imoveis->prop_rent, 2, ',', '.');
            }
        @endphp

        <div class="card card-hover card-horizontal border-0 shadow-sm mb-4">
            <a class="card-img-top" href="real-estate-single-v1.html"
                style="background-image: url(assets/img/real-estate/catalog/22.jpg);">
                <div class="position-absolute start-0 top-0 pt-3 ps-3">
                    <span class="d-table badge bg-success">Aprovado</span>
                </div>
            </a>
            <div class="card-body position-relative pb-3">
                <div class="dropdown position-absolute zindex-5 top-0 end-0 mt-3 me-3">
                    <button class="btn btn-icon btn-light btn-xs rounded-circle shadow-sm" type="button"
                        id="contextMenu1" data-bs-toggle="dropdownTabs" aria-expanded="false">
                        <i class="fi-dots-vertical"></i>
                    </button>
                    @if ($imoveis->is_from_xml)
                        <ul class="dropdown-menu my-1" aria-labelledby="contextMenu1">
                            <li>
                                <a class="dropdown-item" type="button" href="#"><i
                                        class="fi-edit opacity-60 me-2"></i>Resumo</a>
                            </li>

                        </ul>
                    @else
                        <ul class="dropdown-menu my-1" aria-labelledby="contextMenu1">
                            <li>
                                <a class="dropdown-item" type="button"
                                    href="{{ route('user.perfil.add-propriedade', [$imoveis->id]) }}"><i
                                        class="fi-edit opacity-60 me-2"></i>Editar</a>
                            </li>
                            <li>
                                <a class="dropdown-item" type="button" href="{{ route('admin.register.city.deleteProperty', [$imoveis->id]) }}" ><i
                                        class="fi-trash opacity-60 me-2"></i>Deletar</a>
                            </li>
                        </ul>
                    @endif
                </div>
               
                <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">{{ $imoveis->category }}</h4>
                
                <h3 class="h6 mb-2 fs-base">
                    <a class="nav-link stretched-link" href="real-estate-single-v1.html">Casa no condomínio</a>
                </h3>
                <p class="mb-2 fs-sm text-muted">{{ $imoveis->street }}&nbsp;- {{ $imoveis->district }} -
                    {{ $cidadeImovel->citie }}/{{ $imoveis->state }}</p>
                <div class="fw-bold">
                    @if ($imoveis->category == 'Venda')
                        R$ {{ $numeroVendaFormatado }}
                    @else
                        R$ {{ $numeroAluguelformatado }}
                        <span class="textoMesAluguel">/ mês</span>
                    @endif
                </div>
                <div class="d-flex card-footer remover-padding-card" style="flex-flow: wrap;border-top: 0px !important">
                    <div class=" d-flex align-items-center" style="margin-bottom:5px;flex-wrap: wrap;">
                        <span class="fs-sm destaqueCaracteristicaImovel">
                            {{ $imoveis->prop_size }} m²
                            {{-- <i class="fi-checkbox ms-1 mt-n1 fs-lg text-muted"></i></span> --}}
                            <span class="editar-dados-imovel">área</span>
                        </span>
                        <span class="d-inline-block fs-sm destaqueCaracteristicaImovel">
                            {{ $imoveis->bedroom }}

                            <span class="editar-dados-imovel">quarto</span>
                        </span>
                        <span class="d-inline-block fs-sm destaqueCaracteristicaImovel">
                            {{ $imoveis->bathrooms }}

                            <span class="editar-dados-imovel">banheiro</span>
                        </span>
                        <span class="d-inline-block fs-sm destaqueCaracteristicaImovel">
                            {{ $imoveis->garage }}

                            <span class="editar-dados-imovel">vaga</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
   
@else
    <div>
        Nenhum imóvel encontrado
    </div>
@endif

<nav class="pb-md-4 pt-4 mt-2">
    {{ $properties->links('user.layout.components.paginationAprovado') }}
</nav>
