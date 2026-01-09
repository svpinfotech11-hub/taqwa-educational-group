<?php

namespace App\Http\Controllers;

use App\Models\VideoGallery;
use Illuminate\Http\Request;

class VideoGalleryController extends Controller
{
    public function index()
    {
        $videos = VideoGallery::orderByDesc('id')->paginate(10);
        return view('video-gallery.index', compact('videos'));
    }

      public function show()
    {
        $videos = VideoGallery::orderByDesc('id')->paginate(10);
        return view('video-gallery.index', compact('videos'));
    }

    public function create()
    {
        return view('video-gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'      => 'required',
            'video_link' => 'required|url',
        ]);

        VideoGallery::create($request->all());

        return redirect()->route('video-gallery.index')->with('success','Video added successfully!');
    }

    public function edit($id)
    {
        $video = VideoGallery::findOrFail($id);
        return view('video-gallery.edit', compact('video'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'      => 'required',
            'video_link' => 'required|url',
        ]);

        $video = VideoGallery::findOrFail($id);
        $video->update($request->all());

        return redirect()->route('video-gallery.index')->with('success','Video updated successfully!');
    }

    public function destroy($id)
    {
        VideoGallery::findOrFail($id)->delete();

        return redirect()->route('video-gallery.index')->with('success','Video deleted successfully!');
    }
}

