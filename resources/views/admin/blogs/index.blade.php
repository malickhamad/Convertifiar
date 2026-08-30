@extends('components.app')

@section('meta')
    <title>Manage Blogs | PixelFlow</title>
@endsection

@section('content')

<div class="container-fluid py-4" style="margin-top: 105px;">

    {{-- Header --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">

        <div>
            <h2 class="fw-bold text-white mb-1">
                <i class="fas fa-newspaper me-2 text-primary"></i>
                Blogs
            </h2>

            <p class="text-secondary mb-0">
                Manage your PixelFlow blog articles.
            </p>
        </div>

        <a href="{{ route('admin.blogs.create') }}"
           class="btn btn-primary rounded-pill px-4">
            <i class="fas fa-plus me-2"></i>
            Add New Blog
        </a>

    </div>


    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 rounded-3" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"></button>
        </div>
    @endif


    {{-- Validation Errors --}}
    @if($errors->any())
        <div class="alert alert-danger border-0 rounded-3">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{-- Search / Filter --}}
    <div class="card bg-dark border-secondary border-opacity-25 rounded-4 mb-4">

        <div class="card-body">

            <form method="GET"
                  action="{{ route('admin.blogs.index') }}">

                <div class="row g-3 align-items-end">

                    <div class="col-lg-7">

                        <label class="form-label text-white">
                            Search Blogs
                        </label>

                        <div class="input-group">

                            <span class="input-group-text bg-black border-secondary text-secondary">
                                <i class="fas fa-search"></i>
                            </span>

                            <input type="text"
                                   name="search"
                                   value="{{ request('search') }}"
                                   class="form-control bg-black text-white border-secondary"
                                   placeholder="Search by title, category or author...">

                        </div>

                    </div>


                    <div class="col-lg-3">

                        <label class="form-label text-white">
                            Status
                        </label>

                        <select name="status"
                                class="form-select bg-black text-white border-secondary">

                            <option value="">All Status</option>

                            <option value="published"
                                {{ request('status') === 'published' ? 'selected' : '' }}>
                                Published
                            </option>

                            <option value="draft"
                                {{ request('status') === 'draft' ? 'selected' : '' }}>
                                Draft
                            </option>

                        </select>

                    </div>


                    <div class="col-lg-2 d-grid">

                        <button class="btn btn-primary">
                            <i class="fas fa-filter me-1"></i>
                            Filter
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>


    {{-- Blog Table --}}
    <div class="card bg-dark border-secondary border-opacity-25 rounded-4">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-dark table-hover align-middle mb-0">

                    <thead>

                        <tr class="text-secondary">

                            <th class="px-4 py-3">
                                Blog
                            </th>

                            <th>
                                Category
                            </th>

                            <th>
                                Author
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Published
                            </th>

                            <th class="text-end px-4">
                                Actions
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($blogs as $blog)

                            <tr>

                                {{-- Blog --}}
                                <td class="px-4">

                                    <div class="d-flex align-items-center gap-3">

                                        @if($blog->featured_image)

                                            <img src="{{ asset('storage/' . $blog->featured_image) }}"
                                                 alt="{{ $blog->title }}"
                                                 class="rounded-3"
                                                 width="65"
                                                 height="50"
                                                 style="object-fit: cover;">

                                        @else

                                            <div class="bg-primary bg-opacity-10 rounded-3 d-flex align-items-center justify-content-center"
                                                 style="width:65px;height:50px;">

                                                <i class="fas fa-newspaper text-primary"></i>

                                            </div>

                                        @endif


                                        <div>

                                            <div class="fw-semibold text-white">
                                                {{ Str::limit($blog->title, 55) }}
                                            </div>

                                            <small class="text-secondary">
                                                /blog/{{ $blog->slug }}
                                            </small>

                                        </div>

                                    </div>

                                </td>


                                {{-- Category --}}
                                <td>

                                    @if($blog->category)

                                        <span class="badge bg-primary bg-opacity-10 text-primary">
                                            {{ $blog->category }}
                                        </span>

                                    @else
                                        <span class="text-secondary">—</span>
                                    @endif

                                </td>


                                {{-- Author --}}
                                <td class="text-secondary">
                                    {{ $blog->author ?: '—' }}
                                </td>


                                {{-- Status --}}
                                <td>

                                    @if($blog->status === 'published')

                                        <span class="badge bg-success bg-opacity-10 text-success">
                                            <i class="fas fa-circle fa-xs me-1"></i>
                                            Published
                                        </span>

                                    @else

                                        <span class="badge bg-warning bg-opacity-10 text-warning">
                                            <i class="fas fa-circle fa-xs me-1"></i>
                                            Draft
                                        </span>

                                    @endif

                                </td>


                                {{-- Date --}}
                                <td class="text-secondary">

                                    {{ $blog->published_at
                                        ? $blog->published_at->format('M d, Y')
                                        : '—' }}

                                </td>


                                {{-- Actions --}}
                                <td class="text-end px-4">

                                    <div class="btn-group">

                                        <a href="{{ route('admin.blogs.show', $blog) }}"
                                           class="btn btn-sm btn-outline-light"
                                           title="View">

                                            <i class="fas fa-eye"></i>

                                        </a>


                                        <a href="{{ route('admin.blogs.edit', $blog) }}"
                                           class="btn btn-sm btn-outline-primary"
                                           title="Edit">

                                            <i class="fas fa-edit"></i>

                                        </a>


                                        <form action="{{ route('admin.blogs.destroy', $blog) }}"
                                              method="POST"
                                              class="d-inline"
                                              onsubmit="return confirm('Are you sure you want to delete this blog?');">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-outline-danger"
                                                    title="Delete">

                                                <i class="fas fa-trash"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6"
                                    class="text-center py-5">

                                    <div class="mb-3">

                                        <i class="fas fa-newspaper fa-3x text-secondary"></i>

                                    </div>

                                    <h5 class="text-white">
                                        No blogs found
                                    </h5>

                                    <p class="text-secondary mb-3">
                                        Create your first PixelFlow blog article.
                                    </p>

                                    <a href="{{ route('admin.blogs.create') }}"
                                       class="btn btn-primary rounded-pill px-4">

                                        <i class="fas fa-plus me-2"></i>
                                        Create Blog

                                    </a>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        {{-- Pagination --}}
        @if($blogs->hasPages())

            <div class="card-footer bg-dark border-secondary border-opacity-25 py-3">

                {{ $blogs->links() }}

            </div>

        @endif

    </div>

</div>

@endsection