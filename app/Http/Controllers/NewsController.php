<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    function index() {
        $news = News::where('is_published', true)->latest()->get();

        return view('news.index', compact('news'));
    }

    function create() {
        return view('news.create');
    }

    function store(NewsRequest $request) {
        // dd($request->all());
        $news = new News();
        $news->title = $request->title;
        $news->content = $request->content;
        $news->user_id = auth()->user()->id;
        $news->save();
        return redirect()->route('news.index')->with('success', 'News created successfully');
    }

    function show($id) {
        $news = News::findOrFail($id);
        return view('news.show', compact('news'));
    }
    function edit($id) {
        $news = News::findOrFail($id);
        return view('news.edit', compact('news'));
    }

    function update(Request $request, $id) {
        // @TODO: Implement update logic

    }

    function destroy($id) {
        // @TODO: Implement destroy logic
    }


}