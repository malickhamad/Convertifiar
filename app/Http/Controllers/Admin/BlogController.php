<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display all blogs.
     */
    public function index(Request $request)
    {
        $query = Blog::latest();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%")
                    ->orWhere('author', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $blogs = $query->paginate(10)->withQueryString();

        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show create blog form.
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a new blog.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blogs,slug',
            'category' => 'nullable|string|max:100',
            'excerpt' => 'nullable|string|max:1000',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'author' => 'nullable|string|max:100',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date',
        ]);

        $validated['slug'] = $validated['slug']
            ?: Str::slug($validated['title']);

        /*
        |--------------------------------------------------------------------------
        | Make sure generated slug is unique
        |--------------------------------------------------------------------------
        */

        $originalSlug = $validated['slug'];
        $counter = 1;

        while (
            Blog::where('slug', $validated['slug'])->exists()
        ) {
            $validated['slug'] = $originalSlug . '-' . $counter;
            $counter++;
        }

        /*
        |--------------------------------------------------------------------------
        | Upload featured image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] =
                $request->file('featured_image')
                    ->store('blogs', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Published date
        |--------------------------------------------------------------------------
        */

        if ($validated['status'] === 'published' && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        Blog::create($validated);

        return redirect()
            ->route('admin.blogs.index')
            ->with('success', 'Blog created successfully.');
    }

    /**
     * Display a single blog in admin.
     */
    public function show(Blog $blog)
    {
        return view('admin.blogs.show', compact('blog'));
    }

    /**
     * Show edit blog form.
     */
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update blog.
     */
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blogs,slug,' . $blog->id,
            'category' => 'nullable|string|max:100',
            'excerpt' => 'nullable|string|max:1000',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'author' => 'nullable|string|max:100',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date',
        ]);

        $validated['slug'] = $validated['slug']
            ?: Str::slug($validated['title']);

        /*
        |--------------------------------------------------------------------------
        | Make sure slug is unique
        |--------------------------------------------------------------------------
        */

        $originalSlug = $validated['slug'];
        $counter = 1;

        while (
            Blog::where('slug', $validated['slug'])
                ->where('id', '!=', $blog->id)
                ->exists()
        ) {
            $validated['slug'] = $originalSlug . '-' . $counter;
            $counter++;
        }

        /*
        |--------------------------------------------------------------------------
        | Replace featured image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('featured_image')) {

            if (
                $blog->featured_image &&
                Storage::disk('public')->exists($blog->featured_image)
            ) {
                Storage::disk('public')->delete($blog->featured_image);
            }

            $validated['featured_image'] =
                $request->file('featured_image')
                    ->store('blogs', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Published date
        |--------------------------------------------------------------------------
        */

        if ($validated['status'] === 'published' && empty($validated['published_at'])) {
            $validated['published_at'] = $blog->published_at ?: now();
        }

        if ($validated['status'] === 'draft') {
            $validated['published_at'] = null;
        }

        $blog->update($validated);

        return redirect()
            ->route('admin.blogs.index')
            ->with('success', 'Blog updated successfully.');
    }

    /**
     * Delete blog.
     */
    public function destroy(Blog $blog)
    {
        if (
            $blog->featured_image &&
            Storage::disk('public')->exists($blog->featured_image)
        ) {
            Storage::disk('public')->delete($blog->featured_image);
        }

        $blog->delete();

        return redirect()
            ->route('admin.blogs.index')
            ->with('success', 'Blog deleted successfully.');
    }
}