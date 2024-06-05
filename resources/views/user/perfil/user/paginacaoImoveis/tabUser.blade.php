@if (isset($properties) && $properties->count() > 0)

    @foreach ($properties as $imoveis)
        @php

            $imgs = App\Http\Controllers\User\ListController::getImagesPropertie($imoveis->id);

            $cidadeImovel = App\Http\Controllers\User\ListController::getCitie($imoveis->city_id);

            $numeroAluguelformatado = null;

            if ($imoveis->prop_price != null) {
                $numeroVendaFormatado = number_format($imoveis->prop_price, 2, ',', '.');
            }

            if ($imoveis->prop_rent != null) {
                $numeroAluguelformatado = number_format($imoveis->prop_rent, 2, ',', '.');
            }

            $dataCriacao = $imoveis->created_at;
            $dataFormatada = date("d/m/Y", strtotime($dataCriacao));

            if($imoveis->category == "Venda"){
                $textoCategoria = "Venda";
            } else if($imoveis->category == "Aluguel"){
                $textoCategoria = "Aluguel";
            } else if($imoveis->category == "VendaAluguel"){
                $textoCategoria = "Venda e Aluguel";
            }

            if($imoveis->is_from_xml == 0){
                $criacaoImovel = "Manual";
            } else if($imoveis->is_from_xml == 1){
                $criacaoImovel = "Integração";
            }

        @endphp

        <div class="card card-hover card-horizontal border-0 shadow-sm mb-4">
            <a class="card-img-top"
                style="background-image: url({{ asset(str_replace('public', 'storage', $imgs[0]->pathname)) }})">
                <div class="position-absolute start-0 top-0 pt-3 ps-3">
                    @if ($imoveis->is_from_xml == 0 && $imoveis->available == 1 && $imoveis->available_user == 1)
                        <span class="d-table badge bg-success">Imóvel Aprovado</span>
                    @elseif($imoveis->is_from_xml == 0 && $imoveis->available == 0 && $imoveis->available_user == 1)
                        <span class="d-table badge bg-warning">Aguardando aprovação</span>
                    @elseif($imoveis->is_from_xml == 1)
                        <span class="d-table badge bg-info">Importado via XML</span>
                    @elseif($imoveis->available_user == 0)
                        <span class="d-table badge bg-danger">Desabilitado</span>
                    @endif
                </div>
            </a>
            <div class="card-body position-relative pb-3">
                <div class="dropdown position-absolute zindex-5 top-0 end-0 mt-3 me-3">
                    <button class="btn btn-icon btn-light btn-xs rounded-circle shadow-sm" type="button"
                        id="contextMenu1" data-bs-toggle="dropdownTabs" aria-expanded="false">
                        <i class="fi-dots-vertical"></i>
                    </button>
                    @if ($imoveis->is_from_xml)
                        <ul class="dropdown-menu my-1 resolverAberturaDropdown" aria-labelledby="contextMenu1">
                            <li>
                                <a class="dropdown-item" type="button" href="{{route('user.perfil.resumo-propriedade', [$imoveis->id]) }}"><i
                                        class="fi-edit opacity-60 me-2"></i>Resumo</a>
                            </li>

                        </ul>
                    @else
                        <ul class="dropdown-menu my-1 resolverAberturaDropdown" aria-labelledby="contextMenu1">
                            <li>
                                <a class="dropdown-item" type="button"
                                    href="{{ route('user.perfil.add-propriedade', [$imoveis->id]) }}"><i
                                        class="fi-edit opacity-60 me-2"></i>Editar</a>
                            </li>
                            <li>
                                <a class="dropdown-item" type="button"
                                    href="{{ route('admin.property.deleteProperty', [$imoveis->id]) }}"
                                    data-action="delete"><i class="fi-trash opacity-60 me-2"></i>Deletar</a>
                            </li>
                            <li>
                                
                                <a class="dropdown-item" type="button" href="{{route('user.perfil.resumo-propriedade', [$imoveis->id]) }}"><i
                                        class="fa-regular fa-file opacity-60 me-2"></i>Resumo</a>
                            </li>
                            @if ($imoveis->available_user == 1)
                                <li>
                                    
                                    <a class="dropdown-item" type="button"
                                        href="{{ route('admin.property.alterStatusUser') }}" data-action="updateStatus"
                                        data-id="{{ $imoveis->id }}" data-available="0"><i
                                            class="fa-regular fa-thumbs-down opacity-60 me-2"></i>Desabilitar</a>
                                </li>
                            @else
                                <li>
                                    <a class="dropdown-item" type="button"
                                        href="{{ route('admin.property.alterStatusUser') }}" data-action="updateStatus"
                                        data-id="{{ $imoveis->id }}" data-available="1"><i
                                        
                                            class="fa-regular fa-thumbs-up opacity-60 me-2"></i>Ativar</a>
                                </li>
                            @endif

                        </ul>
                    @endif
                </div>
                <div class="mb-1" style="display: flex;align-items: center;">
                    <h4 class="fs-xs fw-normal text-uppercase text-primary" style="margin:0px;">{{ $textoCategoria }}</h4>
                    <span class="editar-dados-imovel" style="margin-left: 15px"><i class="fa-solid fa-calendar-days" style="color: black;margin-right: 5px;"></i>{{$dataFormatada}}</span>
                    <span style="background-color: #eeaa11;color: white;border-radius: 7px;align-self: flex-start;padding: 2px 8px 2px 8px;font-size: 12px;margin-left: 15px">{{$criacaoImovel}}</span>
                </div>
                
                <h3 class="h6 mb-2 fs-base ajusteTitleMobile">
                    <a class="nav-link stretched-link">{{ $imoveis->title }}</a>
                </h3>
                <p class="mb-2 fs-sm text-muted">{{ $imoveis->street }}&nbsp;- {{ $imoveis->district }} -
                    {{ $cidadeImovel->citie }}/{{ $imoveis->state }}</p>
                <div class="fw-bold">
                    @if ($imoveis->category == 'Venda')
                        R$ {{ $numeroVendaFormatado }}
                    @else
                        @if($imoveis->category == 'Aluguel')
                        R$ {{ $numeroAluguelformatado }}
                        <span class="textoMesAluguel">/ mês</span>
                        @else
                        <div style="display: flex;flex-direction:column">
                            <span>R$ {{ $numeroVendaFormatado }}</span>
                            <span>R$ {{ $numeroAluguelformatado }} <span class="textoMesAluguel">/ mês</span></span>
                        </div>
                        {{-- R$ {{ $numeroAluguelformatado }}
                        <span class="textoMesAluguel">/ mês</span> --}}
                        @endif
                    @endif
                </div>

                <div class="d-flex card-footer remover-padding-card" style="flex-flow: wrap;border-top: 0px !important">
                    <div class=" d-flex align-items-center" style="margin-bottom:5px;flex-wrap: wrap;">
                        
                        <span class="fs-sm destaqueCaracteristicaImovel">
                            {{ $imoveis->prop_size }} m²
                            {{-- <i class="fi-checkbox ms-1 mt-n1 fs-lg text-muted"></i></span> --}}
                            <span class="editar-dados-imovel">área</span>
                        </span>
                        

                        @if($imoveis->bedroom != null)
                            @if($imoveis->bedroom > 1)
                                <span class="d-inline-block fs-sm destaqueCaracteristicaImovel">
                                    {{ $imoveis->bedroom }}

                                    <span class="editar-dados-imovel">quartos</span>
                                </span>
                            @else
                                <span class="d-inline-block fs-sm destaqueCaracteristicaImovel">
                                    {{ $imoveis->bedroom }}

                                    <span class="editar-dados-imovel">quarto</span>
                                </span>
                            @endif
                        @endif

                        @if($imoveis->bathrooms != null)
                            @if($imoveis->bathrooms > 1)
                                <span class="d-inline-block fs-sm destaqueCaracteristicaImovel">
                                    {{ $imoveis->bathrooms }}

                                    <span class="editar-dados-imovel">banheiros</span>
                                </span>
                            @else
                                <span class="d-inline-block fs-sm destaqueCaracteristicaImovel">
                                    {{ $imoveis->bathrooms }}

                                    <span class="editar-dados-imovel">banheiro</span>
                                </span>
                            @endif
                        @endif

                        @if($imoveis->garage != null)
                            @if($imoveis->garage > 1)
                                <span class="d-inline-block fs-sm destaqueCaracteristicaImovel">
                                    {{ $imoveis->garage }}

                                    <span class="editar-dados-imovel">vagas</span>
                                </span>
                            @else
                                <span class="d-inline-block fs-sm destaqueCaracteristicaImovel">
                                    {{ $imoveis->garage }}

                                    <span class="editar-dados-imovel">vaga</span>
                                </span>
                            @endif
                        @endif
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
    {{ $properties->links('user.layout.components.pagination') }}
</nav>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Select all delete buttons
    var deleteButtons = document.querySelectorAll('[data-action="delete"]');

    deleteButtons.forEach(d => {
        var urlDelete = d.href
        // Delete button on click
        d.addEventListener('click', function(e) {
            e.preventDefault();

            // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
            Swal.fire({
                text: "Tem certeza de que deseja excluir ?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Sim, excluir!",
                cancelButtonText: "Não, cancelar",
                customClass: {
                    cancelButton: "btn fw-bold btn-danger",
                    confirmButton: "btn fw-bold btn-primary m-1"
                }
            }).then(function(result) {
                if (result.value) {
                    Swal.fire({
                        text: "Você excluiu !",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "OK, entendi!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary",
                        }
                    }).then(function() {
                        // delete row data from server and re-draw datatable
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('input[name="csrf_token"]')
                                    .val()
                            }
                        });
                        $.ajax({
                            url: urlDelete,
                            type: 'delete',
                            dataType: 'json',
                            async: false,
                            success: function(e) {
                                console.log('success', e)
                            },
                            error: function(e) {
                                console.log('error', e)
                            },
                            complete: function(e) {
                                location.reload()
                            },

                        })
                    });

                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Não foi deletado.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "OK, entendi!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary",
                        }
                    });
                }
            });
        })
    });
</script>

<script>
    // Select all delete buttons
    var updateBotton = document.querySelectorAll('[data-action="updateStatus"]');

    updateBotton.forEach(d => {
        var urlUpdate = d.href
        var prop_id = $(d).data("id")
        var prop_status = $(d).data("available")
        // Delete button on click
        d.addEventListener('click', function(e) {
    
            e.preventDefault();

            Swal.fire({
                text: "Tem certeza de que deseja alterar o status ?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Sim, alterar!",
                cancelButtonText: "Não, cancelar",
               customClass: {
                    cancelButton: "btn fw-bold btn-danger",
                    confirmButton: "btn fw-bold btn-primary m-1"
                }
            }).then(function(result) {
                if (result.value) {
                    Swal.fire({
                        text: "Você alterou o status !",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "OK, entendi!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary",
                        }
                    }).then(function() {
                        // delete row data from server and re-draw datatable
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('input[name="csrf_token"]')
                                    .val()
                            }
                        });
                        $.ajax({
                            url: urlUpdate,
                            type: 'post',
                            dataType: 'json',
                            data: {
                                prop_id: prop_id,
                                status: prop_status,
                            },
                            async: false,
                            success: function(e) {
                                console.log('success', e)
                            },
                            error: function(e) {
                                console.log('error', e)
                            },
                            complete: function(e) {
                                location.reload()
                            }
                        })

                    });

                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Não foi atualizado.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "OK, entendi!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary",
                        }
                    });
                }
            });
        })
    });
</script>
