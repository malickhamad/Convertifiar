<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display all published blogs.
     */
    public function index()
    {
        $featuredBlog = Blog::published()
            ->latest('published_at')
            ->first();

        $blogs = Blog::published()
            ->when($featuredBlog, function ($query) use ($featuredBlog) {
                $query->where('id', '!=', $featuredBlog->id);
            })
            ->latest('published_at')
            ->paginate(9);

        $categories = Blog::published()
            ->whereNotNull('category')
            ->where('category', '!=', '')
            ->select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

            // dd($blogs);
        return view('blog.index', compact(
            'featuredBlog',
            'blogs',
            'categories'
        ));
    }


    /**
     * Display a single published blog.
     */
    public function show(string $slug)
    {
        $blog = Blog::published()
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedBlogs = Blog::published()
            ->where('id', '!=', $blog->id)
            ->when($blog->category, function ($query) use ($blog) {
                $query->where('category', $blog->category);
            })
            ->latest('published_at')
            ->take(3)
            ->get();

            // dd($blog);
        return view('blog.show', compact(
            'blog',
            'relatedBlogs'
        ));
    }
}