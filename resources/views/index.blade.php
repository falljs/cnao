@extends('layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'CNAO – Centre National d\'Appareillage Orthopédique,
    Réadaptation et Rééducation au Sénégal')
@section('content')
    @php
        $banners = \App\Models\Banner::where('is_active', 1)->get();
        $services = \App\Models\Service::all();
        $settings = \App\Models\Setting::first();
    @endphp

    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($banners as $banner)
                    <div class="carousel-item active">
                        <img class="w-100" src="{{ asset('storage/' . $banner->image) }}" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 900px;">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">{{ $banner->title }}</h5>
                                <h1 class="display-1 text-white mb-md-4 animated zoomIn">{{ $banner->subtitle }}
                                </h1>
                                @if ($banner->button_one_text)
                                    <a href="{{ $banner->button_one_link }}"
                                        class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">{{ $banner->button_one_text }}</a>
                                @endif
                                @if ($banner->button_two_text)
                                    <a href="{{ $banner->button_two_link }}"
                                        class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">{{ $banner->button_two_text }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Banner Start -->
    <div class="container-fluid banner mb-5">
        <div class="container">
            <div class="row gx-0">
                <div class="col-lg-6 wow zoomIn" data-wow-delay="0.1s">
                    <div class="bg-primary d-flex flex-column p-5" style="height: 300px;">
                        <h3 class="text-white mb-3">Heures d'ouverture</h3>
                        <div class="d-flex justify-content-between text-white mb-3">
                            <h6 class="text-white mb-0">Lun - Ven</h6>
                            <p class="mb-0"> 8:00 - 17:00</p>
                        </div>
                        <div class="d-flex justify-content-between text-white mb-3">
                            <h6 class="text-white mb-0">Samedi</h6>
                            <p class="mb-0"> 8:00 - 12:00</p>
                        </div>
                        <div class="d-flex justify-content-between text-white mb-3">
                            <h6 class="text-white mb-0">Dimanche</h6>
                            <p class="mb-0"> Fermer</p>
                        </div>
                        <a class="btn btn-light" href="{{ url('/') }}#Rendez-vous">Prendre Rendez-vous</a>
                    </div>
                </div>
                {{-- <div class="col-lg-4 wow zoomIn" data-wow-delay="0.3s">
                    <div class="bg-dark d-flex flex-column p-5" style="height: 300px;">
                        <h3 class="text-white mb-3">Search A Doctor</h3>
                        <div class="date mb-3" id="date" data-target-input="nearest">
                            <input type="text" class="form-control bg-light border-0 datetimepicker-input"
                                placeholder="Appointment Date" data-target="#date" data-toggle="datetimepicker"
                                style="height: 40px;">
                        </div>
                        <select class="form-select bg-light border-0 mb-3" style="height: 40px;">
                            <option selected>Select A Service</option>
                            <option value="1">Service 1</option>
                            <option value="2">Service 2</option>
                            <option value="3">Service 3</option>
                        </select>
                        <a class="btn btn-light" href="">Search Doctor</a>
                    </div>
                </div> --}}
                <div class="col-lg-6 wow zoomIn" data-wow-delay="0.6s">
                    <div class="bg-secondary d-flex flex-column p-5" style="height: 300px;">
                        <h3 class="text-white mb-3">Prendre rendez-vous</h3>
                        <p class="text-white">Passez un appel pour prendre un rendez-vous</p>
                        <h2 class="text-white mb-0">+221 33 824 86 83</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Start -->

    <!-- Mot & Presentation Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">

            <!-- Tabs -->
            <ul class="nav nav-pills mb-4 justify-content-center" id="aboutTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="directeur-tab" data-bs-toggle="pill" data-bs-target="#directeur"
                        type="button" role="tab">
                        Mot du Directeur
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="ministre-tab" data-bs-toggle="pill" data-bs-target="#ministre"
                        type="button" role="tab">
                        Présentation du Ministre
                    </button>
                </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content" id="aboutTabsContent">
                @php
                    use Illuminate\Support\Str;
                    use App\Models\InstitutionalMessage;

                    $message = InstitutionalMessage::first();

                    // Limite de caractères
                    $limit = 350;

                    // Directeur
                    $directorFull = $message?->director_content ?? '';
                    $directorShort = Str::limit(strip_tags($directorFull), $limit);

                    // Ministre
                    $ministerFull = $message?->minister_content ?? '';
                    $ministerShort = Str::limit(strip_tags($ministerFull), $limit);
                @endphp

                <!-- Mot du Directeur -->
                <div class="tab-pane fade show active" id="directeur" role="tabpanel">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-7">
                            <div class="section-title mb-4">
                                <h5 class="position-relative d-inline-block text-primary text-uppercase">
                                    Message Institutionnel
                                </h5>
                                <h1 class="display-5 mb-0">
                                    {{ $message->director_title }}
                                </h1>
                            </div>

                            <h4 class="text-body fst-italic mb-4">
                                {{ $message->director_subtitle }}
                            </h4>

                            <!-- Contenu -->
                            <div>
                                <p id="director-short" class="mb-4">
                                    {{ $directorShort }}
                                </p>

                                <div id="director-full" class="mb-4 d-none">
                                    {!! $directorFull !!}
                                </div>

                                @if (strlen(strip_tags($directorFull)) > $limit)
                                    <button class="btn btn-outline-primary btn-sm" onclick="toggleContent('director')">
                                        Voir plus
                                    </button>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <img src="{{ asset('storage/' . $message->director_image) }}"
                                class="img-fluid rounded wow zoomIn" data-wow-delay="0.3s" style="object-fit: cover;">
                        </div>
                    </div>
                </div>

                <!-- Présentation du Ministre -->
                <div class="tab-pane fade" id="ministre" role="tabpanel">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-7">
                            <div class="section-title mb-4">
                                <h5 class="position-relative d-inline-block text-primary text-uppercase">
                                    Autorité de Tutelle
                                </h5>
                                <h1 class="display-5 mb-0">
                                    {{ $message->minister_title }}
                                </h1>
                            </div>

                            <h4 class="text-body fst-italic mb-4">
                                {{ $message->minister_subtitle }}
                            </h4>

                            <!-- Contenu -->
                            <div>
                                <p id="minister-short" class="mb-4">
                                    {{ $ministerShort }}
                                </p>

                                <div id="minister-full" class="mb-4 d-none">
                                    {!! $ministerFull !!}
                                </div>

                                @if (strlen(strip_tags($ministerFull)) > $limit)
                                    <button class="btn btn-outline-primary btn-sm" onclick="toggleContent('minister')">
                                        Voir plus
                                    </button>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <img src="{{ asset('storage/' . $message->minister_image) }}"
                                class="img-fluid rounded wow zoomIn" data-wow-delay="0.3s" style="object-fit: cover;">
                        </div>
                    </div>
                </div>

                <script>
                    function toggleContent(type) {
                        const shortEl = document.getElementById(type + '-short');
                        const fullEl = document.getElementById(type + '-full');
                        const btn = event.target;

                        if (fullEl.classList.contains('d-none')) {
                            shortEl.classList.add('d-none');
                            fullEl.classList.remove('d-none');
                            btn.innerText = 'Voir moins';
                        } else {
                            fullEl.classList.add('d-none');
                            shortEl.classList.remove('d-none');
                            btn.innerText = 'Voir plus';
                        }
                    }
                </script>

            </div>
        </div>
    </div>
    <!-- Mot & Presentation End -->

    <!-- Appointment Start -->
    <div class="container-fluid bg-primary bg-appointment my-5 wow fadeInUp" data-wow-delay="0.1s" id="Rendez-vous">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-6 py-5">
                    <div class="py-5">
                        <h1 class="display-5 text-white mb-4">
                            Un centre de référence engagé pour votre santé
                        </h1>
                        <p class="text-white mb-0">
                            Le CNAO met à votre disposition une expertise reconnue, des équipements modernes
                            et une équipe de professionnels qualifiés, engagés à vous offrir des soins de qualité
                            dans le respect des normes médicales et éthiques. Notre priorité est d’assurer un
                            accompagnement fiable, sécurisé et humain pour chaque patient.
                        </p>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="appointment-form h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn"
                        data-wow-delay="0.6s">
                        <h1 class="text-white mb-4">Prendre rendez-vous</h1>
                        @livewire('appointment-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Appointment End -->

    <!-- Service -->
    <div id="services" class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-4">
                <div class="section-title mb-5">
                    <h5 class="position-relative d-inline-block text-primary text-uppercase">Nous offrons des Services de
                        qualité</h5>
                    <h1 class="display-5 mb-0">Nous offrons des services de qualité à tous nos patients. De l'accueil du
                        CNAO aux salles de soins, la qualité demeure notre priorité.</h1>
                </div>
                @foreach ($services as $service)
                    <div class="col-md-4">

                        <div class="card h-100">
                            <img src="{{ asset('storage/' . $service->image) }}" class="card-img-top"
                                alt="{{ asset('storage/' . $service->image) }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $service->title }}</h5>
                                <p class="card-text">
                                    {!! \Illuminate\Support\Str::limit($service->description, 100) !!}
                                </p>
                                <a href="{{ route('services.show', $service->slug) }}" class="btn btn-primary">En savoir
                                    plus</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- Gellery Start -->
    @php
        use App\Models\Gallery;

        // Récupération des images "Avant" et "Apres"
        $beforeImage = Gallery::where('legend', 'Avant')->first();
        $afterImage = Gallery::where('legend', 'Apres')->first();

        // Récupération des autres images (hors Avant/Apres)
        $galleryImages = Gallery::whereNotIn('legend', ['Avant', 'Apres'])->get();
    @endphp

    <!-- Gallery Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5 mb-5">
                <div class="col-lg-5 wow zoomIn" data-wow-delay="0.3s" style="min-height: 400px;">
                    <div class="twentytwenty-container position-relative h-100 rounded overflow-hidden">
                        @if ($beforeImage)
                            <img class="position-absolute w-100 h-100"
                                src="{{ asset('storage/' . $beforeImage->image) }}" style="object-fit: cover;">
                        @endif
                        @if ($afterImage)
                            <img class="position-absolute w-100 h-100" src="{{ asset('storage/' . $afterImage->image) }}"
                                style="object-fit: cover;">
                        @endif
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="section-title mb-5 text-center">
                        <h5 class="position-relative d-inline-block text-primary text-uppercase fw-bold"
                            style="letter-spacing: 2px;">
                            Galerie Institutionnelle
                        </h5>
                        <h1 class="display-4 fw-semibold mt-2">
                            Nos réalisations et interventions
                        </h1>
                    </div>

                    <div class="row g-5">
                        @foreach ($galleryImages as $key => $img)
                            <div class="col-md-6 service-item wow zoomIn" data-wow-delay="{{ 0.3 + $key * 0.3 }}s">
                                <div class="rounded-top overflow-hidden">
                                    <img class="img-fluid" src="{{ asset('storage/' . $img->image) }}" alt="">
                                </div>
                                <div class="position-relative bg-light rounded-bottom text-center p-4">
                                    <h5 class="m-0">{{ $img->legend }}</h5>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Example section avec contact / appointment -->
            <div class="row g-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-lg-7">
                    <div class="row g-5">
                        {{-- On peut ajouter plus d'images si besoin --}}
                    </div>
                </div>
                <div class="col-lg-5 service-item wow zoomIn" data-wow-delay="0.9s">
                    <div
                        class="position-relative bg-primary rounded h-100 d-flex flex-column align-items-center justify-content-center text-center p-4">
                        <h3 class="text-white mb-3">Prendre rendez-vous</h3>
                        <p class="text-white mb-3">Passez un appel</p>
                        <h2 class="text-white mb-0">{{ $settings->phone_two }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery End -->

    <!-- Offer Start -->
    <div class="container-fluid bg-offer my-5 py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-7 wow zoomIn" data-wow-delay="0.6s">
                    <div class="offer-text text-center rounded p-5">
                        <h1 class="display-5 text-white">Organisation du CNAO</h1>
                        <p class="text-white mb-4">
                            Vous êtes accueillis, traités et suivis par un dispositif médical accompagné par des Services de
                            soutien (Services administratifs et Services techniques)
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->


    <!-- Blog Section Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5">
                <!-- Texte introductif -->
                <div class="col-lg-5">
                    <div class="section-title mb-4">
                        <h5 class="position-relative d-inline-block text-primary text-uppercase">Actualités & Blog</h5>
                        <h1 class="display-5 mb-0">Les dernières nouvelles et conseils santé du CNAO</h1>
                    </div>
                    <p class="mb-4">
                        Découvrez nos articles récents sur la rééducation, l’orthopédie, la santé et les initiatives du
                        Centre National d’Appareillage Orthopédique.
                        Restez informés et suivez nos conseils pour un mieux-être optimal.
                    </p>
                    <h5 class="text-uppercase text-primary wow fadeInUp" data-wow-delay="0.3s">Contactez-nous pour plus
                        d'infos</h5>
                    <h1 class="wow fadeInUp" data-wow-delay="0.6s">+221 33 123 45 67</h1>
                </div>

                @php
                    $blogs = \App\Models\Blog::latest()->take(5)->get();
                @endphp

                <div class="col-lg-7">
                    <div class="owl-carousel price-carousel wow zoomIn" data-wow-delay="0.9s">
                        @foreach ($blogs as $blog)
                            <div class="price-item pb-4">
                                <div class="position-relative">
                                    <img class="img-fluid rounded-top" src="{{ asset('storage/' . $blog->image) }}"
                                        alt="{{ $blog->title }}">
                                    <div class="d-flex align-items-center justify-content-center bg-light rounded pt-2 px-3 position-absolute top-100 start-50 translate-middle"
                                        style="z-index: 2;">
                                        <h6 class="text-primary m-0">{{ $blog->category->name ?? 'Général' }}</h6>
                                    </div>
                                </div>
                                <div class="position-relative text-center bg-light border-bottom border-primary py-5 p-4">
                                    <h4>{{ $blog->title }}</h4>
                                    <hr class="text-primary w-50 mx-auto mt-0">
                                    <div class="mb-3">
                                        {!! \Illuminate\Support\Str::limit(strip_tags($blog->description), 120, '...') !!}
                                    </div>
                                    <a href="{{ route('blog.show', $blog->slug) }}"
                                        class="btn btn-primary py-2 px-4 position-absolute top-100 start-50 translate-middle">
                                        Lire l'article
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>


                </div>


            </div>
        </div>
    </div>
    <!-- Blog Section End -->


    <!-- Testimonial Start -->
    <div class="container-fluid bg-primary bg-testimonial py-5 my-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="owl-carousel testimonial-carousel rounded p-5 wow zoomIn" data-wow-delay="0.6s">
                        <div class="testimonial-item text-center text-white">
                            <img class="img-fluid mx-auto rounded mb-4"
                                src="/assets/img/Madjiguene-Ndiayediawara-temoignage.jpg" alt="">
                            <p class="fs-5">
                                Machalla en tous la dame bi nek si
                                guichet madame dione je pense war guen ko décorée machlala à elle
                                machalla wa cnao
                            </p>
                            <hr class="mx-auto w-25">
                            <h4 class="text-white mb-0"> Madjiguene Ndiaye Diawara</h4>
                            <small>SOURCE: Page Facebook
                                CNAO</small>
                        </div>

                        <div class="testimonial-item text-center text-white">
                            <img class="img-fluid mx-auto rounded mb-4" src="/assets/img/Mareme-DIALLO-temoignage.jpg"
                                alt="">
                            <p class="fs-5">
                                Cnao est un centre et les gens qui sont la bas sont gentils et s'occupent des patients
                                comme
                                il faut j'en connais pas mal tels que des kinés comme ousseynou Faye cheikh Ndiaye qui
                                ne
                                sont plus là bas et tant d'autres ainsi le défunt docteur Amadou coura ndao paix à son
                                ame
                                bonne continuation
                                Philippe et à tte le l'équipe de ce centre
                            </p>
                            <hr class="mx-auto w-25">
                            <h4 class="text-white mb-0">Maréme Diallo</h4>
                            <small>SOURCE: Page Facebook
                                CNAO</small>
                        </div>

                        <div class="testimonial-item text-center text-white">
                            <img class="img-fluid mx-auto rounded mb-4" src="/assets/img/Marianne-Pucetti-temoignage.jpg"
                                alt="">
                            <p class="fs-5">
                                Sa c'est vrai moi j'y suis allée j'ai été suivi par le docteur birame pour une hernie
                                discale et par docteur aloise pour une paralysie faciale mais machallah mention spéciale
                                à
                                eux
                            </p>
                            <hr class="mx-auto w-25">
                            <h4 class="text-white mb-0">Marianne Pucetti</h4>
                            <small>SOURCE: Page Facebook
                                CNAO</small>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


@endsection
