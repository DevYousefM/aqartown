@yield('styles')



@yield('content')



<script src="{{ asset(access_public() . 'assets/admin/js/vendors/jquery-1.12.4.min.js') }}"></script>

<script src="{{ asset(access_public() . 'assets/admin/js/jqueryui.min.js') }}"></script>

<script src="{{ asset(access_public() . 'assets/admin/js/vendors/vue.js') }}"></script>

<script src="{{ asset(access_public() . 'assets/admin/js/bootstrap-colorpicker.min.js') }}"></script>

<script src="{{ asset(access_public() . 'assets/admin/js/plugin.js') }}"></script>

<script src="{{ asset(access_public() . 'assets/admin/js/tag-it.js') }}"></script>

<script src="{{ asset(access_public() . 'assets/admin/js/load.js') }}"></script>
<script src="https://cdn.ckeditor.com/4.15.0/full/ckeditor.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.ckeditor').ckeditor();

    });
</script>
<script>
    jQuery.noConflict();
</script>
@yield('scripts')
