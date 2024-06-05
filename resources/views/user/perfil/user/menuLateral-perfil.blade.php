<aside class="col-lg-3 col-md-5 pe-xl-3 mb-5">
    <input type="hidden" name="csrf_token" value="{{ csrf_token() }}" />

    <!-- Account nav-->
    <div class="card card-body border-0 shadow-sm pb-1 me-lg-1">
        <div class="d-flex d-md-block d-lg-flex align-items-start pt-lg-2 mb-4">
            <div class="pt-md-2 pt-lg-0 ps-3 ps-md-0 ps-lg-3" style="overflow: hidden;text-overflow: ellipsis;">
                <h2 class="fs-lg mb-0">{{$customer->name ?? ''}}</h2>
                <ul class="list-unstyled fs-sm mt-3 mb-0">
                    <li><i class="fi-phone opacity-60 me-2"></i>{{$customer->phone ?? ''}}</li>
                    <li><i class="fi-mail opacity-60 me-2"></i>{{$customer->email ?? ''}}</li>

                    {{-- <i class="fi-mail opacity-60 me-2"></i> --}}
                </ul>
            </div>
        </div>
        {{-- <div style="display: flex; flex-direction: column;justify-content:space-between">
            <a class="btn btn-primary btn-lg mb-3" href="{{route('user.perfil.add-propriedade')}}" style="font-size: 13px !important">
                Adicionar Imóvel
            </a>
            <a class="btn btn-primary btn-lg mb-3" href="{{route('user.perfil.user.lista-xml')}}" style="font-size: 13px !important">
                Adicionar Imóvel via XML
            </a>
        </div> --}}

        <a class="btn btn-outline-secondary d-block d-md-none w-100 mb-3" href="#account-nav" data-bs-toggle="collapse"><i class="fi-align-justify me-2"></i>Menu</a>
        <div class="collapse d-md-block mt-3" id="account-nav">
            <div class="card-nav">
                <a class="card-nav-link {{ Request::is(['add-propriedade']) ? 'active' : '' }}" href="{{route('user.perfil.add-propriedade')}}">
                    <i class="fi-plus opacity-60 me-2"></i>Adicionar Imóvel
                </a>
                <a class="card-nav-link {{ Request::is(['lista-xmls']) ? 'active' : '' }}" href="{{route('user.perfil.user.lista-xml')}}">
                    <i class="fa-solid fa-file-import opacity-60 me-2"></i>Importar Imóveis
                </a>
                <a class="card-nav-link {{ Request::is(['meus-imoveis']) ? 'active' : '' }}" href="{{route('user.perfil.user.imoveis-user')}}">
                    <i class="fi-home opacity-60 me-2"></i>Meus Imóveis
                </a>
                <a class="card-nav-link {{ Request::is(['perfil-user']) ? 'active' : '' }}" href="{{route('user.perfil.user.user')}}">
                    <i class="fi-user opacity-60 me-2"></i>Meus Dados
                </a>

                {{-- <a class="card-nav-link {{ Request::is(['funcoes-user']) ? 'active' : '' }}" href="{{route('user.perfil.user.funcoes-user')}}">
                    <i class="fi-lock opacity-60 me-2"></i>Suas Funções
                </a> --}}
                
                {{-- <a class="card-nav-link {{ Request::is(['minha-senha']) ? 'active' : '' }}" href="{{route('user.perfil.user.senha-user')}}">
                    <i class="fi-lock opacity-60 me-2"></i>Minha Senha
                </a> --}}



                {{-- <a class="card-nav-link {{ Request::is(['imoveis-indicados']) ? 'active' : '' }}" href="{{route('user.perfil.user.imoveis-indicados')}}">
                    <i class="fi-heart opacity-60 me-2"></i>Imóveis Indicados
                </a> --}}

                {{-- <a class="card-nav-link" href="">
                    <i class="fi-star opacity-60 me-2"></i>Meus Ganhos
                </a>
                <a class="card-nav-link" href="">
                    <i class="fi-bell opacity-60 me-2"></i>Favoritos
                </a> --}}

                <a class="card-nav-link" href="{{route('user.contact.duvidas-frequentes')}}">
                    <i class="fi-help opacity-60 me-2"></i>Ajuda
                </a>

                <a class="card-nav-link" href="{{route('user.perfil.logoutCustomer')}}">
                    <i class="fi-logout opacity-60 me-2"></i>Sair
                </a>
            </div>
        </div>
    </div>

</aside>