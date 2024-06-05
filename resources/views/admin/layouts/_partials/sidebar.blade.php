<!--begin::Sidebar-->
<div id="kt_app_sidebar" class="app-sidebar flex-column background-sideBar" data-kt-drawer="true"
    data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle"
    style="">
    @php
        $user = Auth::guard('admin')->user();

    @endphp
    <!-- begin::LOGO -->
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">

        <!-- begin::IMAGEM DA LOGO -->
        <a href="{{ route('admin.dashboard.index') }}">
            <img alt="Logo" src="{{ asset('assets/img/logo/logo-project.png') }}"
                class="h-30px app-sidebar-logo-default" />
        </a>
        <!-- end::IMAGEM DA LOGO -->

        <!--begin::Sidebar toggle-->
        <div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-icon btn-sm h-30px w-30px rotate"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="app-sidebar-minimize">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
            <span class="svg-icon svg-icon-2 rotate-180">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.5"
                        d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
                        fill="currentColor" />
                    <path
                        d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
                        fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Sidebar toggle-->

    </div>
    <!-- end::LOGO -->

    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <!--begin::Menu wrapper-->
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
            data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
            data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px">
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold px-3" id="#kt_app_sidebar_menu"
                data-kt-menu="true" data-kt-menu-expand="false">

                {{-- <!--begin: DASHBOARD -->
                <div class="menu-item">

                    <!--begin:Menu link-->
                    <a class="menu-link color-menu-lateral {{ Request::is(['dashboard/*']) ? 'active' : '' }}" href="{{route('admin.dashboard.index')}}">
                        <span class="menu-icon">
                            <i class="fa-solid fa-chart-simple color-menu-lateral"></i>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                    <!--end:Menu link-->

                </div>
                <!--end: DASHBOARD --> --}}


                <!--begin: DASHBOARD  -->
                <div data-kt-menu-trigger="click"
                    class="menu-item 
                {{ Request::is(['dashboard']) ? 'show' : '' }}
                {{ Request::is(['gamificacao']) ? 'show' : '' }}
                here menu-accordion">

                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="fa-solid fa-chart-simple color-menu-lateral"></i>
                        </span>
                        <span class="menu-title">Dashboard</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->

                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">

                        <!--- *** LISTA DE CONDOMÍNIO *** --->
                        <div class="menu-item">

                            <!--begin:Menu link-->
                            <a class="menu-link {{ Request::is(['dashboard']) ? 'active' : '' }}"
                                href="{{ route('admin.dashboard.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Dashboard</span>
                            </a>
                            <!--end:Menu link-->

                        </div>

                        <!--- *** LISTA DE CONDOMÍNIO *** --->
                        <div class="menu-item">

                            <!--begin:Menu link-->
                            <a class="menu-link {{ Request::is(['gamificacao']) ? 'active' : '' }}"
                                href="{{ route('admin.dashboard.gamificacao') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Gamificação</span>
                            </a>
                            <!--end:Menu link-->

                        </div>

                    </div>
                    <!--end:Menu sub-->
                </div>
                <!-- end: DASHBOARD -->

                <!--begin: IMÓVEIS -->
                <div data-kt-menu-trigger="click"
                    class="menu-item 
                {{ Request::is(['property']) ? 'show' : '' }}
                {{ Request::is(['condominio']) ? 'show' : '' }}
                {{ Request::is(['caracteristicasCondominio']) ? 'show' : '' }}
                {{ Request::is(['register/caracteristicas']) ? 'show' : '' }} 
                {{ Request::is(['register/property']) ? 'show' : '' }}
                {{ Request::is(['admin/proprietarios']) ? 'show' : '' }}
                {{ Request::is(['property/index']) ? 'show' : '' }}
                {{ Request::is(['propertyCustomers']) ? 'show' : '' }}
                
                here menu-accordion">

                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="fa-solid fa-house"></i>
                        </span>
                        <span class="menu-title">Imóveis</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->

                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">

                        <!--- *** LISTA DE IMÓVEIS *** --->
                        <div class="menu-item">

                            <!--begin:Menu link-->
                            <a class="menu-link {{ Request::is(['property']) ? 'active' : '' }}"
                                href="{{ route('admin.property.property') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Lista de Imóveis</span>
                            </a>
                            <!--end:Menu link-->

                        </div>

                        <!--- *** LISTA DE CONDOMÍNIO *** --->
                        <div class="menu-item">

                            <!--begin:Menu link-->
                            <a class="menu-link {{ Request::is(['condominio']) ? 'active' : '' }}"
                                href="{{ route('admin.condominio.condominio') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Lista de Condomínios</span>
                            </a>
                            <!--end:Menu link-->

                        </div>

                        <!--- *** LISTA DE PROPRIETÁRIOS *** --->
                        <div class="menu-item">

                            <!--begin:Menu link-->
                            <a class="menu-link  {{ Request::is(['admin/proprietarios']) ? 'active' : '' }}"
                                href="{{ route('admin.proprietarios.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Lista de Proprietários</span>
                            </a>
                            <!--end:Menu link-->

                        </div>

                        <!--- *** CADASTRAR IMÓVEIS *** --->
                        <div class="menu-item">

                            <!--begin:Menu link-->
                            <a class="menu-link {{ Request::is('property/index') ? 'active' : '' }}"
                                href="{{ route('admin.property.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Cadastrar Imóveis</span>
                            </a>
                            <!--end:Menu link-->

                        </div>

                        <!--- *** PENDENTES DE APROVAÇÃO *** --->
                        <div class="menu-item">

                            <!--begin:Menu link-->
                            <a class="menu-link {{ Request::is(['propertyCustomers']) ? 'active' : '' }}"
                                href="{{ route('admin.property.customers') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Pendentes de Aprovação</span>
                            </a>
                            <!--end:Menu link-->

                        </div>

                        <!--begin:CONFIGURAÇÕES -->
                        <div data-kt-menu-trigger="click"
                            class="menu-item 
                        
                        {{ Request::is(['register/property']) ? 'show' : '' }}
                        {{ Request::is(['caracteristicasCondominio']) ? 'show' : '' }}
                        {{ Request::is(['register/caracteristicas']) ? 'show' : '' }} 
                        here menu-accordion">
                            <!--begin:Menu link-->
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <i class="fa-solid fa-gear"></i>
                                </span>
                                <span class="menu-title">Configurações</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <!--end:Menu link-->
                            <!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-accordion">

                                <!--- *** DIFERENCIAIS CONDOMÍNIO *** --->
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link {{ Request::is(['caracteristicasCondominio']) ? 'active' : '' }}"
                                        href="{{ route('admin.condominio.caracteristica-condominio') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Diferenciais Condomínio</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>

                                <!--- *** DIFERENCIAIS IMÓVEIS *** --->
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link 
                                    {{ Request::is(['register/caracteristicas']) ? 'active' : '' }}"
                                        href="{{ route('admin.register.caracteristicas_imovel.caracteristicas_imovel') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Diferenciais Imóveis</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>

                                <!--- *** TIPO DE IMÓVEIS *** --->
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link {{ Request::is(['register/property']) ? 'active' : '' }}"
                                        href="{{ route('admin.register.property-type.property') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Tipo de Imóveis</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>

                            </div>
                            <!--end:Menu sub-->
                        </div>
                        <!-- end: CONFIGURAÇÕES -->

                    </div>
                    <!--end:Menu sub-->
                </div>
                <!-- end: IMÓVEIS -->


                <!--- *** CONFIGURAÇÕES DO SITE *** --->
                <div class="menu-item">

                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ Request::is(['settings']) ? 'active' : '' }}"
                            href="{{ route('admin.settings.index') }}">
                            <span class="menu-icon">
                                <i class="fa-solid fa-desktop"></i>
                            </span>
                            <span class="menu-title">Configurações do Site</span>
                        </a>
                        <!--end:Menu link-->
                    </div>

                </div>

                <!--begin: USUÁRIOS -->
                <div data-kt-menu-trigger="click"
                    class="menu-item 
                    {{ $user->type != 'master' ? 'd-none' : '' }}
                {{ Request::is(['user/admin']) ? 'show' : '' }}
                {{ Request::is(['user/funcionario_geral']) ? 'show' : '' }} 
                {{ Request::is(['user/usuarioExterno']) ? 'show' : '' }} 
                here menu-accordion">

                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="fa-solid fa-users"></i>
                        </span>
                        <span class="menu-title">Usuários</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->

                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">

                        <!--- *** Admins *** --->
                        <div class="menu-item">

                            <!--begin:Menu link-->
                            <a class="menu-link {{ Request::is(['user/admin']) ? 'active' : '' }}"
                                href="{{ route('admin.user.admin.admin') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Admins</span>
                            </a>
                            <!--end:Menu link-->

                        </div>


                        <!--- *** Usuários Internos *** --->
                        <div class="menu-item">

                            <!--begin:Menu link-->
                            <a class="menu-link {{ Request::is(['user/funcionario_geral']) ? 'active' : '' }}"
                                href="{{ route('admin.user.funcionario.todos.funcionario-geral') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Usuários Internos</span>
                            </a>
                            <!--end:Menu link-->

                        </div>

                        <!--- *** Usuários Externos *** --->
                        <div class="menu-item">

                            <!--begin:Menu link-->
                            <a class="menu-link {{ Request::is(['user/usuarioExterno']) ? 'active' : '' }}"
                                href="{{ route('admin.user.usuario_externo.usuario-externo') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Usuários Externos</span>
                            </a>
                            <!--end:Menu link-->

                        </div>


                    </div>
                    <!--end:Menu sub-->
                </div>
                <!-- end: USUÁRIOS -->

                <!--- *** INTEGRAÇÃO *** --->
                <div class="menu-item">

                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ Request::is(['gerarXML']) ? 'active' : '' }}"
                            href="{{ route('admin.property.gerarXml') }}">
                            <span class="menu-icon">
                                <i class="fa-solid fa-file-arrow-up"></i>
                            </span>
                            <span class="menu-title">Integração</span>
                        </a>
                        <!--end:Menu link-->
                    </div>

                </div>

                <!--begin: BLOG -->
                <div data-kt-menu-trigger="click"
                    class="menu-item 

                {{ Request::is(['categoryPosts']) ? 'show' : '' }}
                {{ Request::is(['posts']) ? 'show' : '' }}
                    
                here menu-accordion">

                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="fa-solid fa-blog"></i>
                        </span>
                        <span class="menu-title">Blog</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->

                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">

                        <!--- *** ADICIONAR CATEGORIA *** --->
                        <div class="menu-item">

                            <!--begin:Menu link-->
                            <a class="menu-link {{ Request::is(['categoryPosts']) ? 'active' : '' }}"
                                href="{{ route('admin.settings.blog.category-post') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Adicionar Categoria</span>
                            </a>
                            <!--end:Menu link-->

                        </div>

                        <!--- *** POSTS *** --->
                        <div class="menu-item">

                            <!--begin:Menu link-->
                            <a class="menu-link {{ Request::is(['posts']) ? 'active' : '' }}"
                                href="{{ route('admin.settings.blog.posts') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Posts</span>
                            </a>
                            <!--end:Menu link-->

                        </div>




                    </div>
                    <!--end:Menu sub-->
                </div>
                <!-- end: BLOG -->

                <!--begin: CONFIGURAÇÕES GERAIS -->
                <div data-kt-menu-trigger="click"
                    class="menu-item 

                {{ Request::is(['register/cities']) ? 'show' : '' }}
                {{ Request::is(['register/tipos-usuarios']) ? 'show' : '' }}
                    
                here menu-accordion">

                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="fa-solid fa-gears"></i>
                        </span>
                        <span class="menu-title">Configurações Gerais</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->

                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">

                        <!--- *** CIDADES *** --->
                        <div class="menu-item">

                            <!--begin:Menu link-->
                            <a class="menu-link {{ Request::is(['register/cities']) ? 'active' : '' }}"
                                href="{{ route('admin.register.city.cities') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Cidades</span>
                            </a>
                            <!--end:Menu link-->

                        </div>

                        <!--- *** CARGOS NO SISTEMA *** --->
                        <div class="menu-item">

                            <!--begin:Menu link-->
                            <a class="menu-link 
                            {{ Request::is(['register/tipos-usuarios']) ? 'active' : '' }}"
                                href="{{ route('admin.register.user-type.tipos-usuarios') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Cargos no Sistema</span>
                            </a>
                            <!--end:Menu link-->

                        </div>




                    </div>
                    <!--end:Menu sub-->
                </div>
                <!-- end: BLOG -->

                <!--begin: SAIR -->
                <div class="menu-item">

                    <!--begin:Menu link-->
                    <a class="menu-link" href="{{ route('admin.dashboard.logout') }}">
                        <span class="menu-icon">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        </span>
                        <span class="menu-title">Sair</span>
                    </a>
                    <!--end:Menu link-->

                </div>
                <!--end: SAIR -->

                {{-- <a href="{{ route('admin.property.index') }}" class="btn btn-dark" style="padding-top: 6px;padding-bottom: 6px;margin-left: 15px;margin-right: 15px;margin-top: 10px;font-size: 12px;">                        
                    <span class="menu-icon">
                        <i class="fa-solid fa-plus"></i>
                    </span>
                    <span class="menu-title">Adicionar um imóvel</span>
                </a>
                 --}}

                <!--begin: TEXTO CONFIGURAÇÕES -->
                {{-- <div class="menu-item pt-5">
                        <!--begin:Menu content-->
                        <div class="menu-content">
                            <span class="menu-heading fw-bold text-uppercase fs-7">Config Gerais</span>
                        </div>
                        <!--end:Menu content-->
                    </div>
                    
                    <!--begin: CONFIGURAÇÕES -->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ Request::is(['settings']) ? 'active' : '' }}" href="{{route('admin.settings.index')}}">
                            <span class="menu-icon">
                                <i class="fa-solid fa-gear"></i>
                            </span>
                            <span class="menu-title">Configurações</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end: CONFIGURAÇÕES-->
            
                    <!--begin: CADASTROS -->
                    <div data-kt-menu-trigger="click" class="menu-item 
                    {{ Request::is(['register/cities']) ? 'show' : '' }}

                    {{ Request::is(['register/tipos-usuarios']) ? 'show' : '' }}
                    here menu-accordion">

                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="fa-solid fa-plus"></i>
                            </span>
                            <span class="menu-title">Cadastros</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->

                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            
                            <!--- *** CIDADES *** --->
                            <div class="menu-item ">
                                <!--begin:Menu link-->
                                <a class="menu-link {{ Request::is(['register/cities']) ? 'active' : '' }}" href="{{route('admin.register.city.cities')}}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Cidades</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            


                            <!--- *** TIPOS DE USUÁRIOS *** --->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link 
                                {{ Request::is(['register/tipos-usuarios']) ? 'active' : '' }}" 
                                href="{{route('admin.register.user-type.tipos-usuarios')}}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Cargos Sistema Admin</span>
                                </a>
                                <!--end:Menu link-->
                            </div>   
                            
                        </div>
                        <!--end:Menu sub-->
                    </div> --}}
                <!-- end: CADASTROS -->

                <!--begin: NIVEIS DE ACESSO -->
                {{-- <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ Request::is(['settings/nivel_acesso']) ? 'active' : '' }}" href="{{route('admin.settings.nivel-acesso')}}">
                            <span class="menu-icon">
                                <i class="fa-solid fa-lock"></i>
                            </span>
                            <span class="menu-title">Níveis de Acesso</span>
                        </a>
                        <!--end:Menu link-->
                    </div> --}}
                <!--end: CONFIGURAÇÕES-->


                <!--END: TEXTO CONFIGURAÇÕES -->

                <!--begin: TEXTO USUÁRIOS -->
                {{-- 
                    <div class="menu-item pt-5">
                        <!--begin:Menu content-->
                        <div class="menu-content">
                            <span class="menu-heading fw-bold text-uppercase fs-7">Config Usuários</span>
                        </div>
                        <!--end:Menu content-->
                    </div>
                
                    <!--begin:FUNCIONARIOS -->
                    <div data-kt-menu-trigger="click" class="menu-item 
                    {{ Request::is(['user/admin']) ? 'show' : '' }}
                    {{ Request::is(['user/funcionario_geral']) ? 'show' : '' }} 
                    here menu-accordion">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="fa-solid fa-user"></i>
                            </span>
                            <span class="menu-title">Funcionários</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">

                            <!--- *** ADMINISTRADORES *** --->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link {{ Request::is(['user/admin']) ? 'active' : '' }}" href="{{route('admin.user.admin.admin')}}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Admins</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            
                            <!--- *** FUNCIONÁRIOS *** --->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link {{ Request::is(['user/funcionario_geral']) ? 'active' : '' }}"" href="{{route('admin.user.funcionario.todos.funcionario-geral')}}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Funcionários</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            
                        </div>
                        <!--end:Menu sub-->
                    </div> --}}
                <!-- end: FUNCIONARIOS -->

                {{-- <!--begin: USUÁRIOS -->
                    <div data-kt-menu-trigger="click" class="menu-item 
                    {{ Request::is(['user/user']) ? 'show' : '' }}
                    {{ Request::is(['corretor/corretor']) ? 'show' : '' }}
                    {{ Request::is(['fotografo/fotografo']) ? 'show' : '' }}
                    {{ Request::is(['avaliador/avaliador_imovel']) ? 'show' : '' }}
                    here menu-accordion">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="fa-solid fa-user"></i>
                            </span>
                            <span class="menu-title">Usuários</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            
                            <!--- *** GERAIS *** --->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link {{ Request::is(['user/user']) ? 'active' : '' }}" href="{{route('admin.user.user.user')}}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Usuário Geral</span>
                                </a>
                                <!--end:Menu link-->
                            </div>

                            <!--- *** CORRETORES *** --->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link {{ Request::is(['corretor/corretor']) ? 'active' : '' }}" href="{{route('admin.user.corretor.corretor')}}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Corretores</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            
                            <!--- *** FOTÓGRAFOS *** --->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link {{ Request::is(['fotografo/fotografo']) ? 'active' : '' }}" href="{{route('admin.user.fotografo.fotografo')}}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Fotógrafos</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            
                            <!--- *** AVALIADORES DE IMÓVEL *** --->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link {{ Request::is(['avaliador/avaliador_imovel']) ? 'active' : '' }}" href="{{route('admin.user.avaliador_imovel.avaliador-imovel')}}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Avaliadores de Imóvel</span>
                                </a>
                                <!--end:Menu link-->
                            </div>

                            

                            
                        </div>
                        <!--end:Menu sub-->
                    </div>
                    <!-- end: USUÁRIOS -->

                    <!--begin: SOLICITAÇÕES USUÁRIOS -->
                    <div data-kt-menu-trigger="click" class="menu-item 
                    {{ Request::is(['solicitacao-avaliadores']) ? 'show' : '' }}
                    {{ Request::is(['solicitacao-fotografos']) ? 'show' : '' }}
                    {{ Request::is(['solicitacao-corretores']) ? 'show' : '' }}
                    here menu-accordion">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="fa-solid fa-user-clock"></i>
                            </span>
                            <span class="menu-title">Solicitações Usuários</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            
                            <!--- *** SOLICITAÇAO CORRETORES *** --->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link {{ Request::is(['solicitacao-corretores']) ? 'active' : '' }}" href="{{route('admin.solicitacoes.corretores.solicitacoes-corretores')}}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Solicitação Corretores</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            
                            <!--- *** FOTÓGRAFOS *** --->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link {{ Request::is(['solicitacao-fotografos']) ? 'active' : '' }}" href="{{route('admin.solicitacoes.fotografos.solicitacoes-fotografos')}}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Solicitação Fotógrafos</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            
                            <!--- *** AVALIADORES DE IMÓVEL *** --->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link {{ Request::is(['solicitacao-avaliadores']) ? 'active' : '' }}" href="{{route('admin.solicitacoes.avaliadores.solicitacoes-avaliadores')}}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Solicitação Avaliadores</span>
                                </a>
                                <!--end:Menu link-->
                            </div>                   
                            
                        </div>
                        <!--end:Menu sub-->
                    </div>
                    <!-- end: USUÁRIOS --> --}}

                <!--END: TEXTO USUÁRIOS -->

                <!--begin: TEXTO IMOVEIS -->

                {{-- <div class="menu-item pt-5">
                        <!--begin:Menu content-->
                        <div class="menu-content">
                            <span class="menu-heading fw-bold text-uppercase fs-7">Config Imóveis</span>
                        </div>
                        <!--end:Menu content-->
                    </div>

                    <!--begin: CONDOMINIO -->
                    <div data-kt-menu-trigger="click" class="menu-item
                    {{ Request::is(['condominio']) ? 'show' : '' }}
                    {{ Request::is(['caracteristicasCondominio']) ? 'show' : '' }}
                    {{ Request::is(['condominio/add_condominio']) ? 'show' : '' }}
                    here menu-accordion">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="fa-solid fa-house-lock"></i>
                            </span>
                            <span class="menu-title">Condomínio</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            
                            <!--- *** CONDOMINIOS *** --->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link {{ Request::is(['condominio']) ? 'active' : '' }}" href="{{route('admin.condominio.condominio')}}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Condomínios</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                                       
                            <!--- *** CONDOMINIOS *** --->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link {{ Request::is(['caracteristicasCondominio']) ? 'active' : '' }}" href="{{route('admin.condominio.caracteristica-condominio')}}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Características Condomínio</span>
                                </a>
                                <!--end:Menu link-->
                            </div>

                            
                        </div>
                        <!--end:Menu sub-->
                    </div>
                    <!-- end: CONDOMÍNIO -->

                    <!--begin: CONFIGS IMÓVEIS -->
                    <div data-kt-menu-trigger="click" class="menu-item
                    {{ Request::is(['register/property']) ? 'show' : '' }}
                    {{ Request::is(['register/caracteristicas']) ? 'show' : '' }}
                    here menu-accordion">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="fa-solid fa-house-lock"></i>
                            </span>
                            <span class="menu-title">Config Imóveis</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            
                            <!--- *** TIPOS DE IMÓVEIS *** --->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link {{ Request::is(['register/property']) ? 'active' : '' }}" href="{{route('admin.register.property-type.property')}}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Tipos de Imóveis</span>
                                </a>
                                <!--end:Menu link-->
                            </div>                  

                            <!--- *** CARACTERÍSTICAS DO IMÓVEL *** --->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link 
                                {{ Request::is(['register/caracteristicas']) ? 'active' : '' }}" 
                                href="{{route('admin.register.caracteristicas_imovel.caracteristicas_imovel')}}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Características do Imóvel</span>
                                </a>
                                <!--end:Menu link-->
                            </div>       

                            
                        </div>
                        <!--end:Menu sub-->
                    </div>
                    <!-- end: CONDOMÍNIO -->

                    <!--begin: IMÓVEIS -->
                    <div data-kt-menu-trigger="click" class="menu-item
                    {{ Request::is(['property']) ? 'show' : '' }}
                    {{ Request::is(['propertyAdmin']) ? 'show' : '' }}
                    {{ Request::is(['propertyCustomers']) ? 'show' : '' }}
                    {{ Request::is(['gerarXML']) ? 'show' : '' }}
                    here menu-accordion">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="fa-solid fa-house"></i>
                            </span>
                            <span class="menu-title">Imóveis Cadastrados</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">

                            <!--- *** IMÓVEIS CADASTRADOS *** --->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link {{ Request::is(['property']) ? 'active' : '' }}" href="{{route('admin.property.property')}}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Todos Imóveis</span>
                                </a>
                                <!--end:Menu link-->
                            </div>

                            <!--- *** IMÓVEIS CADASTRADOS CLIENTES*** --->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link {{ Request::is(['propertyAdmin']) ? 'active' : '' }}" href="{{route('admin.property.propertyAdmin')}}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Imóveis Administrador</span>
                                </a>
                                <!--end:Menu link-->
                            </div>


                            <!--- *** IMÓVEIS CADASTRADOS CLIENTES*** --->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link {{ Request::is(['propertyCustomers']) ? 'active' : '' }}" href="{{route('admin.property.customers')}}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Imóveis Dos Usuários</span>
                                </a>
                                <!--end:Menu link-->
                            </div>

                             <!--- *** GERAR XML IMÓVEIS *** --->
                             <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link {{ Request::is(['gerarXML']) ? 'active' : '' }}" href="{{route('admin.property.gerarXml')}}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Gerar XML Imóveis</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                                            
                            
                        </div>
                        <!--end:Menu sub-->
                    </div>
                    <!-- end: IMÓVEIS --> --}}

                <!--END: TEXTO IMÓVEIS -->

                <!--begin: TEXTO BLOG -->

                {{-- <div class="menu-item pt-5">
                    <!--begin:Menu content-->
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Blog</span>
                    </div>
                    <!--end:Menu content-->
                </div> --}}

                {{-- <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ Request::is(['categoryPosts']) ? 'active' : '' }}" href="{{route('admin.settings.blog.category-post')}}">
                        <span class="menu-icon">
                            <i class="fa-solid fa-plus"></i>
                        </span>
                        <span class="menu-title">Add Categoria Post</span>
                    </a>
                    <!--end:Menu link-->
                </div> --}}

                <!--begin: CONFIGURAÇÕES -->

                {{-- <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ Request::is(['posts']) ? 'active' : '' }}" href="{{route('admin.settings.blog.posts')}}">
                        <span class="menu-icon">
                            <i class="fa-solid fa-blog"></i>
                        </span>
                        <span class="menu-title">Posts</span>
                    </a>
                    <!--end:Menu link-->
                </div> --}}

                <!--end: CONFIGURAÇÕES-->


            </div>
            <!--end::Menu-->
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::sidebar menu-->
</div>
<!--end::Sidebar-->
