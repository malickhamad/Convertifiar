@extends('components.app')

@section('meta')

<title>{{ $blog->meta_title ?: $blog->title }} | Tool Baazar</title>

<meta name="description"
 content="{{ $blog->meta_description ?: ($blog->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($blog->content), 160)) }}">

<meta property="og:title"
 content="{{ $blog->meta_title ?: $blog->title }}">

<meta property="og:description"
 content="{{ $blog->meta_description ?: ($blog->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($blog->content), 160)) }}">

@if($blog->featured_image) <meta property="og:image"
 content="{{ asset('storage/' . $blog->featured_image) }}">
@endif

@endsection

@section('content')

<div class="bg-black text-white min-vh-100" style="margin-top: 105px;">

```
{{-- =========================
     BLOG HEADER
========================== --}}

<section class="bg-dark bg-gradient border-bottom border-secondary border-opacity-25">

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-lg-9">

                {{-- Breadcrumb --}}
                <div class="small mb-4">

                    <a href="{{ route('home') }}"
                       class="text-secondary text-decoration-none">

                        <i class="fas fa-home me-1"></i>
                        Home

                    </a>

                    <span class="text-secondary mx-2">/</span>

                    <a href="{{ route('blog.index') }}"
                       class="text-secondary text-decoration-none">

                        Blog

                    </a>

                </div>


                {{-- Category --}}
                @if($blog->category)

                    <span class="badge rounded-pill bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-3 py-2 mb-3">

                        <i class="fas fa-folder-open me-1"></i>

                        {{ $blog->category }}

                    </span>

                @endif


                {{-- Title --}}
                <h1 class="display-5 fw-bold lh-sm mb-4">

                    {{ $blog->title }}

                </h1>


                {{-- Excerpt --}}
                @if($blog->excerpt)

                    <p class="lead text-secondary mb-4">

                        {{ $blog->excerpt }}

                    </p>

                @endif


                {{-- Author / Date --}}
                <div class="d-flex flex-wrap gap-4 text-secondary small">

                    @if($blog->author)

                        <span>

                            <i class="far fa-user me-2"></i>

                            {{ $blog->author }}

                        </span>

                    @endif


                    @if($blog->published_at)

                        <span>

                            <i class="far fa-calendar-alt me-2"></i>

                            {{ $blog->published_at->format('M d, Y') }}

                        </span>

                    @endif


                    {{-- Reading Time --}}
                    @php

                        $wordCount = str_word_count(
                            strip_tags($blog->content)
                        );

                        $readingTime = max(
                            1,
                            ceil($wordCount / 200)
                        );

                    @endphp

                    <span>

                        <i class="far fa-clock me-2"></i>

                        {{ $readingTime }} min read

                    </span>

                </div>

            </div>

        </div>

    </div>

</section>



{{-- =========================
     MAIN BLOG
========================== --}}

<main class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-9">


            {{-- Featured Image --}}
            @if($blog->featured_image)

                <div class="rounded-4 overflow-hidden mb-4 shadow-lg">

                    <img
                        src="{{ asset('storage/' . $blog->featured_image) }}"
                        alt="{{ $blog->title }}"
                        class="w-100 img-fluid"
                        loading="eager">

                </div>

            @endif


            {{-- Article --}}
            <article class="bg-dark border border-seacondary border-opacity-25 rounded-4">


                {{-- Article Content --}}
                <div class="p-4 p-md-5">

                    {{-- Blog Intro --}}
                    @if($blog->excerpt)

                        <div class="border-start border-primary border-3 ps-3 mb-5">

                            <p class="fs-5 text-secondary mb-0">

                                {{ $blog->excerpt }}

                            </p>

                        </div>

                    @endif


                    {{-- Full Content --}}
                    <div class="blog-content">

                        {!! $blog->content !!}

                    </div>

                </div>


                {{-- =========================
                     AUTHOR / BLOG INFO
                ========================== --}}

                @if($blog->author || $blog->category || $blog->published_at)

                    <div class="border-top border-secondary border-opacity-25 p-4 p-md-5">

                        <h5 class="fw-bold mb-4">

                            <i class="fas fa-info-circle text-primary me-2"></i>

                            Article Information

                        </h5>


                        <div class="row g-3">

                            {{-- Author --}}
                            @if($blog->author)

                                <div class="col-md-4">

                                    <div class="bg-black rounded-3 p-3 h-100">

                                        <div class="small text-secondary mb-1">

                                            Author

                                        </div>

                                        <div class="fw-semibold">

                                            <i class="far fa-user me-2 text-primary"></i>

                                            {{ $blog->author }}

                                        </div>

                                    </div>

                                </div>

                            @endif


                            {{-- Category --}}
                            @if($blog->category)

                                <div class="col-md-4">

                                    <div class="bg-black rounded-3 p-3 h-100">

                                        <div class="small text-secondary mb-1">

                                            Category

                                        </div>

                                        <div class="fw-semibold">

                                            <i class="fas fa-folder me-2 text-primary"></i>

                                            {{ $blog->category }}

                                        </div>

                                    </div>

                                </div>

                            @endif


                            {{-- Published --}}
                            @if($blog->published_at)

                                <div class="col-md-4">

                                    <div class="bg-black rounded-3 p-3 h-100">

                                        <div class="small text-secondary mb-1">

                                            Published

                                        </div>

                                        <div class="fw-semibold">

                                            <i class="far fa-calendar-alt me-2 text-primary"></i>

                                            {{ $blog->published_at->format('M d, Y') }}

                                        </div>

                                    </div>

                                </div>

                            @endif

                        </div>

                    </div>

                @endif


                {{-- Back to Blog --}}
                <div class="border-top border-secondary border-opacity-25 p-4 p-md-5">

                    <a
                        href="{{ route('blog.index') }}"
                        class="text-primary text-decoration-none fw-semibold">

                        <i class="fas fa-arrow-left me-2"></i>

                        Back to Blog

                    </a>

                </div>

            </article>

        </div>

    </div>



    {{-- =========================
         RELATED BLOGS
    ========================== --}}

    @if($relatedBlogs->count())

        <section class="mt-5">

            <div class="row justify-content-center">

                <div class="col-lg-9">

                    <div class="mb-4">

                        <h2 class="fw-bold mb-1">
                            Related Articles
                        </h2>

                        <p class="text-secondary mb-0">
                            Continue reading more articles
                        </p>

                    </div>


                    <div class="row g-4">

                        @foreach($relatedBlogs as $related)

                            <div class="col-md-4">

                                <div class="card bg-dark text-white border border-secondary border-opacity-25 rounded-4 overflow-hidden h-100">


                                    {{-- Related Image --}}
                                    @if($related->featured_image)

                                        <a href="{{ route('blog.show', $related->slug) }}">

                                            <img
                                                src="{{ asset('storage/' . $related->featured_image) }}"
                                                alt="{{ $related->title }}"
                                                class="w-100"
                                                style="height:180px; object-fit:cover;"
                                                loading="lazy">

                                        </a>

                                    @else

                                        <div
                                            class="d-flex align-items-center justify-content-center bg-black"
                                            style="height:180px;">

                                            <i class="fas fa-newspaper fa-3x text-secondary"></i>

                                        </div>

                                    @endif


                                    {{-- Related Content --}}
                                    <div class="card-body p-4 d-flex flex-column">

                                        @if($related->category)

                                            <span class="badge bg-primary bg-opacity-10 text-primary align-self-start mb-2">

                                                {{ $related->category }}

                                            </span>

                                        @endif


                                        <h5 class="fw-bold mb-2">

                                            <a
                                                href="{{ route('blog.show', $related->slug) }}"
                                                class="text-white text-decoration-none">

                                                {{ $related->title }}

                                            </a>

                                        </h5>


                                        <p class="text-secondary small mb-3">

                                            {{ \Illuminate\Support\Str::limit(
                                                $related->excerpt ?: strip_tags($related->content),
                                                100
                                            ) }}

                                        </p>


                                        @if($related->published_at)

                                            <div class="small text-secondary mb-3">

                                                <i class="far fa-calendar-alt me-1"></i>

                                                {{ $related->published_at->format('M d, Y') }}

                                            </div>

                                        @endif


                                        <div class="mt-auto">

                                            <a
                                                href="{{ route('blog.show', $related->slug) }}"
                                                class="btn btn-outline-primary btn-sm rounded-pill">

                                                Read Article

                                                <i class="fas fa-arrow-right ms-1"></i>

                                            </a>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>

            </div>

        </section>

    @endif

</main>
```

</div>

{{-- =========================
BLOG CONTENT CSS
========================== --}}

<style>

.blog-content {
    color: #e5e7eb;
    font-size: 1.05rem;
    line-height: 1.9;
}

.blog-content h1,
.blog-content h2,
.blog-content h3,
.blog-content h4,
.blog-content h5,
.blog-content h6 {
    color: #fff;
    font-weight: 700;
    line-height: 1.4;
    margin-top: 2rem;
    margin-bottom: 1rem;
}

.blog-content h2 {
    font-size: 1.8rem;
}

.blog-content h3 {
    font-size: 1.45rem;
}

.blog-content p {
    margin-bottom: 1.3rem;
}

.blog-content ul,
.blog-content ol {
    padding-left: 1.5rem;
    margin-bottom: 1.3rem;
}

.blog-content li {
    margin-bottom: .5rem;
}

.blog-content a {
    color: #0d6efd;
    text-decoration: none;
}

.blog-content a:hover {
    text-decoration: underline;
}

.blog-content img {
    max-width: 100%;
    height: auto;
    border-radius: 12px;
    margin: 1.5rem 0;
}

.blog-content blockquote {
    border-left: 4px solid #0d6efd;
    background: #111;
    padding: 1rem 1.25rem;
    margin: 1.5rem 0;
    border-radius: 0 .5rem .5rem 0;
    color: #adb5bd;
}

.blog-content pre {
    background: #000;
    padding: 1rem;
    border-radius: .75rem;
    overflow-x: auto;
}

.blog-content code {
    color: #0d6efd;
}

.blog-content table {
    width: 100%;
    border-collapse: collapse;
    margin: 1.5rem 0;
}

.blog-content th,
.blog-content td {
    border: 1px solid #343a40;
    padding: .75rem;
}

@media (max-width: 576px) {

    .display-5 {
        font-size: 2rem;
    }

    .blog-content {
        font-size: 1rem;
        line-height: 1.8;
    }

}

</style>

@endsection
