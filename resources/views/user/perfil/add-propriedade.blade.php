@extends('index')

@section('content')
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

    <div class="container div-flexBotaoVoltar mt-5" style="padding-top: 1.5rem !important">
        {{-- <a style="padding: 9px 20px" class="btn btn-outline-primary btn-lg mb-3 mb-sm-0" href="{{ route('user.perfil.user.user') }}">
            Voltar
        </a> --}}
    </div>

    <!-- Page container-->
    <div class="container mb-md-4 py-5" style="padding-top: 0.5rem !important">
        <div class="row">
            <!-- Page content-->
            <div class="col-lg-12">
                

                <!-- CAMINHO -->
                <nav class="mb-3 pt-md-3" aria-label="Breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('user.perfil.user.user') }}">Minha Conta</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Adicionar Imóvel</li>
                    </ol>
                </nav>
                

                <!-- Título  -->
                <div class="mb-4">
                    <h1 class="h2 mb-0">Adicionar um Imóvel</h1>
                    {{-- <div class="d-lg-none pt-3 mb-2">65% do conteúdo preenchido</div>
                    <div class="progress d-lg-none mb-4" style="height: .25rem;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 65%" aria-valuenow="65"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div> --}}
                </div>

                <form id="add_customer_propriedade" data-request="{{ route('user.perfil.insertPropertie') }}">
                    <input type="hidden" name="csrf_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="prop_id" value="{{ $propertie->id ?? ''}}" />
                    <!-- INFORMAÇÕES BÁSICAS -->
                    <section class="card card-body border-0 shadow-sm p-4 mb-4" id="basic-info">
                        <h2 class="h4 mb-4">
                            <i class="fi-info-circle text-primary fs-5 mt-n1 me-2"></i>Informações Básicas
                        </h2>
                        {{-- <div class="mb-3">
                            <label class="form-label" for="ap-title">
                                Título do Imóvel <span class="text-danger">*</span>
                            </label>
                            <input class="form-control" type="text" name="titulo_imovel" id="ap-title" placeholder="Título do Imóvel" value="" required>                        
                        </div> --}}

                        <div class="row">

                            <div class="col-sm-6 mb-3">
                                <label class="form-label" for="finalidadeUtilizacao">
                                    Finalidade de Utilização <span class="text-danger">*</span>
                                </label>
                                <select class="form-select required" onchange="selectFinalidade()" name="finalidadeUtilizacao" id="finalidadeUtilizacao" required value="{{ $propertie->finalidade ?? '' }}">
                                    <option value="">Selecionar</option>
                                    <option value="residencial">Residencial</option>
                                    <option value="comercial">Comercial</option>
                                </select>
                                <div class="invalid-feedback-custom invalid-feedback" style="display: none;">Campo
                                    Obrigatório</div>
                            </div>

                            <div class="col-sm-6 mb-3">
                                <label class="form-label" for="categorySelect">
                                    Categoria <span class="text-danger">*</span>
                                </label>
                                <select class="form-select required" onchange="mySelect()" name="categoria_imovel" id="categorySelect" required value="{{ $propertie->category ?? ''}}">
                                    <option value="">Selecionar</option>
                                    <option value="Venda">Venda</option>
                                    <option value="Aluguel">Aluguel</option>
                                    <option value="VendaAluguel" id="esconderCategoria" style="display:none">Venda e Aluguel</option>
                                </select>
                                <div class="invalid-feedback-custom invalid-feedback" style="display: none;">Campo
                                    Obrigatório</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label" for="tipo_imovel">
                                    Tipo do Imóvel <span class="text-danger">*</span>
                                </label>
                                <select class="form-select required" name="tipo_imovel" id="tipo_imovel" required value="{{ $propertie->type_prop_id ?? ''}}">
                                    <option value="" disabled hidden>Escolha o tipo do imóvel</option>

                                </select>
                                <div class="invalid-feedback-custom invalid-feedback" style="display: none;">Campo
                                    Obrigatório</div>

                            </div>

                            <div class="col-sm-6 mb-3">
                                <label class="form-label" for="statusImovel">
                                    Status do Imóvel <span class="text-danger">*</span>
                                </label>
                                <select class="form-select required" onchange="selectStatus()" id="statusImovel" name="statusImovel" required  value="{{$propertie->status_imovel ?? ""}}">
                                    <option value="">Selecionar</option>
                                    <option value="lancamento">Lançamento</option>
                                    <option value="construcao">Em Construção</option>
                                    <option value="prontoMorar">Pronto para Morar</option>
                                </select>
                                <div class="invalid-feedback-custom invalid-feedback" style="display: none;">Campo
                                    Obrigatório</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 mb-3" id="esconderInicioObra" style="display:none;flex-direction:column">
                                <label class="form-label" for="dataInicio" >
                                    Data de Início de Obra
                                </label>
                                <input class="form-control form-control-solid" type="date" id="dateInicioObra" name="dateInicioObra" value="{{isset($propertie->inicioObra ) ? $propertie->inicioObra->format('Y-m-d') : "" }}">
                            </div>

                            <div class="col-sm-6 mb-3" id="esconderEntrega" style="display:none;flex-direction:column">
                                <label class="form-label" for="dataInicio">
                                    Data de Entrega do Imóvel
                                </label>
                                <input class="form-control form-control-solid" type="date" id="dateFimObra" name="dateFimObra" value="{{ isset($propertie->fimObra ) ? $propertie->fimObra->format('Y-m-d') : "" }}">
                            </div>

                            <div class="col-sm-6 mb-3" id="esconderConstrucao" style="display:none;flex-direction:column">
                                <label class="form-label" for="tempoConstrucao">
                                    Tempo de Construção
                                </label>
                                <select class="form-select" onchange="" name="tempoConstrucao"
                                id="tempoConstrucao" value="{{$propertie->tempoConstrução ?? ""}}">
                                <option value="">Selecionar</option>
                                <option value="Mais de 10 anos">Construído a mais de 10 anos</option>
                                <option value="Menos de 5 anos">Construído a menos de 5 anos</option>
                                    
                                </select> 
                            </div>
                        </div>



                    </section>

                    <!-- ENDEREÇO -->
                    <section class="card card-body border-0 shadow-sm p-4 mb-4" id="location">

                        <h2 class="h4 mb-4">
                            <i class="fi-map-pin text-primary fs-5 mt-n1 me-2"></i>Endereço
                        </h2>

                        <div class="row">
                            <div class="col-sm-4 mb-3">
                                <label class="form-label" for="cep_imovel">
                                    CEP <span class="text-danger">*</span>
                                </label>
                                <input class="form-control required" name="CEP" type="text" id="cep_imovel"
                                    maxlength="9" onkeyup="handleCep(event)" placeholder="Digite o cep" value="{{ $propertie->CEP ?? ''}}"
                                    required oninput="validaCEP()" onblur="pesquisacep(this.value);">
                                <div class="invalid-feedback-custom invalid-feedback" id="cep_imovel_msg"
                                    style="display: none;">Campo
                                    Obrigatório</div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label" for="ap-country">Estado <span class="text-danger">*</span></label>
                                <input class="form-control required" type="text" id="state" name="state" value="{{ $propertie->state ?? ''}}"
                                    oninput="validaEstado()">
                                <div class="invalid-feedback-custom invalid-feedback" id="state_msg" style="display: none;">
                                    Campo
                                    Obrigatório</div>

                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label" for="ap-city">Cidade <span class="text-danger">*</span></label>
                                <input type="text" class="form-control required" id="city_id" name="city_id" data-citie="{{ $propertie->city_id ?? ''}}"
                                    oninput="validaCidade()" value="{{ $propertie->city_name ?? ''}}">
                                <div class="invalid-feedback-custom invalid-feedback" id="city_id_msg"
                                    style="display: none;">Campo
                                    Obrigatório</div>

                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="ap-address">
                                Rua <span class="text-danger">*</span>
                            </label>
                            <input class="form-control required" name="street" type="text" id="street"
                                 required oninput="validaRua()" value="{{ $propertie->street ?? ''}}">
                            <div class="invalid-feedback-custom invalid-feedback" id="street_msg" style="display: none;">
                                Campo Obrigatório
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-2 mb-3">
                                <label class="form-label" for="ap-zip">
                                    Número <span class="text-danger">*</span>
                                </label>
                                <input class="form-control required" name="number" type="text" id="number"
                                    placeholder="Nº"  required oninput="validaNumber()" value="{{ $propertie->number ?? ''}}">
                                <div class="invalid-feedback-custom invalid-feedback" id="number_msg"
                                    style="display: none;">Campo Obrigatório</div>

                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label" for="ap-zip">
                                    Bairro <span class="text-danger">*</span>
                                </label>
                                <input class="form-control required" name="district" type="text" id="district"
                                    placeholder="Digite o bairro"  required oninput="validaBairro()" value="{{ $propertie->district ?? ''}}">
                                <div class="invalid-feedback-custom invalid-feedback" id="district_msg"
                                    style="display: none;">Campo Obrigatório</div>

                            </div>
                            <div class="col-sm-4 mb-3">
                                <label class="form-label" for="ap-zip">
                                    Complemento <span class="text-danger"></span>
                                </label>
                                <input class="form-control required" type="text" name="complement" id="complement"
                                    placeholder="Digite o complemento" value="{{ $propertie->complement ?? ''}}">
                                <div class="invalid-feedback-custom invalid-feedback" style="display: none;">Campo
                                    Obrigatório</div>

                            </div>
                        </div>

                    </section>

                    <!-- DETALHES DO IMÓVEL -->
                    <section class="card card-body border-0 shadow-sm p-4 mb-4" id="details">
                        <h2 class="h4 mb-4">
                            <i class="fi-edit text-primary fs-5 mt-n1 me-2"></i>Detalhes do Imóvel
                        </h2>

                        <!-- M² DO IMOVEL  -->
                        <div class="mb-4" style="max-width: 25rem;">
                            <label class="form-label" for="tam_imovel">Tamanho do Imóvel, m² <span
                                    class="text-danger">*</span>
                            </label>
                            <input class="form-control required" type="number" name="area_imovel" id="tam_imovel"
                                min="0" placeholder="Digite a área do imóvel" value="{{ $propertie->prop_size ?? ''}}" required
                                oninput="validaTamanoImovel()">
                            <div class="invalid-feedback-custom invalid-feedback" id="tam_imovel_msg"
                                style="display: none;">Campo Obrigatório</div>

                        </div>

                        <!-- QUANTIDADE DE QUARTOS  -->
                        <div class="mb-4" style="max-width: 25rem;">
                            <label class="form-label" for="quartos_imovel">Quartos </label>
                            <input class="form-control required" type="number" name="quartos_imovel" id="ap-area"
                                min="0" placeholder="Digite o número de quartos" value="{{ $propertie->bedroom ?? ''}}" 
                                oninput="">
                            <div class="invalid-feedback-custom invalid-feedback" id="quartos_imovel_msg"
                                style="display: none;">Campo Obrigatório</div>

                        </div>

                        <!-- QUANTIDADE DE SUITES  -->
                        <div class="mb-4" style="max-width: 25rem;">
                            <label class="form-label" for="ap-area">Suítes </label>
                            <input class="form-control" type="number" name="suites_imovel" id="ap-area"
                                min="0" placeholder="Digite o número de suítes" value="{{ $propertie->suites ?? ''}}" >

                        </div>

                        <!-- QUANTIDADE DE BANHEIROS  -->
                        <div class="mb-4" style="max-width: 25rem;">
                            <label class="form-label" for="banheiros_imovel">Banheiros </label>
                            <input class="form-control required" type="number" name="banheiros_imovel" id="ap-area"
                                min="0" placeholder="Digite o número de banheiros" value="{{ $propertie->bathrooms ?? ''}}" 
                                oninput="">
                            <div class="invalid-feedback-custom invalid-feedback" id="banheiros_imovel_msg"
                                style="display: none;">Campo Obrigatório</div>

                        </div>

                        <!-- QUANTIDADE DE VAGAS DE GARAGEM  -->
                        <div class="mb-4" style="max-width: 25rem;">
                            <label class="form-label" for="ap-area">Vagas de Garagem </label>
                            <input class="form-control" type="number" name="vagas_imovel" id="ap-area"
                                min="0" placeholder="Digite o número de vagas de garagem" value="{{ $propertie->garage ?? ''}}" >
                        </div>

                        <!-- CARACTERISTICAS DO IMÓVEL  -->
                        <div class="mb-4">
                            <label class="form-label d-block fw-bold mb-2 pb-1">Características </label>
                            <div class="row p-3" id="caracteristica_list">
                                {{-- <div class="col-sm-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="wifi" checked>
                                        <label class="form-check-label" for="wifi">Sacada</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="air-condition" checked>
                                        <label class="form-check-label" for="air-condition">Academia</label>
                                    </div>
                                </div> --}}
                            </div>
                        </div>

                        <!-- DESCRIÇÃO -->
                        <label class="form-label" for="ap-description">Descrição do Imóvel <span
                                class="text-danger">*</span></label>
                        <textarea class="form-control required" required name="descricao_imovel" id="ap-description" rows="5" oninput="validateDescription()"
                            placeholder="Escreva uma descrição sobre o imóvel">{{ $propertie->description ?? ''}}</textarea>
                        <div class="invalid-feedback-custom invalid-feedback" style="display: none;" id="ap-description_msg">Campo Obrigatório
                        </div>


                    </section>

                    <!-- PREÇO -->
                    <section class="card card-body border-0 shadow-sm p-4 mb-4" id="price">
                        <h2 class="h4 mb-4"><i class="fi-cash text-primary fs-5 mt-n1 me-2"></i>Preço</h2>

                        <div class="row">
                            <div class="col-sm-4 mb-3" id="campoPrecoVenda" style="flex-direction: column;">
                                <label class="form-label" for="preco_imovel">
                                    Preço de Venda <span class="text-danger">*</span>
                                </label>
                                <input class="form-control" type="text" name="venda_preco"
                                    oninput="handleMoeda(event); validaPrecoVenda();"
                                    maxlength="14" id="preco_imovel" placeholder="Digite o preço de venda" value="{{ $propertie->prop_price ?? ''}}">
                                <div class="invalid-feedback-custom invalid-feedback" id="preco_imovel_msg"
                                    style="display: none;">Campo Obrigatório</div>

                            </div>
                        
                            <div class="col-sm-4 mb-3" id="campoPrecoAluguel" style="display:none;flex-direction: column;">
                                <label class="form-label" for="aluguel_imovel">
                                    Preço do Aluguel <span class="text-danger">*</span>
                                </label>
                                <input class="form-control" type="text" name="venda_aluguel"
                                    oninput="handleMoeda(event); validaPrecoAluguel();"
                                    maxlength="14" id="aluguel_imovel"
                                    placeholder="Digite o preço de aluguel"
                                    value="{{ $propertie->prop_rent ?? ''}}">
                                <div class="invalid-feedback-custom invalid-feedback" id="aluguel_imovel_msg"
                                    style="display: none;">Campo Obrigatório</div>

                            </div>
                        </div>
                        

                        

                        <div class="row">
                            <div class="col-sm-4 mb-3">
                                <label class="form-label" for="campo-iptu">
                                    Preço do IPTU Anual <span class="text-danger">*</span>
                                </label>
                                <input class="form-control" type="text" name="iptu_preco"
                                    onkeyup="handleMoeda(event)" maxlength="14" id="campo-iptu"
                                    placeholder="Digite o valor do IPTU" value="{{ $propertie->iptu_price ?? ''}}" required>
                                    <div class="invalid-feedback-custom invalid-feedback" id="campo-iptu_msg" oninput="validateIPTU()"
                                    style="display: none;">Campo Obrigatório</div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-sm-6 mb-3">
                                <label class="form-label" for="campoCondominio">
                                    Possui condominio <span class="text-danger">*</span>
                                </label>
                                <select class="form-select" name="condominio_preco" id="campoCondominio"
                                    onchange="validaCondominio()" required value="{{ $propertie->condominium ?? ''}}">
                                    <option value="">Selecionar</option>
                                    <option value="1">Sim</option>
                                    <option value="0">Não</option>
                                </select>
                            </div>

                            <div class="col-sm-6 mb-3" id="campoValorCondominio">
                                <label class="form-label">
                                    Valor Condomínio <span class="text-danger">*</span>
                                </label>
                                <input class="form-control" type="text" name="valorCondominio_preco"
                                    id="valorCondominio_preco" onkeyup="handleMoeda(event)" maxlength="14"
                                    oninput="validaPrecoCondominio()" placeholder="Digite o valor do condomínio"
                                    value="{{ $propertie->condominium_price ?? ''}}" required>
                                <div class="invalid-feedback-custom invalid-feedback" id="valorCondominio_preco_msg"
                                    style="display: none;">Campo Obrigatório</div>
                            </div>

                        </div>

                    </section>

                    <!-- MÍDIA -->
                    <section class="card card-body border-0 shadow-sm p-4 mb-4" id="photos">

                        <h2 class="h4 mb-4">
                            <i class="fi-image text-primary fs-5 mt-n1 me-2"></i>Mídias do Imóvel
                        </h2>

                        {{-- <div class="alert alert-info mb-4" role="alert">
                            <div class="d-flex"><i class="fi-alert-circle me-2 me-sm-3"></i>
                                <p class="fs-sm mb-1">
                                    O tamanho máximo da foto é 8 MB. Formats: jpeg, jpg, png. Coloque a foto principal
                                    primeiro.
                                </p>
                            </div>
                        </div> --}}

                        {{-- <input class="file-uploader file-uploader-grid mb-4" type="file" multiple
                            data-max-file-size="10MB" accept="image/png, image/jpeg, video/mp4, video/mov"
                            data-label-idle='<div class="btn btn-primary mb-3"><i class="fi-cloud-upload me-1"></i>Subir fotos / vídeos</div><div>ou arraste-as aqui</div>'> --}}


                        <div class="dropzone mb-3" id="divDropzone" style="border: 1px dashed #d5d2dc;
                        border-radius: 0.5rem;
                        ">
                            <div class="dz-message needsclick">
                                <i class="ki-duotone ki-file-up fs-3x text-primary"><span class="path1"></span><span
                                        class="path2"></span></i>

                                <!--begin::Info-->
                                <div class="ms-4">
                                    <h3 class="fs-5 fw-bold text-gray-900 mb-1">Solte as imagens aqui ou
                                        clique para carregar</h3>
                                    <span class="fs-7 fw-semibold text-gray-400">Max: 20 Fotos</span>
                                </div>
                                <!--end::Info-->
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="link-video">
                                Link Vídeo Youtube
                            </label>
                            <input class="form-control" type="text" name="video_midia" id="link-video"
                                placeholder="Digite o link do vídeo" value="{{ $propertie->url_video ?? ''}}">
                        </div>


                    </section>

                    <!-- DADOS PROPRIETÁRIO -->
                    <section class="card card-body border-0 shadow-sm p-4 mb-4" id="dados_proprietario">

                        <h2 class="h4 mb-4">
                            <i class="fi-phone text-primary fs-5 mt-n1 me-2"></i>Dados do Proprietário
                        </h2>

                        <!-- NOME PROPRIETARIO -->
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label" for="prop_name">Nome Completo do Proprietário <span
                                        class="text-danger">*</span></label>
                                <input class="form-control required" type="text" id="prop_name"
                                    name="nome_proprietario" value="{{ $propertie->name_vendor ?? ''}}" placeholder="Digite o nome do proprietário"
                                    oninput="validaNome()" required>
                                <div class="invalid-feedback-custom invalid-feedback" id="prop_name_msg"
                                    style="display: none;">Campo
                                    Obrigatório</div>

                            </div>
                            
                            <div class="col-sm-6 mb-3">
                                <label class="form-label" for="prop_phone">Telefone Celular <span
                                        class="text-danger">*</span></label>
                                <input class="form-control required" type="tel" id="prop_phone" name="prop_phone"
                                    onkeyup="handlePhone(event)" maxlength="15" value="{{ $propertie->phone_vendor ?? ''}}"
                                    placeholder="Digite o telefone do proprietário" oninput="validaTelefone()" required>
                                <div class="invalid-feedback-custom invalid-feedback" id="prop_phone_msg"
                                    style="display: none;">Campo
                                    Obrigatório</div>

                            </div>
                        </div>

                        <!-- E-MAIL/TELEFONE -->
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label" for="prop_email">E-mail do proprietário <span
                                    class="text-danger">*</span></label>
                                <input class="form-control required" type="text" name="prop_email" id="prop_email"
                                value="{{ $propertie->email_vendor ?? ''}}" placeholder="Digite o e-mail do proprietário" oninput="" required>
                                <div class="invalid-feedback-custom invalid-feedback" id="prop_email_msg"
                                    style="display: none;">Email inválido</div>

                            </div>
                            
                            {{-- <div class="col-sm-6 mb-3">
                                <label class="form-label" for="prop_cpf">CPF do Proprietário </label>
                                <input class="form-control required" type="text" name="prop_cpf" maxlength="14"
                                    oninput="" onkeyup="handleCpf(event)" id="prop_cpf"
                                    placeholder="Digite o CPF do proprietário" value="{{ $propertie->cpf_vendor ?? ''}}">
                                <div class="invalid-feedback-custom invalid-feedback" id="prop_cpf_msg"
                                    style="display: none;">CPF inválido</div>

                            </div> --}}
                        </div>

                        <!-- CPF -->


                    </section>

                    <!-- BOTÃO -->
                    <section class="d-sm-flex pt-2">
                        <a style="padding: 8px 18px;margin-right: 15px;" class="btn btn-outline-danger btn-lg mb-3 mb-sm-0" href="{{ route('user.perfil.user.imoveis-user') }}">
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary btn-lg d-block " id="btn_submit_form_customer_propriedade">Salvar</button>
                    </section>
                </form>
            </div>

            {{-- <!-- Progress of completion-->
            <aside class="col-lg-3 offset-lg-1 d-none d-lg-block">
                <div class="sticky-top pt-5">
                    <h6 class="pt-5 mt-3 mb-2">65% do conteúdo preenchido</h6>
                    <div class="progress mb-4" style="height: .25rem;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 65%" aria-valuenow="65"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-center"><i class="fi-check text-primary me-2"></i><a
                                class="nav-link fw-normal ps-1 p-0" href="#basic-info" data-scroll
                                data-scroll-offset="20">Informações Básicas</a></li>
                        <li class="d-flex align-items-center"><i class="fi-check text-primary me-2"></i><a
                                class="nav-link fw-normal ps-1 p-0" href="#location" data-scroll
                                data-scroll-offset="20">Endereço</a></li>
                        <li class="d-flex align-items-center"><i class="fi-check text-primary me-2"></i><a
                                class="nav-link fw-normal ps-1 p-0" href="#details" data-scroll
                                data-scroll-offset="20">Detalhes do Imóvel</a></li>
                        <li class="d-flex align-items-center"><i class="fi-check text-muted me-2"></i><a
                                class="nav-link fw-normal ps-1 p-0" href="#price" data-scroll
                                data-scroll-offset="20">Preço</a></li>
                        <li class="d-flex align-items-center"><i class="fi-check text-muted me-2"></i><a
                                class="nav-link fw-normal ps-1 p-0" href="#photos" data-scroll
                                data-scroll-offset="20">Mídias do Imóvel</a></li>
                        <li class="d-flex align-items-center"><i class="fi-check text-primary me-2"></i><a
                                class="nav-link fw-normal ps-1 p-0" href="#dados_proprietario" data-scroll
                                data-scroll-offset="20">Dados do Proprietário</a></li>
                    </ul>
                </div>
            </aside> --}}
            @include('admin.layouts.components.modalAwaitImages')

        </div>
    </div>
    <script>
        var deleteExceed = 0
    </script>
    <script src="{{ asset('assets/js/user/perfil/add-propriedade.js') }}"></script>
@endsection
