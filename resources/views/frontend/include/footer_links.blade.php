<div class="clearfix"></div>
<script>
    document.addEventListener('contextmenu', event => event.preventDefault());
</script>
<!-- Scripts==================================================-->
<script type="text/javascript" src="{{ asset('frontend_assets/assets/plugins/js/viewportchecker.js')}}"></script>
<script type="text/javascript" src="{{ asset('frontend_assets/assets/plugins/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('frontend_assets/assets/plugins/js/bootsnav.js')}}"></script>
<script type="text/javascript" src="{{ asset('frontend_assets/assets/plugins/js/select2.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('frontend_assets/assets/plugins/js/wysihtml5-0.3.0.js')}}"></script>
<script type="text/javascript" src="{{ asset('frontend_assets/assets/plugins/js/bootstrap-wysihtml5.js')}}"></script>
<script type="text/javascript" src="{{ asset('frontend_assets/assets/plugins/js/datedropper.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('frontend_assets/assets/plugins/js/dropzone.js')}}"></script>
<script type="text/javascript" src="{{ asset('frontend_assets/assets/plugins/js/loader.js')}}"></script>
<script type="text/javascript" src="{{ asset('frontend_assets/assets/plugins/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('frontend_assets/assets/plugins/js/slick.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('frontend_assets/assets/plugins/js/gmap3.min.js')}} "></script>
<script type="text/javascript"
    src=" {{ asset('frontend_assets/assets/plugins/js/jquery.easy-autocomplete.min.js')}} "></script>
<script src="{{ asset('frontend_assets/assets/js/custom.js')}}"></script>
<script src="{{ asset('frontend_assets/assets/js/jQuery.style.switcher.js')}}"></script>
<script type="text/javascript">$(document).ready(function () {
        $('#styleOptions').styleSwitcher();
    });</script>
<script src="{{ asset('frontend_assets/assets/js/sweetalert2@11.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

@yield('script')
<script>function openRightMenu() {
        document.getElementById("rightMenu").style.display = "block";
    }
    function closeRightMenu() {
        document.getElementById("rightMenu").style.display = "none";
    }</script>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

@if (Session::has('message'))
<script>
    var type = "{{ Session::get('alert-type', 'info') }}"
    switch (type) {
        case 'info':
            toastr.options.timeOut = 10000;
            toastr.info("{{ Session::get('message') }}");
            var audio = new Audio('audio.mp3');
            audio.play();
            break;
        case 'success':
            toastr.options.timeOut = 10000;
            toastr.success("{{ Session::get('message') }}");
            var audio = new Audio('audio.mp3');
            audio.play();
            break;
        case 'warning':

            toastr.options.timeOut = 10000;
            toastr.warning("{{ Session::get('message') }}");
            var audio = new Audio('audio.mp3');
            audio.play();

            break;
        case 'error':

            toastr.options.timeOut = 10000;
            toastr.error("{{ Session::get('message') }}");
            var audio = new Audio('audio.mp3');
            audio.play();

            break;
    }
</script>
@endif
</body>
<!-- index-236:28-->

</html>
