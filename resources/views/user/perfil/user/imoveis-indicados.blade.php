@extends('user.perfil.user.geralPerfilUser')

@section('conteudoPerfil')

    <!-- INDICAR IMOVEL -->
    <div class="modal fade" id="indicar-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered p-2 my-0 mx-auto" style="max-width: 950px;">
            <div class="modal-content">
                <div class="modal-body px-0 py-2 py-sm-0">
                    <button class="btn-close position-absolute top-0 end-0 mt-3 me-3" type="button"
                        data-bs-dismiss="modal"></button>
                    <div class="row mx-0 align-items-center">
                        <div class="col-md-12 div-tituloFormImoveis">
                            <h2>Indique um Imóvel</h2>
                            <div class="">Insira as informações do imóvel e entraremos em contato</div>
                        </div>
                        <form class="form-espacoImoveis">

                            <div class="mb-4">
                                <!-- NOME PROPRIETARIO / CPF -->
                                <div class="row">
                                    <div class="col-sm-6 mb-3">
                                        <label class="form-label" for="ap-fn">Seu Nome Completo <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="seu_nome_completo" id="ap-fn" value="" placeholder="Digite o seu nome completo" required>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label class="form-label" for="ap-sn">CPF <span class="text-danger">*</span></label>
                                        <input class="form-control" name="seu_cpf" type="text" id="ap-sn" value="" maxlength="14" onkeyup="handleCpf(event)" placeholder="Digite seu CPF" required>
                                    </div>
                                </div>

                                <!-- E-MAIL / TELEFONE -->
                                <div class="row">
                                    <div class="col-sm-6 mb-3">
                                        <label class="form-label" for="ap-email">E-mail <span class="text-danger">*</span></label>
                                        <input class="form-control" name="seu_e-mail" type="text" id="ap-email" value="" placeholder="Digite seu e-mail">
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label class="form-label" for="ap-phone">Telefone Celular <span class="text-danger">*</span></label>
                                        <input class="form-control" name="seu_telefone" type="tel" id="ap-phone" data-format="custom" value="" onkeyup="handlePhone(event)" maxlength="15" placeholder="Digite seu telefone celular">
                                    </div>
                                </div>
                            </div>
                        
                            <div class="mb-4">
                    
                                <div class="row">
                                    <div class="col-sm-4 mb-3">
                                        <label class="form-label" for="ap-zip">
                                            CEP  <span class="text-danger">*</span>
                                        </label>
                                        <input class="form-control" name="cep_endereco" maxlength="9" onkeyup="handleCep(event)" type="text" id="ap-zip" placeholder="Digite o cep" value="" required>
                                    </div>
                                </div>
            
                                <div class="row">
                                    <div class="col-sm-6 mb-3">
                                        <label class="form-label" for="ap-country">Estado <span class="text-danger">*</span></label>
                                        <select class="form-select" name="estado_endereco" id="ap-country" required>
                                            <option value="" disabled>Escolha o Estado</option>
                                            <option value="SaoPaulo">São Paulo</option>
                                            <option value="Parana">Paraná</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label class="form-label" for="ap-city">Cidade <span class="text-danger">*</span></label>
                                        <select class="form-select" name="cidade_endereco" id="ap-city" required>
                                            <option value="" disabled>Escolha a Cidade</option>
                                            <option value="Chicago">Presidente Prudente</option>
                                            <option value="Dallas">São Paulo</option>
                                        </select>
                                    </div>
                                </div>
            
                                <div class="mb-3">
                                    <label class="form-label" for="ap-address">
                                        Rua <span class="text-danger">*</span>
                                    </label>
                                    <input class="form-control" type="text" name="rua_endereco" id="ap-address" value="" required>
                                </div>
            
                                <div class="row">
                                    <div class="col-sm-2 mb-3">
                                        <label class="form-label" for="ap-zip">
                                            Número  <span class="text-danger">*</span>
                                        </label>
                                        <input class="form-control" name="numero_endereco" type="text" id="ap-zip" placeholder="Nº" value="" required>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label class="form-label" for="ap-zip">
                                            Bairro  <span class="text-danger">*</span>
                                        </label>
                                        <input class="form-control" type="text" name="bairro_endereco" id="ap-zip" placeholder="Digite o bairro" value="" required>
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label class="form-label" for="ap-zip">
                                            Complemento  <span class="text-danger"></span>
                                        </label>
                                        <input class="form-control" type="text" name="complemento_endereco" id="ap-zip" placeholder="Digite o complemento" value="" >
                                    </div>
                                </div>

                            </div>

                            <div>
                                <!-- NOME PROPRIETARIO -->
                                <div class="row">
                                    <div class="col-sm-6 mb-3">
                                        <label class="form-label" for="ap-fn">Nome do Proprietário <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" id="ap-fn" name="name_proprietario" value="" placeholder="Digite o nome do proprietário" required>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label class="form-label" for="ap-sn">CPF <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="cpf_proprietario" id="ap-sn" maxlength="14" onkeyup="handleCpf(event)" value="" placeholder="Digite o CPF do proprietário" required>
                                    </div>
                                </div>

                                <!-- E-MAIL/TELEFONE -->
                                <div class="row">
                                    <div class="col-sm-6 mb-3">
                                        <label class="form-label" for="ap-email">E-mail do proprietário<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="email_proprietario" id="ap-email" value="" placeholder="Digite o e-mail do proprietário">
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label class="form-label" for="ap-phone">Telefone Celular <span class="text-danger">*</span></label>
                                        <input class="form-control" type="tel" id="ap-phone" data-format="custom" name="telefone_proprietario" onkeyup="handlePhone(event)" maxlength="15" value="" placeholder="Digite o celular do proprietário">
                                    </div>
                                </div>
                            </div>
                            

                            {{-- <div class="texto-formulario mb-3">Endereço do Imóvel</div>
                            <div class="row">
                                <div class="col-md-6 form-floating mb-3">
                                    <input class="form-control" id="floating-input" type="text" placeholder="">
                                    <label for="floating-input">Rua</label>
                                </div>
                                <div class="col-md-6 form-floating mb-3">
                                    <input class="form-control" id="floating-input" type="text" placeholder="">
                                    <label for="floating-input">Número</label>
                                </div>
                            </div>

                            <div class="texto-formulario mb-3">Informações do Proprietário do Imóvel</div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="floating-input" type="text" placeholder="">
                                <label for="floating-input">Nome do Proprietário</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="floating-input" type="text" placeholder="">
                                <label for="floating-input">Telefone do Proprietário</label>
                            </div> --}}

                            <!-- BOTÃO -->
                            <section class="d-sm-flex justify-content-between pt-2">
                                <a class="btn btn-primary btn-lg d-block mb-2" href="#">Indicar Imóvel</a>
                            </section>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- CONTEUDO -->
    <div class="col-lg-8 col-md-7 mb-5">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h2 mb-0">Imóveis Indicados</h1>
            <button class="navbar-toggler ms-auto" id="geral" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
            </button>
            <a class="btn btn-sm text-primary d-none d-lg-block order-lg-3" href="#indicar-modal"
                data-bs-toggle="modal">
                <i class="fi-plus me-2"></i>Indicar um Imóvel
            </a>
        </div>
        <p class="pt-1 mb-4">Informações sobre minhas indicações de imóveis.</p>

        <!-- TABS NAVEGAÇÃO -->
        <ul class="nav nav-tabs border-bottom mb-4" role="tablist">
            <li class="nav-item mb-3">
                <a class="nav-link active" href="#" role="tab" aria-selected="true">
                    <i class="fi-file fs-base me-2"></i>Publicados
                </a>
            </li>
            <li class="nav-item mb-3">
                <a class="nav-link" href="#" role="tab" aria-selected="false">
                    <i class="fi-file-clean fs-base me-2"></i>Aguardando Aprovação
                </a>
            </li>

        </ul>

        <!-- Item-->
        <div class="card card-hover card-horizontal border-0 shadow-sm mb-4">
            <div class="card-body position-relative pb-3">
                <div class="dropdown position-absolute zindex-5 top-0 end-0 mt-3 me-3">
                    <button class="btn btn-icon btn-light btn-xs rounded-circle shadow-sm" type="button" id="contextMenu1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fi-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu my-1" aria-labelledby="contextMenu1">
                        <li>
                            <button class="dropdown-item" type="button"><i class="fi-edit opacity-60 me-2"></i>Editar</button>
                        </li>
                        <li>
                            <button class="dropdown-item" type="button">
                                <i class="fi-trash opacity-60 me-2"></i>Deletar
                            </button>
                        </li>
                    </ul>
                </div>
                <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">Venda</h4>
                <h3 class="h6 mb-2 fs-base">
                    <a class="nav-link stretched-link" href="real-estate-single-v1.html">Casa no condomínio</a>
                </h3>
                <p class="mb-2 fs-sm text-muted">Rua Inácio Albino Neto - Gramame - João Pessoa/PB</p>

                <div class="d-flex align-items-center justify-content-center justify-content-sm-start pt-3 pb-2 mt-3 text-nowrap">
                    <p class="mb-2 fs-sm text-muted">Proprietário: João Bosco</p>
                
                </div>
            </div>
        </div>

    </div>

@endsection