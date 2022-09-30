<!-- plugins:js -->
<script src="{{ asset('/') }}vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset('/') }}js/off-canvas.js"></script>
<script src="{{ asset('/') }}js/hoverable-collapse.js"></script>
<script src="{{ asset('/') }}js/template.js"></script>
<script src="{{ asset('/') }}js/settings.js"></script>
<!-- End custom js for this page-->
<script src="{{ asset('/') }}js/dashboard.js"></script>
<!-- inject:js -->
@yield('cus-script')
<!-- endinject -->
<script>
    $(window).on("load",function(){
        $(".loader-wrapper").fadeOut("slow");
    });
</script>