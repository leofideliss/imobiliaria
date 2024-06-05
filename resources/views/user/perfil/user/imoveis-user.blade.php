@extends('user.perfil.user.geralPerfilUser')

@section('conteudoPerfil')
    <!-- CONTEUDO -->
    <div class="col-lg-8 col-md-7 mb-5">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h2 mb-0">Meus Imóveis</h1>
            <a class="fw-bold text-decoration-none" href="{{ route('user.perfil.add-propriedade') }}" style="font-size: 14px">
                <i class="fi-plus mt-n1 me-2"></i>Adicionar um Imóvel
            </a>
        </div>
        <p class="pt-1 mb-4">Informações sobre os meus imóveis cadastrados.</p>

        <form action="" method="" id="form" class="form">
            <input type="hidden" id="page" name="page" value="0">

            <input type="hidden" id="aprovado" name="aprovado" value="1">
            <input type="hidden" id="xml" name="xml" value="0">
            <input type="hidden" id="aguardando" name="aguardando" value="0">
            <input type="hidden" id="desabilitado" name="desabilitado" value="0">
        </form>

        <div class="botoesFiltrosImoveisUser">
            <a href="" class="botaoFiltroImoveisUser botaoFiltroImoveisUserSelecionado" id="buttonAprovado" style="margin-bottom: 20px">Aprovado</a>
            <a href="" class="botaoFiltroImoveisUser" id="buttonXml" style="margin-bottom: 20px">Xml</a>
            <a href="" class="botaoFiltroImoveisUser" id="buttonAguardando" style="margin-bottom: 20px">Aguardando</a>
            <a href="" class="botaoFiltroImoveisUser" id="buttonDesabilitado" style="margin-bottom: 20px">Desabilitado</a>
        </div>

        <!-- Item publicados-->
        <div class="carregar">

        </div>

        <script>


            $("body").on('click', '[data-bs-toggle="dropdownTabs"]', function(e) {
                let parentDrop = null
                let dropDownMenu = null
                e.preventDefault();
                parentDrop = $(e.currentTarget).parents(".dropdown")
                dropDownMenu = $(parentDrop).find(".dropdown-menu")
                if ($(dropDownMenu).hasClass("show"))
                    $(dropDownMenu).removeClass("show")
                else
                    $(dropDownMenu).addClass("show")

            });

            $(document).ready(function() {
                
                carregarTabelaPost(0);
                
            });

            function carregarTabelaPost(pagina) {
                $('.carregar').html('<div class="spinner-border m-5" role="status"><span class="sr-only"></span></div>');
                $('#page').val(pagina);
                var dados = $('#form').serialize();
                console.log(dados);
                $.ajax({
                    url: "{{ route('user.perfil.user.paginacaoImoveis.tabUser') }}",
                    method: 'GET',
                    data: dados
                }).done(function(data) {
                    $('.carregar').html(data);
                });
            }

            $(document).on('click', '#buttonAprovado', function(e) {
                e.preventDefault();
                $('#aprovado').val(1);
                $('#aguardando').val(0);
                $('#xml').val(0);
                $('#desabilitado').val(0);
    
                $('#buttonAprovado').addClass('botaoFiltroImoveisUserSelecionado');
                $('#buttonAguardando').removeClass('botaoFiltroImoveisUserSelecionado');
                $('#buttonXml').removeClass('botaoFiltroImoveisUserSelecionado');
                $('#buttonDesabilitado').removeClass('botaoFiltroImoveisUserSelecionado');

                carregarTabelaPost(0);
            })

            $(document).on('click', '#buttonAguardando', function(e) {
                e.preventDefault();
                $('#aprovado').val(0);
                $('#aguardando').val(1);
                $('#xml').val(0);
                $('#desabilitado').val(0);

                $('#buttonAguardando').addClass('botaoFiltroImoveisUserSelecionado');
                $('#buttonAprovado').removeClass('botaoFiltroImoveisUserSelecionado');
                $('#buttonXml').removeClass('botaoFiltroImoveisUserSelecionado');
                $('#buttonDesabilitado').removeClass('botaoFiltroImoveisUserSelecionado');

                carregarTabelaPost(0);
            })

            
            $(document).on('click', '#buttonXml', function(e) {
                e.preventDefault();
                $('#aprovado').val(0);
                $('#aguardando').val(0);
                $('#xml').val(1);
                $('#desabilitado').val(0);

                $('#buttonXml').addClass('botaoFiltroImoveisUserSelecionado');
                $('#buttonAprovado').removeClass('botaoFiltroImoveisUserSelecionado');
                $('#buttonAguardando').removeClass
                ('botaoFiltroImoveisUserSelecionado');
                $('#buttonDesabilitado').removeClass('botaoFiltroImoveisUserSelecionado');

                carregarTabelaPost(0);
            })

            $(document).on('click', '#buttonDesabilitado', function(e) {
                e.preventDefault();
                $('#aprovado').val(0);
                $('#aguardando').val(0);
                $('#xml').val(0);
                $('#desabilitado').val(1);
                
                $('#buttonXml').removeClass('botaoFiltroImoveisUserSelecionado');
                $('#buttonAprovado').removeClass('botaoFiltroImoveisUserSelecionado');
                $('#buttonAguardando').removeClass
                ('botaoFiltroImoveisUserSelecionado');
                $('#buttonDesabilitado').addClass('botaoFiltroImoveisUserSelecionado');

                carregarTabelaPost(0);
            })

            $(document).on('click', '#paginationLista a', function(e) {
                e.preventDefault();
                
                var pagina = $(this).attr('href').split('page=')[1];

                carregarTabelaPost(pagina);
            })

        </script>

    </div>
@endsection
