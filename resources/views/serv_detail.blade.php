@extends('layout')

@section('pageTitle', $pageTitle ?? 'Détails du service - CNAO')

@section('content')

    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 hero-header mb-5">
        <div class="row py-3">
            <div class="col-12 text-center">
                <h1 class="display-4 text-white animated zoomIn">
                    {{ $service->title }}
                </h1>
                <a href="{{ url('/') }}" class="h5 text-white">Accueil</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="{{ route('services.show', $service) }}" class="h5 text-white">
                    Service
                </a>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!-- Service Details Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5 align-items-center">

                <!-- Content -->
                <div class="col-lg-7">
                    <div class="section-title mb-4">
                        <h5 class="position-relative d-inline-block text-primary text-uppercase">
                            Service CNAO
                        </h5>
                        <h1 class="display-5 mb-0">
                            {{ $service->title }}
                        </h1>
                    </div>

                    @if ($service->department)
                        <h4 class="text-body fst-italic mb-4">
                            {{ $service->department }}
                        </h4>
                    @endif

                    <div class="mb-4">
                        {!! $service->description !!}
                    </div>


                </div>

                <!-- Image -->
                <div class="col-lg-5 h-100 d-none d-md-block" style="min-height: 450px;">
                    <div class="position-relative h-100 overflow-hidden">
                        <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}"
                            class="w-100 h-100 rounded" style="object-fit: cover;">
                    </div>
                </div>

                {{-- Vérifie si le slug est salle-de-sport --}}
                @if ($service->slug === 'salle-de-sport')
                    <div class="my-5">
                        <h2 class="mb-4 text-center">Découvrez notre Salle de Sport</h2>
                        <div class="ratio ratio-16x9">
                            <video controls autoplay muted loop class="w-100">
                                <source src="{{ asset('storage/videos/Salle_de_Sport_cnao.mp4') }}" type="video/mp4">
                                Votre navigateur ne supporte pas la lecture de vidéos.
                            </video>
                        </div>
                    </div>
                @endif

            </div>


            @if (!empty($departments))
                <div class="mb-4">
                    <h5 class="text-primary mb-3">
                        Départements concernés
                    </h5>

                    <div class="d-flex flex-wrap gap-2">
                        @foreach ($departments as $department)
                            <span class="badge bg-primary px-3 py-2">
                                {{ $department }}
                            </span>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </div>
    <!-- Service Details End -->

@endsection
