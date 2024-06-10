{{-- <!-- Include toastr library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<script src="{{ asset('front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('front/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('front/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('front/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('front/assets/js/main.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Owl Carousel JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Template Main JS File -->
<script>
    // toastr.options.positionClass = 'toast-bottom-right';
    $(document).ready(function() {
        $('.alert').delay(5000).slideUp();

        $("#calendar").datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true,
            orientation: "bottom",
        })

        $(".calendar2").datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true,
            orientation: "bottom",
        })
    });

    // Check if success message is present
    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
    @endif

    // Check if error message is present
    @if (Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
    @endif


</script> --}}
<!-- Vendor JS Files -->
<script src="{{ asset('front/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('front/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('front/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('front/assets/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('front/assets/js/main.js') }}"></script>
<!-- animation link  -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
