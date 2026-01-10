<!DOCTYPE html>
<html lang="en">
@php
    $settings = \App\Models\Setting::first();
@endphp

<head>
    <meta charset="utf-8">
    <title>@yield('pageTitle')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta name="description"
        content="Le CNAO est un centre de référence en rééducation et réadaptation fonctionnelle au Sénégal. Depuis 1917, nous prenons en charge les personnes en situation de handicap et favorisons leur insertion sociale et professionnelle.">

    <!-- Mots-clés SEO -->
    <meta name="keywords"
        content="CNAO, Centre National d'Appareillage Orthopédique, rééducation, réadaptation fonctionnelle, handicap, kinésithérapie, appareillage orthopédique, Sénégal, soins spécialisés, EPS niveau 3">

    <!-- Auteur -->
    <meta name="author" content="Centre National d’Appareillage Orthopédique – CNAO">

    <!-- Robots -->
    <meta name="robots" content="index, follow">

    <!-- Open Graph (Facebook, WhatsApp, LinkedIn) -->
    <meta property="og:title" content="CNAO – Rééducation et Réadaptation Fonctionnelle au Sénégal">
    <meta property="og:description"
        content="Le Centre National d'Appareillage Orthopédique (CNAO) offre des soins spécialisés en rééducation et réadaptation pour les personnes en situation de handicap.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://cnao.gouv.sn/">
    <meta property="og:image" content="/assets/img/cnao-facade.png">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="CNAO – Rééducation et Réadaptation Fonctionnelle au Sénégal">
    <meta name="twitter:description"
        content="Découvrez le CNAO, centre de référence en rééducation et réadaptation fonctionnelle au Sénégal, dédié à l'accompagnement des personnes en situation de handicap.">
    <meta name="twitter:image" content="/assets/img/cnao-facade.png">


    <!-- Favicon -->
    <link href="/assets/img/Favicon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="/assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="/assets/lib/twentytwenty/twentytwenty.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/assets/css/style.css" rel="stylesheet">
    <style>
        html {
            scroll-behavior: smooth;
        }

        /* Par défaut : desktop */
        .logo-mobile {
            display: none;
        }

        /* Mobile */
        @media (max-width: 767.98px) {
            .logo-desktop {
                display: none;
            }

            .logo-mobile {
                display: block;
            }
        }
    </style>
    @livewireStyles
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary m-1" role="status">
            <span class="sr-only">Chargement...</span>
        </div>
        <div class="spinner-grow text-dark m-1" role="status">
            <span class="sr-only">Chargement...</span>
        </div>
        <div class="spinner-grow text-secondary m-1" role="status">
            <span class="sr-only">Chargement...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-light ps-5 pe-0 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <small class="py-2"><i class="far fa-clock text-primary me-2"></i>
                        Horaires d'ouverture : Lun - Ven : 8h00 - 17h00, Dimanche fermé
                    </small>
                </div>
            </div>
            <div class="col-md-6 text-center text-lg-end">
                <div class="position-relative d-inline-flex align-items-center bg-primary text-white top-shape px-5">
                    <div class="me-3 pe-3 border-end py-2">
                        <p class="m-0"><i class="fa fa-envelope-open me-2"></i>{{ $settings->email_one }}</p>
                    </div>
                    <div class="py-2">
                        <p class="m-0"><i class="fa fa-phone-alt me-2"></i>{{ $settings->phone_two }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
        <a href="/" class="navbar-brand p-0">
            <img src="{{ asset('storage/' . $settings->logo) }}" alt="CNAO" class="logo-desktop">
            <img src="/assets/img/logo_mobile.png" alt="CNAO" class="logo-mobile">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="{{ url('/') }}" class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">
                    Accueil
                </a>

                <a href="{{ route('about') }}"
                    class="nav-item nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                    À propos
                </a>

                <a href="{{ url('/') }}#services"
                    class="nav-item nav-link {{ request()->is('/') && request()->has('') ? 'active' : '' }}">
                    Services offerts
                </a>

                <a href="{{ route('org') }}"
                    class="nav-item nav-link {{ request()->routeIs('org') ? 'active' : '' }}">
                    Organisation du CNAO
                </a>

                <a href="{{ route('readaptactu') }}" class="nav-item nav-link">
                    READAPT’Actu
                </a>

                <a href="{{ route('articles') }}" class="nav-item nav-link">
                    Actualités
                </a>

                <a href="{{ route('contact') }}"
                    class="nav-item nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                    Contact
                </a>

                {{--   <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
                        <a href="price.html" class="dropdown-item">Pricing Plan</a>
                        <a href="team.html" class="dropdown-item">Our Dentist</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="appointment.html" class="dropdown-item">Appointment</a>
                    </div>
                </div> --}}
            </div>
            <a href="{{ url('/') }}#Rendez-vous" class="btn btn-primary py-2 px-4 ms-3">Rendez-vous</a>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3"
                            placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->


    @yield('content')


    <!-- Newsletter Start -->
    <div class="container-fluid position-relative pt-5 wow fadeInUp" data-wow-delay="0.1s" style="z-index: 1;">
        <div class="container">
            <div class="bg-primary p-5">
                @livewire('newsletter-form')
            </div>
        </div>
    </div>
    <!-- Newsletter End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light pt-5 wow fadeInUp" data-wow-delay="0.3s">
        <div class="container pt-5">
            <div class="row g-5">

                <!-- CNAO -->
                <div class="col-lg-4 col-md-6">
                    <h3 class="text-white mb-4">CNAO</h3>
                    <p class="mb-3">
                        {!! $settings->description !!}
                    </p>
                </div>

                <!-- Liens utiles -->
                <div class="col-lg-2 col-md-6">
                    <h3 class="text-white mb-4">Liens utiles</h3>
                    <div class="d-flex flex-column">
                        <a class="text-light mb-2" href="{{ url('/') }}">
                            <i class="bi bi-chevron-right text-primary me-2"></i>Accueil
                        </a>
                        <a class="text-light mb-2" href="{{ route('about') }}">
                            <i class="bi bi-chevron-right text-primary me-2"></i>À propos
                        </a>
                        <a class="text-light mb-2" href="{{ url('/') }}#services">
                            <i class="bi bi-chevron-right text-primary me-2"></i>Services offerts
                        </a>
                        <a class="text-light" href="{{ route('contact') }}">
                            <i class="bi bi-chevron-right text-primary me-2"></i>Contact
                        </a>
                    </div>
                </div>

                <!-- Organisation -->
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-white mb-4">Institution</h3>
                    <div class="d-flex flex-column">
                        <a class="text-light mb-2" href="{{ route('org') }}">
                            <i class="bi bi-chevron-right text-primary me-2"></i>Organisation du CNAO
                        </a>
                        <a class="text-light mb-2" href="{{ route('readaptactu') }}">
                            <i class="bi bi-chevron-right text-primary me-2"></i>READAPT’Actu
                        </a>
                        <a class="text-light" href="{{ route('articles') }}">
                            <i class="bi bi-chevron-right text-primary me-2"></i>Actualités
                        </a>
                    </div>
                </div>

                <!-- Contact -->
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-white mb-4">Contact</h3>
                    <p class="mb-2">
                        <i class="bi bi-geo-alt text-primary me-2"></i>
                        {{ $settings->address }}
                    </p>
                    <p class="mb-2">
                        <i class="bi bi-envelope-open text-primary me-2"></i>
                        {{ $settings->email_one }}
                    </p>
                    <p class="mb-0">
                        <i class="bi bi-telephone text-primary me-2"></i>
                        {{ $settings->phone_one }}
                    </p>

                    <!-- Réseaux -->
                    <div class="d-flex mt-3">
                        <a class="btn btn-primary btn-square me-2" href="{{ $settings->facebook }}"
                            target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-primary btn-square me-2" href="{{ $settings->twitter }}"
                            target="_blank"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-primary btn-square" href="{{ $settings->linkedin }}" target="_blank"><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="container-fluid text-light py-3" style="background:#051225;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">
                        &copy; {{ date('Y') }}
                        <span class="text-white fw-bold">Centre National d’Appareillage Orthopédique (CNAO)</span>.
                        Tous droits réservés.
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">
                        Développé par <a href="javascript:void(0);" class="text-primary fw-bold">Seck Assane</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/lib/wow/wow.min.js"></script>
    <script src="/assets/lib/easing/easing.min.js"></script>
    <script src="/assets/lib/waypoints/waypoints.min.js"></script>
    <script src="/assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="/assets/lib/tempusdominus/js/moment.min.js"></script>
    <script src="/assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="/assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="/assets/lib/twentytwenty/jquery.event.move.js"></script>
    <script src="/assets/lib/twentytwenty/jquery.twentytwenty.js"></script>

    <!-- Template Javascript -->
    <script src="/assets/js/main.js"></script>
    @livewireScripts
</body>

</html>
