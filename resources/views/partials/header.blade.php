<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('/') }}vendors/feather/feather.css">
    <link rel="stylesheet" href="{{ asset('/') }}vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('/') }}vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('/') }}vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('/') }}css/vertical-layout-light/style.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/loader.css">
    <link rel="stylesheet" href="{{ asset('/') }}vendor/chosen/chosen.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('/') }}images/favicon.png" />
    @yield('cus-css')
</head>
