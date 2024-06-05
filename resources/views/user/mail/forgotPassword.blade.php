
    {{-- <div>
        <p>{{$name}} caso tenha solicitado alteração de senha , clique no link a seguir</p>
        <p>{{$email}} caso tenha solicitado alteração de senha , clique no link a seguir</p>
        <a href="{{route('user.perfil.loginCadastrar.esqueceuSenha',['token' => $token])}}">Link para redefinir a senha</a>
    </div> --}}


    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    
    <head>
    
        <style>

            * {
                font-family: sans-serif; 
                margin: 0px;
            }

            .main-RecuperacaoTopo{
                height: 500px;
                width: 100%;
                background-color: rgba(245,244,248,1) !important;
            }

            .main-RecuperacaoBottom{
                height: 500px;
                width: 100%;
                background-color: #EEAA11;
            }

            .div-centerRecuperacaoSenha{
            }

            .caixaCentroRecuperacaoSenha{
                background-color: white;
                width: 400px;
                padding: 60px 60px;
                border: 1px solid black;

                margin-bottom: 15px;
            }

            .h2recuperacaoSenha{
                text-align: center;
                margin-top: 0px;
                margin-bottom: 30px;
                text-transform: uppercase;
                letter-spacing: 2px;
                font-weight: 600;
                font-size: 27px;
            }

            .textoSolicitacao{
                margin-bottom: 30px;
                font-size: 20px;
            }

            .botaoTrocarSenha{
                padding: 15px;
                background-color: #EEAA11;
                margin-bottom: 30px;
                color: white;
                text-decoration: none;
                text-transform: uppercase;
                text-align: center;
                font-weight: 700;
                letter-spacing: 2px;
                font-size: 20px;
            }

            .separador-Linhas{
                height: 1px;
                width: 100%;
                background-color: black;
                margin-bottom: 30px;
            }

            .botaoCliqueaqui{
                text-transform: uppercase;
                color: #EEAA11;
            }

            .textLembrouSenha{
                font-size: 18px;
                text-align: center;
            }

            .footerEmail{
                font-size: 18px;
                text-align: center;
            }

            .row-email {
            width: 100%;
            display: block;
            }

            .column-email {
                width: 100%;
                max-width: 300px;
                display: inline-block;
                vertical-align: top;
            }


        </style>
    </head>
    
    <div style="background: linear-gradient(to bottom, rgba(245,244,248,1) 50%, #EEAA11 50%); padding-top: 50px; padding-bottom:50px">


        <div style="display: flex;flex-direction: column;align-items: center">
            <img class="" style="margin-bottom:25px" src={{asset("assets/img/logo/logo-project.png")}} width="300" alt="Nome da empresa">
            <div class="caixaCentroRecuperacaoSenha" style="display: flex;flex-direction: column;">
                <h2 class="h2recuperacaoSenha">Recuperação de Senha 2</h2>
                <span class="textoSolicitacao">Olá {{$name}}, caso tenha solicitado a alteração de senha, clique no botão a seguir:</span>
                <a class="botaoTrocarSenha" href="{{route('user.perfil.loginCadastrar.esqueceuSenha',['token' => $token])}}">Trocar a senha</a>
                <div class="separador-Linhas"></div>
                <span class="textLembrouSenha">Lembrou sua senha? <span class="botaoCliqueaqui">Clique aqui</span> para logar</span>
            </div>
            <span class="footerEmail">Nome da empresa - exemplo@email.com.br</span>
        </div>

    </div>

    


</html>
    