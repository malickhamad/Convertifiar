@extends('components.app')

@section('meta')
    <title>Create Blog | PixelFlow</title>
@endsection

@section('content')

<div class="container-fluid py-4" style="margin-top: 105px;">

    {{-- Header --}}
    <div class="d-flex align-items-center gap-3 mb-4">

        <a href="{{ route('admin.blogs.index') }}"
           class="btn btn-dark border-secondary rounded-circle">

            <i class="fas fa-arrow-left"></i>

        </a>

        <div>

            <h2 class="fw-bold text-white mb-1">
                Create Blog
            </h2>

            <p class="text-secondary mb-0">
                Create a new article for PixelFlow.
            </p>

        </div>

    </div>


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


    <form action="{{ route('admin.blogs.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="row g-4">

            {{-- Main Content --}}
            <div class="col-lg-8">

                <div class="card bg-dark border-secondary border-opacity-25 rounded-4">

                    <div class="card-body p-4">

                        <h5 class="text-white fw-bold mb-4">
                            <i class="fas fa-pen me-2 text-primary"></i>
                            Article Content
                        </h5>


                        {{-- Title --}}
                        <div class="mb-4">

                            <label class="form-label text-white">
                                Blog Title <span class="text-danger">*</span>
                            </label>

                            <input type="text"
                                   name="title"
                                   value="{{ old('title') }}"
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
                                   value="{{ old('slug') }}"
                                   class="form-control bg-black text-white border-secondary"
                                   placeholder="leave-empty-to-generate-automatically">

                            <div class="form-text text-secondary">
                                Leave empty to generate automatically from the title.
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
                                      placeholder="Write a short description of the article...">{{ old('excerpt') }}</textarea>

                        </div>


                        {{-- Content --}}
                        <div class="mb-3">

                            <label class="form-label text-white">
                                Blog Content <span class="text-danger">*</span>
                            </label>

                            <textarea name="content"
                                      rows="18"
                                      class="form-control bg-black text-white border-secondary"
                                      placeholder="Write your blog article here..."
                                      required>{{ old('content') }}</textarea>

                            <div class="form-text text-secondary">
                                You can add your article content here.
                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- Sidebar --}}
            <div class="col-lg-4">

                {{-- Publish --}}
                <div class="card bg-dark border-secondary border-opacity-25 rounded-4 mb-4">

                    <div class="card-body p-4">

                        <h5 class="text-white fw-bold mb-4">
                            <i class="fas fa-globe me-2 text-primary"></i>
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
                                    {{ old('status') === 'draft' ? 'selected' : '' }}>
                                    Draft
                                </option>

                                <option value="published"
                                    {{ old('status') === 'published' ? 'selected' : '' }}>
                                    Published
                                </option>

                            </select>

                        </div>


                        {{-- Published Date --}}
                        <div class="mb-3">

                            <label class="form-label text-white">
                                Published Date
                            </label>

                            <input type="datetime-local"
                                   name="published_at"
                                   value="{{ old('published_at') }}"
                                   class="form-control bg-black text-white border-secondary"
                                   onclick="this.showPicker()">
                        </div>
                        


                        <button type="submit"
                                class="btn btn-primary w-100 rounded-pill">

                            <i class="fas fa-save me-2"></i>
                            Create Blog

                        </button>

                    </div>

                </div>


                {{-- Featured Image --}}
                <div class="card bg-dark border-secondary border-opacity-25 rounded-4 mb-4">

                    <div class="card-body p-4">

                        <h5 class="text-white fw-bold mb-4">
                            <i class="fas fa-image me-2 text-primary"></i>
                            Featured Image
                        </h5>

                        <input type="file"
                               name="featured_image"
                               class="form-control bg-black text-white border-secondary"
                               accept=".jpg,.jpeg,.png,.webp">

                        <div class="form-text text-secondary mt-2">
                            JPG, PNG or WebP. Maximum 5MB.
                        </div>

                    </div>

                </div>


                {{-- Blog Information --}}
                <div class="card bg-dark border-secondary border-opacity-25 rounded-4 mb-4">

                    <div class="card-body p-4">

                        <h5 class="text-white fw-bold mb-4">
                            <i class="fas fa-info-circle me-2 text-primary"></i>
                            Information
                        </h5>


                        {{-- Category --}}
                        <div class="mb-3">

                            <label class="form-label text-white">
                                Category
                            </label>

                            <input type="text"
                                   name="category"
                                   value="{{ old('category') }}"
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
                                   value="{{ old('author') }}"
                                   class="form-control bg-black text-white border-secondary"
                                   placeholder="PixelFlow">

                        </div>

                    </div>

                </div>


                {{-- SEO --}}
                <div class="card bg-dark border-secondary border-opacity-25 rounded-4">

                    <div class="card-body p-4">

                        <h5 class="text-white fw-bold mb-4">
                            <i class="fas fa-search me-2 text-primary"></i>
                            SEO
                        </h5>


                        <div class="mb-3">

                            <label class="form-label text-white">
                                Meta Title
                            </label>

                            <input type="text"
                                   name="meta_title"
                                   value="{{ old('meta_title') }}"
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
                                      placeholder="SEO description...">{{ old('meta_description') }}</textarea>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </form>

</div>

@endsection