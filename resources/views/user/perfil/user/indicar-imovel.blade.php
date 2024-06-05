@extends('index')

@section('content')

    <div class="container div-flexBotaoVoltar mt-5 pt-5">
        <a class="btn btn-outline-primary btn-lg rounded-pill mb-3 mb-sm-0" href="{{route('user.perfil.user.user')}}">
            <i class="fi-chevron-left fs-sm me-2"></i>Voltar
        </a>
    </div>

    <!-- Page container-->
    <div class="container mb-md-4 py-5" style="padding-top: 1rem !important">
        <div class="" style="display: flex; justify-content: center;">

            <!-- Page content-->
            <div class="col-lg-8">
                <!-- CAMINHO -->
                <nav class="mb-3 pt-md-3" aria-label="Breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="real-estate-home-v1.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Indicar Imóvel</li>
                    </ol>
                </nav>

                <!-- Título  -->
                <div class="mb-4">
                    <h1 class="h2 mb-0">Indicar um Imóvel</h1>

                </div>

                <!-- SEUS DADOS -->
                <section class="card card-body border-0 shadow-sm p-4 mb-4" id="dados_proprietario">

                    <h2 class="h4 mb-4">
                        <i class="fi-user text-primary fs-5 mt-n1 me-2"></i>Seus Dados
                    </h2>

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

                </section>

                <!-- ENDEREÇO -->
                <section class="card card-body border-0 shadow-sm p-4 mb-4" id="location">

                    <h2 class="h4 mb-4">
                        <i class="fi-map-pin text-primary fs-5 mt-n1 me-2"></i>Endereço do Imóvel
                    </h2>

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

                </section>

                <!-- DADOS PROPRIETÁRIO -->
                <section class="card card-body border-0 shadow-sm p-4 mb-4" id="dados_proprietario">

                    <h2 class="h4 mb-4">
                        <i class="fi-phone text-primary fs-5 mt-n1 me-2"></i>Dados do Proprietário
                    </h2>

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


                </section>

                <!-- BOTÃO -->
                <section class="d-sm-flex justify-content-between pt-2">
                    <a class="btn btn-primary btn-lg d-block mb-2" href="real-estate-property-promotion.html">Indicar Imóvel</a>
                </section>
            </div>

        </div>
    </div>


@endsection