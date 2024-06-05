@extends('index')

@section('content')
    <section class="bg-cinza py-5" style="padding-bottom: 1rem !important">
        <div class="container topo-padding-top">

            <!-- Page title-->
            <div class="mb-lg-5 mx-auto text-center" style="max-width: 856px;">
                <h1 class="display-5 pb-lg-2">
                    Criar sua conta<span class='text-primary'></span>
                </h1>
                <p class="lead opacity-70">
                    Nulla felis neque ultrices ut aliquam. Pellentesque id semper iaculis scelerisque etiam egestas interdum
                    proin sit.
                </p>
            </div>

        </div>
    </section>

    <section class="container ">
        <div class="row align-items-center gy-4" style="justify-content:center">

            <div class="col-md-8 col-lg-6 px-4 pt-4 pb-4 px-sm-5 pb-sm-5 pt-md-5 pt-sm-5">
                <a class="btn btn-outline-info w-100 mb-3" href="#">
                    <i class="fi-google fs-lg me-1"></i>Entrar com o Google</a>
                {{-- <a class="btn btn-outline-info w-100 mb-3" href="#">
                    <i class="fi-facebook fs-lg me-1"></i>Entrar com o Facebook</a> --}}
                <div class="d-flex align-items-center py-3 mb-3">
                    <hr class="w-100">
                    <div class="px-3">Ou</div>
                    <hr class="w-100">
                </div>
                <form id="add_customer_form" data-request="{{ route('user.perfil.addCustomer') }}">
                    <input type="hidden" name="csrf_token" value="{{ csrf_token() }}" />

                    <div class="mb-4">
                        <label class="form-label" for="name_user">Nome Completo</label>
                        <input class="form-control required" type="text" name="name_user" id="name_user"
                            placeholder="Digite seu nome completo" required oninput="nameValidate()">
                        <div class="invalid-feedback-custom invalid-feedback" style="display: none;">Digite seu nome
                            completo</div>

                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="data_user">Data de Nascimento</label>
                        <input class="form-control form-control-solid required" type="date" name="data_user" id="data_user" required oninput="dateValidate()">
                        <div class="invalid-feedback-custom invalid-feedback" style="display: none;">Data inválida</div>

                    </div>
                    <div class="mb-4 fv-row">
                        <label class="form-label" for="cpf_user">CPF</label>
                        <input class="form-control kt_inputmask_cpf required" type="text" name="cpf_user" maxlength="14"
                            onkeyup="handleCpf(event)" id="cpf_user" placeholder="Digite seu CPF" required
                            oninput="cpfValidate()">
                        <div class="invalid-feedback-custom invalid-feedback" style="display: none;">CPF inválido</div>

                    </div>
                    <div class="mb-4 fv-row">
                        <label class="form-label" for="email_user">E-mail</label>
                        <input class="form-control required" type="email" name="email_user" id="email_user"
                            placeholder="Digite seu e-mail" required oninput="emailValidate()">
                        <div class="invalid-feedback-custom invalid-feedback" style="display: none;">Insira seu email</div>

                    </div>
                    <div class="mb-4 fv-row">
                        <label class="form-label" for="telefone_user">Telefone Celular</label>
                        <input class="form-control required" type="text" name="telefone_user" id="telefone_user"
                            onkeyup="handlePhone(event)" maxlength="15" placeholder="Digite seu telefone celular" required>
                        <div class="invalid-feedback-custom invalid-feedback" style="display: none;">Insira seu telefone
                        </div>

                    </div>
                    <div class="mb-4 fv-row">
                        <label class="form-label" for="senha_user">Senha <span class='fs-sm text-muted'>min. 8
                                caracteres</span></label>
                        <div class="password-toggle">
                            <input class="form-control required" type="password" name="senha_user" id="senha_user"
                                minlength="8" required oninput="mainPasswordValidate()">


                            <label class="password-toggle-btn" aria-label="Show/hide password">
                                <input class="password-toggle-check" type="checkbox"><span
                                    class="password-toggle-indicator"></span>
                            </label>
                            <div class="invalid-feedback-custom invalid-feedback" style="display: none;">Insira a senha
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 fv-row">
                        <label class="form-label" for="senha_confirmacao_user">Confirmar a Senha</label>
                        <div class="password-toggle">
                            <div class="invalid-feedback">Insira a senha</div>
                            <input class="form-control required" type="password" name="senha_confirmacao_user"
                                id="senha_confirmacao_user" minlength="8" required oninput="comparePassword()">


                            <label class="password-toggle-btn" aria-label="Show/hide password">
                                <input class="password-toggle-check" type="checkbox"><span
                                    class="password-toggle-indicator"></span>
                            </label>

                            <div class="invalid-feedback-custom invalid-feedback" style="display: none;">Senhas não
                                conferem</div>
                        </div>
                    </div>
                    <div class="form-check mb-4 fv-row">
                        <input class="form-check-input required" type="checkbox" id="agree-to-terms-customer" required
                            name="terms_user">
                        <div class="invalid-feedback-custom invalid-feedback" style="display: none;">É necessário aceitar
                            os termosx</div>

                        <label class="form-check-label" for="agree-to-terms-customer">Eu concordo com os <a href='{{route('user.contact.termos-uso')}}' target="_blank">Termos de uso</a> e 
                            <a href='{{ route('user.contact.politica-privacidade') }}' target="_blank">Política de Privacidade</a></label>
                    </div>
                    {{-- button actions --}}
                    <button class="btn btn-primary btn-lg w-100" type="submit" data-action="sendForm">Cadastrar-se
                    </button>
                    <button type="submit" class="btn btn-primary btn-lg w-100 d-none" data-action="sendForm" disabled>
                        <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                        Loading...
                    </button>
                    <div class="mt-4 mt-sm-5">Já possui conta? <a
                            href="{{ route('user.perfil.loginCadastrar.entrar') }}">Entrar</a></div>
                </form>
            </div>
        </div>
    </section>

    <script>
        (function() {

            var menuCadastroUsuario = document.getElementById('menuCadastroUsuario');


            if (menuCadastroUsuario != null) {
                window.addEventListener('scroll', function() {
                    if (window.scrollY > 0) {
                        menuCadastroUsuario.classList.add('bg-header');
                        menuCadastroUsuario.classList.remove('bg-transparente');
                    } else {
                        menuCadastroUsuario.classList.remove('bg-header');
                        menuCadastroUsuario.classList.add('bg-transparente');
                    }
                });
            }


        })();


        function addCustomer() {
            let urlBase = window.location.protocol + "//" + window.location.host;

            let form;
            form = document.querySelector('#add_customer_form');
            let buttonsSendForm = $('[data-action="sendForm"]')
            $(buttonsSendForm[0]).addClass('d-none')
            $(buttonsSendForm[1]).removeClass('d-none')

            let input_name = $("input[name=name_user]").val()
            let input_data = $("input[name=data_user]").val()
            let input_phone = $("input[name=telefone_user]").val()
            let input_email = $("input[name=email_user]").val()
            let input_cpf = $("input[name=cpf_user]").val()
            let input_senha = $("input[name=senha_user]").val()
            let check_terms = $("input[name=terms_user]").is(":checked")


            $.ajax({
                url: $(form).data("request"),
                type: "post",
                data: {
                    "_token": $("input[name=csrf_token]").val(),
                    'CPF': input_cpf,
                    'name': input_name,
                    'phone': input_phone,
                    'email': input_email,
                    'password': input_senha,
                    'data_nasc': input_data,
                    'terms': check_terms
                },
                dataType: 'json',
                success: function(d) {
                    setTimeout(() => {
                        $(buttonsSendForm[0]).removeClass('d-none')
                        $(buttonsSendForm[1]).addClass('d-none')

                    },2000);
                    location.href = `${urlBase}/entrar`

                },
                error: function(d) {
                    let data = d.responseJSON;
                    Toastify({
                        text: data.message,
                        className: "error",
                        style: {
                            background: "red",
                        }
                    }).showToast();

                },
                complete: function(e) {
                    setTimeout(() => {
                        $(buttonsSendForm[0]).removeClass('d-none')
                        $(buttonsSendForm[1]).addClass('d-none')

                    }, 1000);

                }
            });

        }


        let form = document.querySelector("#add_customer_form")
        let campos = document.querySelectorAll(".required")
        let spans = document.querySelectorAll(".invalid-feedback-custom")
        const emailRegex = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
        const nomeSobrenome = /[A-z][ ][A-z]/;
        form.addEventListener('submit', (e) => {

            e.preventDefault()
            if (!$(form).hasClass('invalid-form'))
                addCustomer()

        });

        function validaCPF(cpf) {
            var Soma = 0
            var Resto

            var strCPF = String(cpf).replace(/[^\d]/g, '')

            if (strCPF.length !== 11)
                return false

            if ([
                    '00000000000',
                    '11111111111',
                    '22222222222',
                    '33333333333',
                    '44444444444',
                    '55555555555',
                    '66666666666',
                    '77777777777',
                    '88888888888',
                    '99999999999',
                ].indexOf(strCPF) !== -1)
                return false

            for (i = 1; i <= 9; i++)
                Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);

            Resto = (Soma * 10) % 11

            if ((Resto == 10) || (Resto == 11))
                Resto = 0

            if (Resto != parseInt(strCPF.substring(9, 10)))
                return false

            Soma = 0

            for (i = 1; i <= 10; i++)
                Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (12 - i)

            Resto = (Soma * 10) % 11

            if ((Resto == 10) || (Resto == 11))
                Resto = 0

            if (Resto != parseInt(strCPF.substring(10, 11)))
                return false

            return true
        }

        function setError(index) {
            $(form).addClass('invalid-form')
            campos[index].style.border = '2px solid #e63636';
            spans[index].style.display = 'block';
        }

        function removeError(index) {
            $(form).removeClass('invalid-form')
            campos[index].style.border = '';
            spans[index].style.display = 'none';
        }

        function nameValidate() {
            if (!nomeSobrenome.test(campos[0].value)) {
                setError(0);
            } else {
                removeError(0);
            }
        }

        function cpfValidate() {
            if (!validaCPF(campos[2].value)) {
                setError(2);
            } else {
                removeError(2);
            }
        }

        function dateValidate() {
            if (new Date() > new Date(campos[1].value))
                removeError(1);
            else
                setError(1);
        }

        function emailValidate() {
            if (!emailRegex.test(campos[3].value)) {
                setError(3);
            } else {
                removeError(3);
            }
        }

        function mainPasswordValidate() {
            if (campos[5].value.length < 8) {
                setError(5);
            } else {
                removeError(5);
                comparePassword();
            }
        }

        function comparePassword() {
            if (campos[5].value == campos[6].value && campos[6].value.length >= 8) {
                removeError(6);
            } else {
                setError(6);
            }
        }
    </script>
@endsection
