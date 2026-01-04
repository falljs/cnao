@extends('layout')
@section('pageTitle',
    isset($pageTitle)
    ? $pageTitle
    : 'Organisation - Centre National d’Appareillage Orthopédique
    (CNAO)')
@section('content')
    @php
        $about = \App\Models\Page::first();
    @endphp


    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 hero-header mb-5">
        <div class="row py-3">
            <div class="col-12 text-center">
                <h1 class="display-3 text-white animated zoomIn">Présentation et Organisation du CNAO</h1>
                <a href="/" class="h4 text-white">Accueil</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="" class="h4 text-white">Présentation et Organisation du CNAO</a>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- About Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-12">
                    <div class="content-html mb-4">
                        {!! $about->organisation !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <style>
        /* Images issues de Filament (textarea + attachments) */
        .content-html img {
            max-width: 100% !important;
            height: auto !important;
        }

        /* Si Filament ajoute width/height inline */
        .content-html img[style] {
            max-width: 100% !important;
            height: auto !important;
        }

        /* Vidéos / iframes ajoutées via l’éditeur */
        .content-html video,
        .content-html iframe {
            max-width: 100%;
            height: auto;
            display: block;
        }
    </style>
@endsection
