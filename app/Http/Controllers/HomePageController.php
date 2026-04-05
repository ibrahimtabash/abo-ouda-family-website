<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $newsData = News::where('is_published', true)
            ->latest()
            ->take(3)
            ->get();
        return view('index', compact('newsData'));
    }
}
