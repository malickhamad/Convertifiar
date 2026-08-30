@extends('components.app')

@section('meta')
    <title>{{ $blog->title }} | PixelFlow</title>
@endsection

@section('content')

<div class="container-fluid py-4" style="margin-top: 105px;">

    {{-- Header --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">

        <div class="d-flex align-items-center gap-3">

            <a href="{{ route('admin.blogs.index') }}"
               class="btn btn-dark border-secondary rounded-circle">

                <i class="fas fa-arrow-left"></i>

            </a>

            <div>

                <h2 class="fw-bold text-white mb-1">
                    Blog Preview
                </h2>

                <p class="text-secondary mb-0">
                    Review your article before publishing.
                </p>

            </div>

        </div>


        <div class="d-flex gap-2">

            <a href="{{ route('admin.blogs.edit', $blog) }}"
               class="btn btn-primary rounded-pill px-4">

                <i class="fas fa-edit me-2"></i>
                Edit Blog

            </a>

            @if($blog->status === 'published')

                <a href="{{ route('blog.show', $blog->slug) }}"
                   target="_blank"
                   class="btn btn-outline-light rounded-pill px-4">

                    <i class="fas fa-external-link-alt me-2"></i>
                    Live Page

                </a>

            @endif

        </div>

    </div>


    <div class="row g-4">


        {{-- =========================================
             ARTICLE PREVIEW
        ========================================== --}}
        <div class="col-lg-8">

            <div class="card bg-dark border-secondary border-opacity-25 rounded-4">

                <div class="card-body p-4 p-lg-5">


                    {{-- Category --}}
                    @if($blog->category)

                        <div class="mb-3">

                            <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2">

                                <i class="fas fa-folder me-1"></i>

                                {{ $blog->category }}

                            </span>

                        </div>

                    @endif


                    {{-- Title --}}
                    <h1 class="display-6 fw-bold text-white mb-3">

                        {{ $blog->title }}

                    </h1>


                    {{-- Meta --}}
                    <div class="d-flex flex-wrap gap-3 text-secondary mb-4">

                        @if($blog->author)

                            <span>
                                <i class="fas fa-user me-1"></i>
                                {{ $blog->author }}
                            </span>

                        @endif


                        <span>

                            <i class="far fa-calendar me-1"></i>

                            {{ $blog->created_at->format('M d, Y') }}

                        </span>


                        <span>

                            <i class="fas fa-circle fa-xs me-1"></i>

                            {{ ucfirst($blog->status) }}

                        </span>

                    </div>


                    {{-- Featured Image --}}
                    @if($blog->featured_image)

                        <div class="mb-4">

                            <img src="{{ asset('storage/' . $blog->featured_image) }}"
                                 alt="{{ $blog->title }}"
                                 class="img-fluid rounded-4 w-100"
                                 style="max-height:450px; object-fit:cover;">

                        </div>

                    @endif


                    {{-- Excerpt --}}
                    @if($blog->excerpt)

                        <div class="border-start border-primary border-3 ps-3 mb-4">

                            <p class="text-light fs-5 mb-0">

                                {{ $blog->excerpt }}

                            </p>

                        </div>

                    @endif


                    {{-- Content --}}
                    <div class="text-light lh-lg">

                        {!! nl2br(e($blog->content)) !!}

                    </div>


                </div>

            </div>

        </div>


        {{-- =========================================
             INFORMATION SIDEBAR
        ========================================== --}}
        <div class="col-lg-4">


            {{-- Status --}}
            <div class="card bg-dark border-secondary border-opacity-25 rounded-4 mb-4">

                <div class="card-body p-4">

                    <h5 class="text-white fw-bold mb-4">

                        <i class="fas fa-info-circle text-primary me-2"></i>

                        Blog Information

                    </h5>


                    <div class="mb-3">

                        <small class="text-secondary d-block">
                            Status
                        </small>

                        @if($blog->status === 'published')

                            <span class="badge bg-success bg-opacity-10 text-success mt-1">

                                <i class="fas fa-check-circle me-1"></i>

                                Published

                            </span>

                        @else

                            <span class="badge bg-warning bg-opacity-10 text-warning mt-1">

                                <i class="fas fa-clock me-1"></i>

                                Draft

                            </span>

                        @endif

                    </div>


                    <div class="mb-3">

                        <small class="text-secondary d-block">
                            Category
                        </small>

                        <span class="text-white">
                            {{ $blog->category ?: '—' }}
                        </span>

                    </div>


                    <div class="mb-3">

                        <small class="text-secondary d-block">
                            Author
                        </small>

                        <span class="text-white">
                            {{ $blog->author ?: '—' }}
                        </span>

                    </div>


                    <div class="mb-3">

                        <small class="text-secondary d-block">
                            Created
                        </small>

                        <span class="text-white">
                            {{ $blog->created_at->format('M d, Y h:i A') }}
                        </span>

                    </div>


                    <div>

                        <small class="text-secondary d-block">
                            Published
                        </small>

                        <span class="text-white">

                            {{ $blog->published_at
                                ? $blog->published_at->format('M d, Y h:i A')
                                : 'Not published' }}

                        </span>

                    </div>

                </div>

            </div>


            {{-- URL --}}
            <div class="card bg-dark border-secondary border-opacity-25 rounded-4 mb-4">

                <div class="card-body p-4">

                    <h5 class="text-white fw-bold mb-3">

                        <i class="fas fa-link text-primary me-2"></i>

                        Blog URL

                    </h5>

                    <div class="bg-black rounded-3 p-3">

                        <small class="text-primary text-break">

                            /blog/{{ $blog->slug }}

                        </small>

                    </div>

                </div>

            </div>


            {{-- SEO --}}
            <div class="card bg-dark border-secondary border-opacity-25 rounded-4">

                <div class="card-body p-4">

                    <h5 class="text-white fw-bold mb-4">

                        <i class="fas fa-search text-primary me-2"></i>

                        SEO Information

                    </h5>


                    <div class="mb-3">

                        <small class="text-secondary d-block mb-1">
                            Meta Title
                        </small>

                        <div class="text-white">

                            {{ $blog->meta_title ?: 'Not set' }}

                        </div>

                    </div>


                    <div>

                        <small class="text-secondary d-block mb-1">
                            Meta Description
                        </small>

                        <div class="text-secondary">

                            {{ $blog->meta_description ?: 'Not set' }}

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection