<!-- BEGIN: Vendor JS-->
<script src="https://kit.fontawesome.com/d6f2727f64.js" crossorigin="anonymous"></script>
<script src="{{ asset('template/app-assets/vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
{{-- <script src="{{ asset('template/app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
<script src="{{ asset('template/app-assets/vendors/js/extensions/tether.min.js') }}"></script>
<script src="{{ asset('template/app-assets/vendors/js/extensions/shepherd.min.js') }}"></script> --}}
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('template/app-assets/js/core/app-menu.js') }}"></script>
<script src="{{ asset('template/app-assets/js/core/app.js') }}"></script>
<script src="{{ asset('template/app-assets/js/scripts/components.js') }}"></script>
<script src="{{ asset('js/apexcharts.js') }}"></script>
<script src="{{ asset('template/app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
<script src="{{ asset('template/app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('template/app-assets/js/scripts/pages/app-chat.js') }}"></script>

<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
{{-- <script src="{{ asset('template/app-assets/js/scripts/pages/dashboard-analytics.js') }}"></script> --}}
<!-- END: Page JS-->






<!-- BEGIN: Custom JS-->
@stack('custom_js')

{{-- notificaciones push --}}
<script>
    @if(Session::has('message'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.success("{{ session('message') }}");
    @endif

    @if(Session::has('error'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.error("{{ session('error') }}");
    @endif

    @if(Session::has('info'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.info("{{ session('info') }}");
    @endif

    @if(Session::has('warning'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.warning("{{ session('warning') }}");
    @endif

</script>
<!-- END: Custom JS-->