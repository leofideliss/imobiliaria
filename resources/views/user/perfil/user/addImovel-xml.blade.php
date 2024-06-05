@extends('user.perfil.user.geralPerfilUser')

@section('conteudoPerfil')

    <!-- CONTEUDO -->
    <div class="col-lg-8 col-md-7 mb-5">
        <h1 class="h2">Adicionar imóveis via XML</h1>
        <p class="pt-1">Insira o link contendo os imóveis que deseja inserir no sistema. O arquivo deve ter o padrão ZAP.</p>
        
        <form id="form_customer_send_XML" class="needs-validation pb-4" novalidate>
            <div class="row align-items-end mb-2">
                <div class="col-sm-12 mb-2">
                    <label class="form-label" for="xmlName">Nome do serviço</label>
                    <div class="">
                        <input class="form-control" type="text" id="xmlName" name="xmlName" required>
                    </div>
                </div>
                <div class="col-sm-12 mb-2">
                    <label class="form-label" for="xmlImovel">Link dos imóveis</label>
                    <div class="">
                        <input class="form-control" type="text" id="xmlImovel" name="xmlImovel"required>
                    </div>
                </div>
            </div>
            <div style="display: flex;padding-top: 1rem">
                <a style="padding: 8px 18px;margin-right: 15px;" class="btn btn-outline-danger btn-lg mb-sm-0" href="{{ route('user.perfil.user.lista-xml') }}">
                    Cancelar
                </a>
                <button class="btn btn-outline-primary" type="submit">Enviar</button>
            </div>

           
        </form>            
    </div>

    <script src="{{ asset('assets/js/user/perfil/tabs/addXML.js') }}"></script>

@endsection