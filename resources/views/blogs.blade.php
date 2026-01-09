@extends('layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'A propos - Centre National d’Appareillage Orthopédique (CNAO)')
@section('content')
    @php
        $blogs = \App\Models\Blog::latest()->get();
    @endphp

    <style>
        body {
            background-color: #f8f9fa;
        }

        .blog-card {
            transition: all 0.3s ease;
        }

        .blog-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        .blog-img {
            height: 220px;
            object-fit: cover;
        }

        .search-box {
            max-width: 500px;
            margin: auto;
        }

        .no-result {
            display: none;
        }
    </style>

    <!-- HERO -->
    <div class="container-fluid bg-primary text-white py-5 mb-5">
        <div class="container text-center">
            <h1 class="display-5 text-white">Actualités & Publications</h1>
            <p class="lead mb-0">Informations, sensibilisation et activités du CNAO</p>
        </div>
    </div>

    <!-- SEARCH -->
    <div class="container mb-4">
        <div class="search-box">
            <input type="text" id="searchInput" class="form-control form-control-lg" placeholder="Rechercher un article...">
        </div>
    </div>

    <!-- BLOG LIST -->
    <div class="container">
        <div class="row g-4" id="blogList">

            @forelse($blogs as $blog)
                <div class="col-lg-4 col-md-6 blog-item">
                    <div class="card blog-card h-100">

                        <!-- Image -->
                        <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top blog-img"
                            alt="{{ $blog->title }}">

                        <div class="card-body">
                            <!-- Title (important pour la recherche JS) -->
                            <h5 class="card-title blog-title">
                                {{ $blog->title }}
                            </h5>

                            <!-- Description limitée -->
                            <p class="card-text text-muted">
                                {{ \Illuminate\Support\Str::limit(strip_tags($blog->description), 120) }}
                            </p>
                        </div>

                        <div class="card-footer bg-white border-0">
                            <a href="{{ route('blog.show', $blog->slug) }}" class="btn btn-outline-primary w-100">
                                Lire l’article
                            </a>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>Aucun article disponible pour le moment.</p>
                </div>
            @endforelse

        </div>

        <!-- NO RESULT (JS) -->
        <div class="text-center mt-5 no-result" id="noResult">
            <h5>Aucun article trouvé</h5>
        </div>
    </div>

    <!-- JS SEARCH -->
    <script>
        const searchInput = document.getElementById('searchInput');
        const blogItems = document.querySelectorAll('.blog-item');
        const noResult = document.getElementById('noResult');

        searchInput.addEventListener('keyup', function() {
            const filter = searchInput.value.toLowerCase();
            let visibleCount = 0;

            blogItems.forEach(item => {
                const title = item.querySelector('.blog-title').textContent.toLowerCase();

                if (title.includes(filter)) {
                    item.style.display = 'block';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });

            noResult.style.display = visibleCount === 0 ? 'block' : 'none';
        });
    </script>

@endsection
