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

                    {{--    <a href="#appointment" class="btn btn-primary py-3 px-5 mt-3 wow zoomIn">
                        Prendre rendez-vous
                    </a> --}}
                </div>

                <!-- Image -->
                <div class="col-lg-5" style="min-height: 450px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.3s"
                            src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}"
                            style="object-fit: cover;">
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Service Details End -->

@endsection
