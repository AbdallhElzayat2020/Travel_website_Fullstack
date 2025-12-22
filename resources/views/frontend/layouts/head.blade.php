<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/style.css') }}">
    <!-- GoogleFonts -->
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Iconify -->
    <script src="https://code.iconify.design/3/3.1.1/iconify.min.js"></script>
    <!-- Font Awesome 4.7.0 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- Masonry -->
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <!-- Fancybox -->
    <link href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <!-- NoUiSlider -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.8.1/nouislider.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Moment.js -->
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <!-- Daterangepicker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    @php
        $currentUrl = url()->current();
    @endphp

    <title>@hasSection('meta_title')@yield('meta_title')@else Travel Website @endif</title>

    <!-- Primary Meta Tags -->
    <meta name="title" content="@hasSection('meta_title')@yield('meta_title')@else Travel Website @endif">
    <meta name="description"
        content="@hasSection('meta_description')@yield('meta_description')@else Discover amazing travel destinations and book your next adventure with us. @endif">
    @hasSection('meta_author')
        <meta name="author" content="@yield('meta_author')">
    @endif
    @hasSection('meta_keywords')
        <meta name="keywords" content="@yield('meta_keywords')">
    @endif
    <meta name="robots" content="index, follow">
    <meta name="language" content="English">
    <link rel="canonical" href="{{ $currentUrl }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $currentUrl }}">
    <meta property="og:title" content="@hasSection('meta_title')@yield('meta_title')@else Travel Website @endif">
    <meta property="og:description"
        content="@hasSection('meta_description')@yield('meta_description')@else Discover amazing travel destinations and book your next adventure with us. @endif">
    <meta property="og:image"
        content="@hasSection('meta_image')@yield('meta_image')@else {{ asset('assets/frontend/assets/images/hero-banner.png') }} @endif">
    <meta property="og:site_name" content="{{ config('app.name', 'Travel Website') }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ $currentUrl }}">
    <meta name="twitter:title" content="@hasSection('meta_title')@yield('meta_title')@else Travel Website @endif">
    <meta name="twitter:description"
        content="@hasSection('meta_description')@yield('meta_description')@else Discover amazing travel destinations and book your next adventure with us. @endif">
    <meta name="twitter:image"
        content="@hasSection('meta_image')@yield('meta_image')@else {{ asset('assets/frontend/assets/images/hero-banner.png') }} @endif">
    <style>
        #announcement-bar {
            position: relative;
            z-index: 50;
        }

        .announcement-scroll {
            display: inline-block;
            animation: scroll-horizontal 30s linear infinite;
        }

        @keyframes scroll-horizontal {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        .announcement-scroll:hover {
            animation-play-state: paused;
        }

        /* Accommodation row hover styles */
        .accommodation-row:hover {
            background-color: #00AF87 !important;
        }

        .accommodation-row:hover .accommodation-name,
        .accommodation-row:hover .accommodation-price,
        .accommodation-row:hover .accommodation-desc {
            color: white !important;
        }

        .accommodation-row.bg-green-zomp .accommodation-name,
        .accommodation-row.bg-green-zomp .accommodation-price,
        .accommodation-row.bg-green-zomp .accommodation-desc {
            color: white !important;
        }
    </style>
    @stack('css')
</head>
