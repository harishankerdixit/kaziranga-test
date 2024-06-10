<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title> @yield('title')</title>
    <meta name="title" content="@yield('meta_title')">
    <meta name="description" content="@yield('meta_description')">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link href="{{ asset('front/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('front/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <link rel="canonical" href="@yield('links')" />


    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    {{-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond|Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> --}}

    <meta name="google-site-verification" content="eZE_-4PMk5Fnqjj-Dll1K7Ud_XQdAQ_YduthMZ3gong" />

    <!-- Vendor JS Files -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Vendor CSS Files -->
    <link href="{{ asset('front/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('front/assets/vendor/aos/aos.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('front/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">


    {{-- ====jawai-css-links-start=====  --}}

    <!-- Favicons -->
    <link href="{{ asset('front/assets/img/favicon.png" rel="icon"') }}">
    <link href="{{ asset('front/assets/img/apple-touch-icon.png" rel="apple-touch-icon"') }}">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />
    <!-- icons  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Vendor CSS Files -->
    <link href="{{ asset('front/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"') }}">
    <link href="{{ asset('front/assets/vendor/animate.css/animate.min.css" rel="stylesheet"') }}">
    <link href="{{ asset('front/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"') }}">
    <link href="{{ asset('front/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet"') }}">
    <link href="{{ asset('front/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet"') }}">
    {{-- <link href="{{ asset('front/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet"') }}"> --}}
    <link href="{{ asset('front/assets/vendor/remixicon/remixicon.css" rel="stylesheet"') }}">
    <link href="{{ asset('front/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet"') }}">
    <!-- animation link -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css" rel="stylesheet" ') }}">
    {{-- ====jawai-css-links-end=====  --}}

    <!-- Template Main CSS File -->
    <link href="{{ asset('front/assets/css/style.css') }}" rel="stylesheet">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    {{-- For success and failed message popup --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NMSKQSPC');
    </script>
    <!-- End Google Tag Manager -->

</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NMSKQSPC" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>


    <!-- End Google Tag Manager (noscript) -->
    <!-- whatsapp floating -->
    {{-- <div class="whatsapp-icon">
        <a href="https://wa.me/+917303598684" target="_blank"><img src="{{ asset('/front/assets/img/whatsapp.png') }}"
                alt=""></a>
    </div> --}}

    <!-- ======= Top Bar ======= -->
    @include('front.layouts.topbar')

    <!-- ======= Header ======= -->
    @include('front.layouts.header')
    <!-- End Header -->

    @yield('content')

    <!-- ======= Footer ======= -->
    @include('front.layouts.footer')
    <!-- End Footer -->

    {{-- <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a> --}}


    @if (Str::endsWith(request()->getRequestUri(), '/'))
        @isset($latestNews)
            {{-- <div class="modal" id="latestNews" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <a href="https://kazirangabooking.com/kaziranga-safari-booking">
                            <div class="modal-body">
                                <img src="{{ $latestNews['image'] }}" alt="Book kaziranga safari">
                              <img
                    src="https://girlionsafari.com/storage/uploads/popup/New%20Pop%20Up%20for%20Girlionsafari.in%20Website%20Updated.jpeg" />
            </div>
            </a>
            </div>
            </div>
            </div> --}}

            @push('scripts')
                <script>
                    $(document).ready(function() {
                        $('#latestNews').modal('show');
                    });
                </script>
            @endpush
        @endisset
    @endif

    @include('front.layouts.footerScript')
    @stack('scripts')
    <script>
        $(document).ready(function() {
            $("#mobile_no").keyup(function(event) {
                if ($(this).val().length == 10 && $('#name').val() != '') {
                    var type = $('#type').val() || '';

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "Post",
                        dataType: "json",
                        url: "{{ route('save-enquiry') }}",
                        data: {
                            'type': $('#type').val(),
                            'name': $('#name').val(),
                            'phone': $(this).val(),
                            'date': $('#calendar').val(),
                            'hotel_id': $('#hotel_id').val(),
                            'package_id': $('#package_id').val(),
                        },
                        success: function(data) {}
                    });
                }
            });
        });
    </script>
</body>

</html>
