@extends('index')

@section('content')

    <section class="bg-cinza py-5" style="padding-bottom: 1rem !important">
        <div class="container topo-padding-top">

            <!-- Page title-->
            <div class="mb-lg-5 mx-auto text-center" style="max-width: 856px;">
                <h1 class="display-5 pb-lg-2">
                    Redefinir sua senha<span class='text-primary'></span>
                </h1>
                <p class="lead opacity-70">
                    Insira a nova senha da sua conta.
                </p>
            </div>

        </div>
    </section>

    <section class="container " style="margin-bottom: 40px;margin-top:40px">
        <div class="row align-items-center gy-4" style="justify-content:center">

            <div class="col-md-8 col-lg-6 px-4 pt-4 pb-4 px-sm-5 pb-sm-5 pt-md-5 pt-sm-5">

                <form class="needs-validation" novalidate id="form_customer_new_password" data-request="{{route('user.newPassword')}}">
                    <input type="hidden" name="csrf_token" value="{{ csrf_token() }}" />
                    
                    <div class="mb-4 fv-row">
                        <label class="form-label mb-2" for="nova_senha">Nova Senha</label>
                        <input class="form-control required" type="password" name="nova_senha" id="nova_senha" placeholder="Digite sua nova senha" required oninput="mainPasswordValidate()">
                        <div class="invalid-feedback-custom invalid-feedback" style="display: none;">A senha deve ter no Mín. 8 caracteres
                        </div>
                    </div>
                    <div class="mb-4 fv-row">
                        <label class="form-label mb-2" for="repita_novaSenha">Repita a senha</label>
                        <input class="form-control required" type="password" name="repita_novaSenha" id="repita_novaSenha" placeholder="Digite novamente sua nova senha" oninput="comparePassword()" required>
                        <div class="invalid-feedback-custom invalid-feedback" style="display: none;">Senhas não
                            conferem</div>
                    </div>

                    <button class="btn btn-primary btn-lg w-100" type="button" id="submit_customer_new_password">Enviar</button>
                    <div class="mt-4 mt-sm-5">Já possui conta? <a href="{{route('user.perfil.loginCadastrar.entrar')}}">Entrar</a></div>
                </form>
            </div>
        </div>
        <input type="hidden" name="token_sv" value="{{$token}}">
    </section>


    <script src="{{ asset('assets/js/user/perfil/loginCadastrar/newPassword.js') }}"></script>

    <script>
        
        (function () {

            var menuEntrarUsuario = document.getElementById('menuEntrarUsuario');


            if(menuEntrarUsuario != null){
                window.addEventListener('scroll', function () {
                    if (window.scrollY > 0) 
                    {
                        menuEntrarUsuario.classList.add('bg-header');
                        menuEntrarUsuario.classList.remove('bg-transparente');
                    }
                    else{
                        menuEntrarUsuario.classList.remove('bg-header');
                        menuEntrarUsuario.classList.add('bg-transparente');
                    } 
                });
            }


        })();

    </script>

@endsection