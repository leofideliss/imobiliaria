@extends('user.perfil.user.geralPerfilUser')

@section('conteudoPerfil')

    <!-- CONTEUDO -->
    <div class="col-lg-8 col-md-7 mb-5">
        <input type="hidden" id="email_customer" value="{{$customer->email}}">
        <h1 class="h2">Minha senha</h1>
        <p class="pt-1">Gerencia suas configurações de senha.</p>
        
        <form class="needs-validation pb-4" novalidate id="form_user_new_password">
            <div class="row align-items-end mb-2">
                <div class="col-sm-6 mb-2">
                    <label class="form-label" for="account-password">Senha Atual</label>
                    <div class="password-toggle">
                        <input class="form-control required" type="password" id="account-password" required oninput="currentPasswordValidate()">
                        <label class="password-toggle-btn" aria-label="Show/hide password">
                            <input class="password-toggle-check" type="checkbox">
                            <span class="password-toggle-indicator"></span>
                        </label>
                    </div>
                    <div class="invalid-feedback-custom invalid-feedback" style="display: none;">Insira a senha
                    </div>
                </div>
                <div class="col-sm-6 mb-2">
                <button id="btn_send_email_forgot" type="button" class="d-inline-block  btn btn-link" href="#" onclick="sendEmail()">Esqueceu sua senha?</button>
                 
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-6 mb-3">
                    <label class="form-label" for="account-password-new">Nova Senha</label>
                    <div class="password-toggle">
                        <input class="form-control required" type="password" id="account-password-new" required oninput="mainPasswordValidate()">
                        <label class="password-toggle-btn" aria-label="Show/hide password">
                            <input class="password-toggle-check" type="checkbox">
                            <span class="password-toggle-indicator"></span>
                        </label>
                    </div>
                    <div class="invalid-feedback-custom invalid-feedback" style="display: none;">Insira a senha
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label class="form-label" for="account-password-confirm">Confirme sua Senha</label>
                    <div class="password-toggle">
                        <input class="form-control required" type="password" id="account-password-confirm" required oninput="comparePassword()">
                        <label class="password-toggle-btn" aria-label="Show/hide password">
                            <input class="password-toggle-check" type="checkbox">
                            <span class="password-toggle-indicator"></span>
                        </label>
                    </div>
                    <div class="invalid-feedback-custom invalid-feedback" style="display: none;">Insira a senha
                    </div>
                </div>
            </div>
            <button class="btn btn-outline-primary" type="submit">Alterar Senha</button>
        </form>            
    </div>

    <script src="{{ asset('assets/js/user/perfil/tabs/trocar-senha.js') }}"></script>

@endsection