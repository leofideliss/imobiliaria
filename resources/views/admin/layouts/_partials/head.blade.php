<head>
    <base href="" />
    <title>{{ env('PROJECT_NAME') }}</title>

    <meta charset="utf-8" />
    <meta name="description" content="{{ env('PROJECT_SUBTITLE') ?? '' }}" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ env('PROJECT_SUBTITLE') ?? '' }}" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="{{ env('PROJECT_NAME') }}" />

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="canonical" href="" />
    <link rel="shortcut icon" href="assets/img/suaempresa/icone_empresa.svg" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" media="screen" href="{{asset('assets/css/atualizacoes-admin.css')}}">
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/edicao.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

    {{-- @include("user.layout._partials.keen.head-keen") --}}

</head>
