<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Keen - Multi-demo Bootstrap 5 HTML Admin Dashboard Theme
Purchase: https://themes.getbootstrap.com/product/keen-the-ultimate-bootstrap-admin-theme/
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="{{ config('app.lang', 'en') }}">
<!--begin::Head-->
@include('admin.layouts._partials.head')
<!--end::Head-->

<!--begin::Body-->

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true"
    data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true"
    data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true"
    class="app-default">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-theme-mode");
            } else {
                if (localStorage.getItem("data-theme") !== null) {
                    themeMode = localStorage.getItem("data-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <!--begin::Header-->
            <div id="kt_app_header" class="app-header">
                <!--begin::Header container-->
                <div class="app-container container-fluid d-flex align-items-stretch justify-content-between"
                    id="kt_app_header_container">
                    <!--begin::sidebar mobile toggle-->
                    <div class="d-flex align-items-center d-lg-none ms-n2 me-2" title="Show sidebar menu">
                        <div class="btn btn-icon btn-active-color-primary w-35px h-35px"
                            id="kt_app_sidebar_mobile_toggle">
                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                        fill="currentColor" />
                                    <path opacity="0.3"
                                        d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                    </div>
                    <!--end::sidebar mobile toggle-->
                    <!--begin::Mobile logo-->
                    {{-- <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                        <a href="../../demo1/dist/index.html" class="d-lg-none">
                            <img alt="Logo" src="{{asset("assets/media/logos/default-small.svg")}}" class="theme-light-show h-30px" />
                            <img alt="Logo" src="{{asset("assets/media/logos/default-small-dark.svg")}}" class="theme-dark-show h-30px" />
                        </a>
                    </div> --}}
                    <!--end::Mobile logo-->
                    @include('admin.layouts._partials.header')
                </div>
                <!--end::Header container-->
            </div>
            <!--end::Header-->

            <!--begin::Wrapper-->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                @include('admin.layouts._partials.sidebar')
                <!--begin::Main-->
                @yield('content')
                <!--end:::Main-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::App-->

    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
        <span class="svg-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                    transform="rotate(90 13 6)" fill="currentColor" />
                <path
                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                    fill="currentColor" />
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Scrolltop-->

    <!--begin::Modals-->
    <!--end::Modals-->

    <!--begin::Javascript-->

    @include('admin.layouts._partials.javascript')

    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/adicional.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->

    <!--begin::Vendors Javascript-->
    <script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>


    <!--begin::Custom Javascript-->
    @if (Request::is(['admin']))
        <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
    @endif
    <script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
    <!--end::Custom Javascript-->


    <script src="{{ asset('assets/js/globalfunctions.js') }}"></script>
    <script src="{{ asset('assets/js/admin/user/admin/add-admin.js') }}"></script>
    <script src="{{ asset('assets/js/admin/user/externos/table.js') }}"></script>
    <script src="{{ asset('assets/js/admin/user/employee/add-employee.js') }}"></script>
    <script src="{{ asset('assets/js/admin/user/admin/table.js') }}"></script>
    <script src="{{ asset('assets/js/admin/user/employee/table.js') }}"></script>
    <script src="{{ asset('assets/js/admin/register/city/add-city.js') }}"></script>
    <script src="{{ asset('assets/js/admin/register/city/table.js') }}"></script>
    <script src="{{ asset('assets/js/admin/register/type-property/add-type-property.js') }}"></script>
    <script src="{{ asset('assets/js/admin/register/type-property/table.js') }}"></script>
    <script src="{{ asset('assets/js/admin/register/condominio/add-condominio.js') }}"></script>
    <script src="{{ asset('assets/js/admin/register/condominio/add-condominio_modal.js') }}"></script>
    <script src="{{ asset('assets/js/admin/register/condominio/edit-condominio.js') }}"></script>
    <script src="{{ asset('assets/js/admin/register/condominio/table.js') }}"></script>
    <script src="{{ asset('assets/js/admin/register/caracteristicas_imovel/add-caracteristicas_imovel.js') }}"></script>
    <script src="{{ asset('assets/js/admin/register/caracteristicas_imovel/table.js') }}"></script>
    <script
        src="{{ asset('assets/js/admin/register/caracteristicas_imovel_condominio/add-caracteristicas_imovel_condominio.js') }}">
    </script>
    <script src="{{ asset('assets/js/admin/register/caracteristicas_imovel_condominio/table.js') }}"></script>
    <script src="{{ asset('assets/js/admin/property/add-property.js') }}"></script>
    <script src="{{ asset('assets/js/admin/property/edit-property.js') }}"></script>
    <script src="{{ asset('assets/js/admin/property/table.js') }}"></script>
    <script src="{{ asset('assets/js/admin/property/tableGameficacao.js') }}"></script>

    <script src="{{ asset('assets/js/admin/property/tableXML.js') }}"></script>
    <script src="{{ asset('assets/js/admin/property/tableCustomers.js') }}"></script>
    <script src="{{ asset('assets/js/admin/property/tableAdmin.js') }}"></script>
    <script src="{{ asset('assets/js/admin/register/user-type/add-user-type.js') }}"></script>
    <script src="{{ asset('assets/js/admin/register/user-type/table.js') }}"></script>
    <script src="{{ asset('assets/js/admin/settings/blog/add-post.js') }}"></script>
    <script src="{{ asset('assets/js/admin/settings/blog/table.js') }}"></script>
    <script src="{{ asset('assets/js/admin/settings/blog/add-category-post.js') }}"></script>
    <script src="{{ asset('assets/js/admin/settings/blog/table-category.js') }}"></script>

    <script src="{{ asset('assets/js/admin/proprietarios/modal.js') }}"></script>
    <script src="{{ asset('assets/js/admin/proprietarios/modal_propriedade.js') }}"></script>
    <script src="{{ asset('assets/js/admin/proprietarios/index.js') }}"></script>

    {{-- SETTINGS --}}
    <script src="{{ asset('assets/js/admin/settings/commision.js') }}"></script>
    <script src="{{ asset('assets/js/admin/settings/videos.js') }}"></script>
    <script src="{{ asset('assets/js/admin/settings/marca_agua.js') }}"></script>
    <script src="{{ asset('assets/js/admin/settings/general.js') }}"></script>
    <script src="{{ asset('assets/js/admin/settings/social-midia.js') }}"></script>

    <!--ADICIONAR USUÁRIO-->
    <script src="{{ asset('assets/js/custom/apps/support-center/general.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/support-center/tickets/create.js') }}"></script>
    <!--end::Javascript-->

    {{-- DASHBOARD --}}
    <script src="{{ asset('assets/js/admin/dashboard/index.js') }}"></script>

    {{-- SORTABLE --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

    {{-- @include("user.layout._partials.keen.js-keen") --}}


    <script src="https://www.gstatic.com/charts/loader.js"></script>

</body>
<!--end::Body-->

</html>
