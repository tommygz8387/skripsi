<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('partials.header')

<body>
    <div class="loader-wrapper">
        <span class="loader"><span class="loader-inner"></span></span>
    </div>
    @include('sweetalert::alert')
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('partials.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            @include('partials.settings-panel')
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            @include('partials.sidebar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('partials.script')
</body>

</html>
