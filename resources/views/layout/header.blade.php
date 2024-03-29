<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>GamalaGhar</title>
    <meta name="keywords"
        content="apparel, catalog, clean, ecommerce, ecommerce HTML, electronics, fashion, html eCommerce, html store, minimal, multipurpose, multipurpose ecommerce, online store, responsive ecommerce template, shops" />
    <meta name="description" content="Best ecommerce html template for single and multi vendor store.">
    <meta name="author" content="ashishmaraviya">
    <!-- site Favicon -->
    <link rel="icon" href="{{ url('assets/img/favicon-11.png') }}" sizes="32x32" />
    <link rel="apple-touch-icon" href="{{ url('assets/img/favicon-11.png') }}" />
    <meta name="msapplication-TileImage" content="{{ url('assets/img/favicon-11.png') }}" />

    <!-- css Icon Font -->
    <link rel="stylesheet" href="{{ url('assets/css/ecicons.min.css') }}" />

    <!-- css All Plugins Files -->
    <link rel="stylesheet" href="{{ url('assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/css/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/css/jquery-ui.min.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/css/countdownTimer.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/css/nouislider.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/css/slick.min.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/css/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.css') }}" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Main Style -->
    <link rel="stylesheet" href="{{ url('assets/css/demo11.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/css/responsive.css') }}" />

    <!-- Background css -->
    <link rel="stylesheet" id="bg-switcher-css" href="{{ url('assets/css/bg-4.css') }}">

    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />


    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    @livewireStyles()

</head>

<body>
    @include('home.mycart')
