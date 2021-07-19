<!-- Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/vendors/css/vendors.min.css')}}">

@stack('vendor_css')

<!-- APP CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/dashboard/bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/dashboard/bootstrap-extended.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/dashboard/colors.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/dashboard/components.css')}}">

<!-- APP THEME CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/dashboard/dark-layout.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/dashboard/semi-dark-layout.css')}}">

@stack('theme_css')

<!-- APP CORE MENU MENU-TYPES CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/dashboard/vertical-menu.css')}}">

<!-- APP CORE COLORS CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/dashboard/palette-gradient.css')}}">

@stack('page_css')

<!-- CUSTOM CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/dashboard2.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/dashboard/dashboard-style.css')}}">


@stack('custom_css')

<style>

    body::-webkit-scrollbar {
        width: 7px !important;
        overflow: visible !important;

    }
    
    body::-webkit-scrollbar-thumb {
        background: #D6A83E !important;
        border-radius: 7px !important;


    }


    .dataTables_scrollBody {
        overflow: visible !important;
        background: #D6A83E !important;
        border-radius: 7px !important;
        width: 7px !important;
}

    </style>