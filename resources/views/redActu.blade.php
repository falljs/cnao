@extends('layout')

@section('pageTitle', 'READAPT’Actu - CNAO')

@section('content')

    <!-- Hero -->
    <div class="container-fluid bg-primary py-5 mb-0">
        <div class="row py-3">
            <div class="col-12 text-center">
                <h1 class="display-4 text-white animated zoomIn">READAPT’Actu</h1>
                <p class="text-white mt-2">
                    Bulletin d’information et d’actualité du CNAO
                </p>
            </div>
        </div>
    </div>

    <!-- PDF FULL PAGE -->
    <div class="pdf-full-page">
        <object data="{{ asset('storage/readapt/readapt-actu-janvier-2026.pdf') }}" type="application/pdf" width="100%"
            height="100%">

            <!-- Fallback si le navigateur ne supporte pas -->
            <p class="text-center mt-4">
                Votre navigateur ne peut pas afficher le PDF.
                <br>
                <a href="{{ asset('storage/readapt/readapt-actu-janvier-2026.pdf') }}" class="btn btn-primary mt-2">
                    Télécharger le PDF
                </a>
            </p>

        </object>
    </div>
    <style>
        .pdf-full-page {
            width: 100%;
            height: calc(100vh - 200px);
            /* ajuste selon ton header */
            background: #f8f9fa;
        }

        .pdf-full-page object {
            width: 100%;
            height: 100%;
            display: block;
            border: none;
        }
    </style>
@endsection
