<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\AlbumImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    // function index() {
    //     return view('gallery.index');
    // }

    public function index()
    {
        $albums = Album::with('images')->latest()->get();
        return view('gallery.index', compact('albums'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'images.*' => 'image'
        ]);

        $album = Album::create([
            'title' => $request->title,
            'user_id' => auth()->id(),
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $path = $img->store('gallery', 'public');

                $album->images()->create([
                    'image' => $path
                ]);
            }
        }

        return back()->with('success', 'Album created successfully');
    }

    public function destroy($id)
    {
        Album::findOrFail($id)->delete();

        return back()->with('success', 'Album deleted');
    }



    public function addImage(Request $request, Album $album)
    {
        $request->validate([
            'image' => 'required|image'
        ]);

        $path = $request->file('image')->store('gallery', 'public');

        $album->images()->create([
            'image' => $path
        ]);

        return back();
    }

    public function update(Request $request, $id)
    {
        $album = Album::findOrFail($id);

        $request->validate([
            'title' => 'required|string',
        ]);

        $album->update([
            'title' => $request->title,
        ]);

        return back()->with('success', 'Album updated successfully');
    }

    public function deleteImage($id)
    {
        $image = AlbumImage::findOrFail($id);
        Storage::disk('public')->delete($image->image);

        $image->delete();

        return back();
    }
}
