@extends('user.perfil.user.geralPerfilUser')

@section('conteudoPerfil')
    <!-- Content-->
    <div class="col-lg-9 col-md-7 mb-5">
        <h1 class="h2" style="font-size: 1.7rem !important">Meus Dados</h1>
        <form id="form_update_info_customer" data-request="{{ route('user.updateInfo') }}">
            <input type="hidden" name="csrf_token" value="{{ csrf_token() }}" />
            <input type="hidden" name="customer_id" value="{{ $customer->id}}" />

            <div class="border rounded-3 p-3 mb-4" id="personal-info">

                <!------ *** NOME COMPLETO *** -------->
                <div class="border-bottom pb-3 mb-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="pe-2">
                            <label class="form-label fw-bold">Nome Completo</label>
                            <div id="name-value">{{$customer->name ?? ''}}</div>
                        </div>
                        <div data-bs-toggle="tooltip" title="Editar">
                            <a class="nav-link py-0" href="#nomeCompleto" data-bs-toggle="collapse" aria-expanded="false">
                                <i class="fi-edit"></i>
                            </a>
                        </div>
                    </div>
                    <div class="collapse" id="nomeCompleto" data-bs-parent="#personal-info">
                        <input class="form-control mt-3 required" type="text" name="complete_name" value="{{ $customer->name ?? ''}}" oninput="nameValidate()" data-bs-unset-value="Informe o dado">
                        <div class="invalid-feedback-custom invalid-feedback" style="display: none;">Digite seu nome
                            completo</div>
                    </div>
                </div>

                <!------ *** DATA NASCIMENTO *** -------->
                <div class="border-bottom pb-3 mb-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="pe-2">
                            <label class="form-label fw-bold">Data de Nascimento</label>
                            <div id="data_nascimento_value">{{ date('d/m/Y', strtotime($customer->data_nasc)) ?? ''}}</div>
                        </div>
                        <div data-bs-toggle="tooltip" title="Editar">
                            <a class="nav-link py-0" href="#data_nascimento" data-bs-toggle="collapse"><i
                                    class="fi-edit"></i></a>
                        </div>
                    </div>
                    <div class="collapse" id="data_nascimento" data-bs-parent="#personal-info">
                        <input data-bs-unset-value="Informe o dado" class="form-control mt-3 required" name="data_nascimento" type="date" onkeyup="handleData(event)"
                            value="{{ date('Y-m-d', strtotime($customer->data_nasc)) ?? ''}}"  oninput="dateValidate()" data-bs-binded-element="#data_nascimento_value">
                            <div class="invalid-feedback-custom invalid-feedback" style="display: none;">Data inválida</div>
                    </div>
                </div>

                <!------ *** CPF *** -------->
                <div class="border-bottom pb-3 mb-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="pe-2">
                            <label class="form-label fw-bold">CPF</label>
                            <div id="cpf_value">{{ $customer->CPF ?? '' }}</div>
                        </div>
                        <div data-bs-toggle="tooltip" title="Editar"><a class="nav-link py-0" href="#cpf_perfil"
                                data-bs-toggle="collapse"><i class="fi-edit"></i></a></div>
                    </div>
                    <div class="collapse" id="cpf_perfil" data-bs-parent="#personal-info">
                        <input class="form-control mt-3 required" type="text" data-bs-binded-element="#cpf_value" name="cpf_perfil"
                             placeholder="" value="{{ $customer->CPF ?? ''}}" oninput="cpfValidate()" data-bs-unset-value="Informe o dado">
                            <div class="invalid-feedback-custom invalid-feedback" style="display: none;">CPF inválido</div>
                    </div>
                </div>

                <!------ *** E-MAIL *** -------->
                <div class="border-bottom pb-3 mb-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="pe-2">
                            <label class="form-label fw-bold">E-mail</label>
                            <div id="email-value">{{ $customer->email ?? '' }}</div>
                        </div>
                        <div data-bs-toggle="tooltip" title="Editar"><a class="nav-link py-0" href="#email-collapse"
                                data-bs-toggle="collapse"><i class="fi-edit"></i></a></div>
                    </div>
                    <div class="collapse" id="email-collapse" data-bs-parent="#personal-info">
                        <input class="form-control mt-3 required" name="email_perfil" type="email"
                            data-bs-binded-element="#email-value"  oninput="emailValidate()"
                            value="{{ $customer->email ?? '' }}" data-bs-unset-value="Informe o dado">
                            <div class="invalid-feedback-custom invalid-feedback" style="display: none;">Insira seu email</div>
                    </div>
                </div>

                <!------ *** TELEFONE *** -------->
                <div class="">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="pe-2">
                            <label class="form-label fw-bold">Telefone</label>
                            <div id="phone-value">{{ $customer->phone ?? '' }}</div>
                        </div>
                        <div data-bs-toggle="tooltip" title="Editar"><a class="nav-link py-0" href="#phone-collapse"
                                data-bs-toggle="collapse"><i class="fi-edit"></i></a></div>
                    </div>
                    <div class="collapse" id="phone-collapse" data-bs-parent="#personal-info">
                        <input class="form-control mt-3 required" name="telefone_perfil" type="text"
                            data-bs-binded-element="#phone-value"  onkeyup="handlePhone(event)"
                            value="{{ $customer->phone ?? '' }}" data-bs-unset-value="Informe o dado">
                            <div class="invalid-feedback-custom invalid-feedback" style="display: none;">Insira seu telefone
                            </div>
                    </div>
                </div>


            </div>
        </form>
        <div class="d-flex align-items-center justify-content-between border-top mt-4 pt-4 pb-1">
            <button class="btn btn-primary px-3 px-sm-4" type="button" id="btn_update_profile_customer" >Salvar Mudanças</button>
        </div>
    </div>

    <script src="{{ asset('assets/js/user/perfil/tabs/perfil.js') }}"></script>

@endsection
