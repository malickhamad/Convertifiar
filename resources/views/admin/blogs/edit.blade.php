@extends('components.app')

@section('meta')
    <title>Edit Blog | PixelFlow</title>
@endsection

@section('content')

<div class="container-fluid py-4" style="margin-top: 105px;">

    {{-- Header --}}
    <div class="d-flex flex-wrap align-items-center gap-3 mb-4">

        <a href="{{ route('admin.blogs.index') }}"
           class="btn btn-dark border-secondary rounded-circle">

            <i class="fas fa-arrow-left"></i>

        </a>

        <div class="flex-grow-1">

            <h2 class="fw-bold text-white mb-1">
                <i class="fas fa-edit text-primary me-2"></i>
                Edit Blog
            </h2>

            <p class="text-secondary mb-0">
                Update your PixelFlow blog article.
            </p>

        </div>

        @if($blog->status === 'published')

            <a href="{{ route('blog.show', $blog->slug) }}"
               target="_blank"
               class="btn btn-outline-primary rounded-pill px-4">

                <i class="fas fa-external-link-alt me-2"></i>
                View Live

            </a>

        @endif

    </div>


    {{-- Validation Errors --}}
    @if($errors->any())

        <div class="alert alert-danger rounded-3 border-0">

            <strong>Please fix the following:</strong>

            <ul class="mb-0 mt-2">

                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif


    {{-- Success --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show border-0 rounded-3">

            <i class="fas fa-check-circle me-2"></i>

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    <form action="{{ route('admin.blogs.update', $blog) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="row g-4">

            {{-- =========================================
                 MAIN CONTENT
            ========================================== --}}
            <div class="col-lg-8">

                <div class="card bg-dark border-secondary border-opacity-25 rounded-4">

                    <div class="card-body p-4">

                        <h5 class="text-white fw-bold mb-4">

                            <i class="fas fa-pen text-primary me-2"></i>

                            Article Content

                        </h5>


                        {{-- Title --}}
                        <div class="mb-4">

                            <label class="form-label text-white">
                                Blog Title
                                <span class="text-danger">*</span>
                            </label>

                            <input type="text"
                                   name="title"
                                   value="{{ old('title', $blog->title) }}"
                                   class="form-control form-control-lg bg-black text-white border-secondary"
                                   placeholder="Enter blog title..."
                                   required>

                        </div>


                        {{-- Slug --}}
                        <div class="mb-4">

                            <label class="form-label text-white">
                                Slug
                            </label>

                            <input type="text"
                                   name="slug"
                                   value="{{ old('slug', $blog->slug) }}"
                                   class="form-control bg-black text-white border-secondary">

                            <div class="form-text text-secondary">

                                Your article URL:

                                <span class="text-primary">
                                    /blog/{{ $blog->slug }}
                                </span>

                            </div>

                        </div>


                        {{-- Excerpt --}}
                        <div class="mb-4">

                            <label class="form-label text-white">
                                Short Excerpt
                            </label>

                            <textarea name="excerpt"
                                      rows="4"
                                      class="form-control bg-black text-white border-secondary"
                                      placeholder="Write a short description...">{{ old('excerpt', $blog->excerpt) }}</textarea>

                        </div>


                        {{-- Content --}}
                        <div class="mb-3">

                            <label class="form-label text-white">

                                Blog Content

                                <span class="text-danger">*</span>

                            </label>

                            <textarea name="content"
                                      rows="20"
                                      class="form-control bg-black text-white border-secondary"
                                      placeholder="Write your article..."
                                      required>{{ old('content', $blog->content) }}</textarea>

                            <div class="form-text text-secondary">
                                Update the complete article content here.
                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =========================================
                 SIDEBAR
            ========================================== --}}
            <div class="col-lg-4">


                {{-- Publishing --}}
                <div class="card bg-dark border-secondary border-opacity-25 rounded-4 mb-4">

                    <div class="card-body p-4">

                        <h5 class="text-white fw-bold mb-4">

                            <i class="fas fa-globe text-primary me-2"></i>

                            Publishing

                        </h5>


                        {{-- Status --}}
                        <div class="mb-3">

                            <label class="form-label text-white">
                                Status
                            </label>

                            <select name="status"
                                    class="form-select bg-black text-white border-secondary">

                                <option value="draft"
                                    {{ old('status', $blog->status) === 'draft' ? 'selected' : '' }}>

                                    Draft

                                </option>

                                <option value="published"
                                    {{ old('status', $blog->status) === 'published' ? 'selected' : '' }}>

                                    Published

                                </option>

                            </select>

                        </div>


                        {{-- Published Date --}}
                        <div class="mb-4">

                            <label class="form-label text-white">
                                Published Date
                            </label>

                            <input type="datetime-local"
                                   name="published_at"
                                   value="{{ old(
                                       'published_at',
                                       $blog->published_at
                                           ? $blog->published_at->format('Y-m-d\TH:i')
                                           : ''
                                   ) }}"
                                   class="form-control bg-black text-white border-secondary"
                                   onclick="this.showPicker()">

                        </div>


                        <button type="submit"
                                class="btn btn-primary w-100 rounded-pill">

                            <i class="fas fa-save me-2"></i>

                            Update Blog

                        </button>

                    </div>

                </div>


                {{-- =========================================
                     FEATURED IMAGE
                ========================================== --}}
                <div class="card bg-dark border-secondary border-opacity-25 rounded-4 mb-4">

                    <div class="card-body p-4">

                        <h5 class="text-white fw-bold mb-4">

                            <i class="fas fa-image text-primary me-2"></i>

                            Featured Image

                        </h5>


                        @if($blog->featured_image)

                            <div class="mb-3">

                                <img src="{{ asset('storage/' . $blog->featured_image) }}"
                                     alt="{{ $blog->title }}"
                                     class="img-fluid rounded-4 w-100"
                                     style="max-height:220px; object-fit:cover;">

                            </div>

                            <small class="text-secondary d-block mb-3">

                                Current featured image

                            </small>

                        @endif


                        <input type="file"
                               name="featured_image"
                               class="form-control bg-black text-white border-secondary"
                               accept=".jpg,.jpeg,.png,.webp">


                        <div class="form-text text-secondary mt-2">

                            Upload a new image to replace the current one.

                            Maximum 5MB.

                        </div>

                    </div>

                </div>


                {{-- =========================================
                     BLOG INFORMATION
                ========================================== --}}
                <div class="card bg-dark border-secondary border-opacity-25 rounded-4 mb-4">

                    <div class="card-body p-4">

                        <h5 class="text-white fw-bold mb-4">

                            <i class="fas fa-info-circle text-primary me-2"></i>

                            Information

                        </h5>


                        {{-- Category --}}
                        <div class="mb-3">

                            <label class="form-label text-white">
                                Category
                            </label>

                            <input type="text"
                                   name="category"
                                   value="{{ old('category', $blog->category) }}"
                                   class="form-control bg-black text-white border-secondary"
                                   placeholder="Image Tools">

                        </div>


                        {{-- Author --}}
                        <div>

                            <label class="form-label text-white">
                                Author
                            </label>

                            <input type="text"
                                   name="author"
                                   value="{{ old('author', $blog->author) }}"
                                   class="form-control bg-black text-white border-secondary"
                                   placeholder="PixelFlow">

                        </div>

                    </div>

                </div>


                {{-- =========================================
                     SEO
                ========================================== --}}
                <div class="card bg-dark border-secondary border-opacity-25 rounded-4">

                    <div class="card-body p-4">

                        <h5 class="text-white fw-bold mb-4">

                            <i class="fas fa-search text-primary me-2"></i>

                            SEO

                        </h5>


                        <div class="mb-3">

                            <label class="form-label text-white">
                                Meta Title
                            </label>

                            <input type="text"
                                   name="meta_title"
                                   value="{{ old('meta_title', $blog->meta_title) }}"
                                   class="form-control bg-black text-white border-secondary"
                                   placeholder="SEO title...">

                        </div>


                        <div>

                            <label class="form-label text-white">
                                Meta Description
                            </label>

                            <textarea name="meta_description"
                                      rows="4"
                                      class="form-control bg-black text-white border-secondary"
                                      placeholder="SEO description...">{{ old('meta_description', $blog->meta_description) }}</textarea>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </form>

</div>

@endsection