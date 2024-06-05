@extends('index')

@section('content')
    <div class="modal fade" id="esqueceuSenha" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered p-2 my-0 mx-auto" style="max-width: 650px;">
            <div class="modal-content">
                <div class="modal-body px-0 py-2 py-sm-0">
                    <button class="btn-close position-absolute top-0 end-0 mt-3 me-3" type="button"
                        data-bs-dismiss="modal"></button>
                    <div class="row mx-0 align-items-center">
                        <div class="col-md-12 border-end-md p-4 p-sm-5">
                            <h2 class="h3 mb-4 mb-sm-5">Esqueceu sua senha de acesso?</h2>
                            <p>Informe seu e-mail de cadastro:</p>
                            <div class="invalid-feedback-custom invalid-feedback" style="display: none;">Email inválido
                            </div>
                            <input class="form-control mb-4 required" type="email" name="esqueceu-email"
                                placeholder="Digite seu e-mail" required oninput="emailValidateForgotPassword()" />
                        
                            <button class="btn btn-primary btn-lg w-100" type="button" id=""
                                onclick="sendEmail()">Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="bg-cinza py-5" style="padding-bottom: 1rem !important">
        <div class="container topo-padding-top">

            <!-- Page title-->
            <div class="mb-lg-5 mx-auto text-center" style="max-width: 856px;">
                <h1 class="display-5 pb-lg-2">
                    Entrar na sua conta<span class='text-primary'></span>
                </h1>
                <p class="lead opacity-70">
                    Nulla felis neque ultrices ut aliquam. Pellentesque id semper iaculis scelerisque etiam egestas interdum
                    proin sit.
                </p>
            </div>

        </div>
    </section>
    {{-- <!-- Breadcrumb-->
    <div class="container mt-5 mb-md-4 pt-5">
    </div>
    <!-- Hero--> --}}
    <section class="container ">
        <div class="row align-items-center gy-4" style="justify-content:center">

            <div class="col-md-8 col-lg-6 px-4 pt-4 pb-4 px-sm-5 pb-sm-5 pt-md-5 pt-sm-5">
                <div class="d-flex justify-content-center">
                    <div id="buttonDiv"></div>
                </div>

                {{-- <a
                class="btn btn-outline-info w-100 mb-3" href="#"><i
                    class="fi-facebook fs-lg me-1"></i>Entrar com o Facebook</a> --}}
                <div class="d-flex align-items-center py-3 mb-3">
                    <hr class="w-100">
                    <div class="px-3">Ou</div>
                    <hr class="w-100">
                </div>
                <input class="form-control required" type="hidden" name="" id="" placeholder="" required>
                <div class="invalid-feedback-custom invalid-feedback" style="display: none;">Email ou senha inválido</div>

                <form id="form_customer_auth" data-request="{{ route('user.perfil.authCustomer') }}">
                    <input type="hidden" name="csrf_token" value="{{ csrf_token() }}" />

                    <div class="mb-4 fv-row">
                        <label class="form-label mb-2" for="email_login">E-mail</label>
                        <input class="form-control required" type="email" name="email_login" id="email_login"
                            placeholder="Digite seu e-mail" required oninput="emailValidate()">
                        <div class="invalid-feedback-custom invalid-feedback" style="display: none;">Email inválido</div>
                    </div>
                    <div class="mb-4 fv-row">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <label class="form-label mb-0" for="senha_login">Senha</label>
                            <a class="fs-sm" data-bs-toggle="modal" href="#esqueceuSenha" tabindex="-1" style="text-decoration: none">Esqueceu sua Senha?</a>
                        </div>
                        <div class="password-toggle">
                            <input class="form-control required" type="password" name="senha_login" id="senha_login"
                                placeholder="Digite sua Senha" required oninput="mainPasswordValidate()">
                            <div class="invalid-feedback-custom invalid-feedback">Senha inválida</div>
                            <label class="password-toggle-btn" aria-label="Show/hide password">
                                <input class="password-toggle-check" type="checkbox"><span
                                    class="password-toggle-indicator"></span>
                            </label>
                        </div>

                    </div>
                    <button class="btn btn-primary btn-lg w-100" type="button" id="submit_auth_customer">Entrar</button>
                    <div class="mt-4 mt-sm-5">Não possui conta? <a
                            href="{{ route('user.perfil.loginCadastrar.cadastrar') }}" style="text-decoration: none">Crie sua conta</a></div>
                </form>
            </div>
        </div>
    </section>

    {{-- LOGIN WITH GOOGLE --}}
    <script src="https://accounts.google.com/gsi/client" async></script>
    <script src="{{ asset('assets/js/jwt-decode.js') }}"></script>
    <script src="{{ asset('assets/js/user/perfil/loginCadastrar/entrar.js') }}"></script>

    <script>
        (function() {



            var menuEntrarUsuario = document.getElementById('menuEntrarUsuario');


            if (menuEntrarUsuario != null) {
                window.addEventListener('scroll', function() {
                    if (window.scrollY > 0) {
                        menuEntrarUsuario.classList.add('bg-header');
                        menuEntrarUsuario.classList.remove('bg-transparente');
                    } else {
                        menuEntrarUsuario.classList.remove('bg-header');
                        menuEntrarUsuario.classList.add('bg-transparente');
                    }
                });
            }


        })();
    </script>
@endsection
