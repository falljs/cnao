@extends('layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : '')
@section('content')
    <!-- HERO BLOG -->
    <section class="blog-hero position-relative">
        <img src="{{ asset('storage/' . $blog->image) }}" class="w-100 blog-hero-img" alt="{{ $blog->title }}">
        <div class="blog-hero-overlay"></div>

        <div class="container position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <span class="badge bg-primary mb-3">
                        {{ $blog->category->name ?? 'Actualité' }}
                    </span>
                    <h1 class="text-white fw-bold display-6">
                        {{ $blog->title }}
                    </h1>
                    <p class="text-white-50 mb-0">
                        Publié le {{ $blog->created_at->format('d M Y') }}
                        • {{ $blog->view_count }} vues
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- BLOG CONTENT -->
    <section class="container py-5">
        <div class="row">
            <!-- ARTICLE -->
            <div class="col-lg-8">
                <article class="blog-content">
                    {!! $blog->description !!}
                </article>
            </div>

            <!-- SIDEBAR -->
            <div class="col-lg-4">
                <div class="sticky-top" style="top: 100px">

                    <!-- AUTRES ARTICLES -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">
                            <h5 class="fw-bold mb-3">Autres articles</h5>

                            @foreach ($otherBlogs as $item)
                                <a href="{{ route('blog.show', $item->slug) }}"
                                    class="d-flex align-items-center mb-3 text-decoration-none blog-mini">
                                    <img src="{{ asset('storage/' . $item->image) }}" class="rounded" width="80"
                                        height="60" style="object-fit: cover">

                                    <div class="ms-3">
                                        <h6 class="mb-1 text-dark">
                                            {{ Str::limit($item->title, 50) }}
                                        </h6>
                                        <small class="text-muted">
                                            {{ $item->created_at->format('d M Y') }}
                                        </small>
                                    </div>
                                </a>
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <style>
        /* BLOG HERO */
        .blog-hero {
            height: 420px;
            overflow: hidden;
        }

        .blog-hero-img {
            height: 100%;
            object-fit: cover;
        }

        .blog-hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to right,
                    rgba(0, 0, 0, 0.75),
                    rgba(0, 0, 0, 0.3));
        }

        /* BLOG CONTENT */
        .blog-content {
            font-size: 1.05rem;
            line-height: 1.8;
        }

        .blog-content h2,
        .blog-content h3,
        .blog-content h4 {
            margin-top: 2rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .blog-content img,
        .blog-content video,
        .blog-content iframe {
            max-width: 100%;
            border-radius: 12px;
            margin: 1.5rem 0;
        }

        /* MINI BLOG LINK */
        .blog-mini:hover h6 {
            color: var(--bs-primary);
        }
    </style>
@endsection
