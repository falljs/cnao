<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Blog;
use App\Models\Service;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
   public function show(Service $service)
    {
        return view('serv_detail', [
            'service' => $service,
            'departments' => $service->departments ?? [],
            'pageTitle' => $service->title . ' - CNAO',
        ]);
    }

    public function showArticle(Blog $blog)
{
    // Incrémenter les vues
    $blog->increment('view_count');

    $otherBlogs = Blog::where('id', '!=', $blog->id)
        ->latest()
        ->limit(5)
        ->get();

    return view('blog_detail', [
        'blog' => $blog,
        'otherBlogs' => $otherBlogs,
        'pageTitle' => $blog->title . ' - CNAO',
    ]);
}



}

