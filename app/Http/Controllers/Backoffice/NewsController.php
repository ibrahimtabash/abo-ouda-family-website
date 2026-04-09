<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth', 'role:admin']);
    // }

    public function index(Request $request)
    {
        // $news = News::with('user')->orderBy('created_at', 'desc')->paginate();
        // approved
        $query = News::with('user')->latest();

        // pending
        if ($request->input('is_published') == 'false') {
            $query->where('is_published', false);
        }

        $news = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('backoffice.news.index', compact('news'));
    }
    // public function pending()
    // {
    //     $news = News::where('is_published', false)->orderBy('created_at', 'desc')->get();
    //     return view('backoffice.news.pending', compact('news'));
    // }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('backoffice.news.show', compact('news'));
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('backoffice.news.edit', compact('news'));
    }

    public function publish(Request $request, $id)
    {
        $news = News::findOrFail($id);
        $news->is_published = true;
        $news->save();

        return redirect()->route('backoffice.news.index', ['is_published'=> 'true'])->with('success', 'News published.');
    }

    public function reject(Request $request, $id)
    {
        $news = News::findOrFail($id);
        // Keep record but ensure it's not published. If deletion is desired, replace this with $news->delete().
        $news->is_published = false;
        $news->save();

        return redirect()->route('backoffice.news.index', ['is_published'=> 'false'])->with('success', 'News rejected.');
    }



    public function destroy($id) {
        $news = News::findOrFail($id);
        $news->delete();

        return redirect()->route('backoffice.news.index')->with('success', 'News deleted.');
    }
}