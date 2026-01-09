<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryImage;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->paginate(10);
        return view('galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('galleries.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|max:2048',
            'images.*' => 'nullable|image|max:2048',
        ]);

        // Handle gallery thumbnail
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '_' . $thumbnail->getClientOriginalName();
            $thumbnail->move('galleries', $thumbnailName);
            $validated['thumbnail'] = $thumbnailName;
        }

        $gallery = Gallery::create($validated);

        // Handle multiple images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move('gallery_images', $imageName);
                $gallery->images()->create(['image' => $imageName]);
            }
        }

        return redirect()->route('galleries.index')->with('success', 'Gallery created successfully.');
    }

    public function edit($id)
    {
        $gallery = Gallery::find($id);
        return view('galleries.edit', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|max:2048',
            'images.*' => 'nullable|image|max:2048',
        ]);

        $gallery = Gallery::find($id);
        // Update thumbnail
        if ($request->hasFile('thumbnail')) {
            if ($gallery->thumbnail && file_exists('galleries'.$gallery->thumbnail)) {
                unlink('galleries'.$gallery->thumbnail);
            }
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '_' . $thumbnail->getClientOriginalName();
            $thumbnail->move('galleries', $thumbnailName);
            $validated['thumbnail'] = $thumbnailName;
        }

        $gallery->update($validated);

        // Add new images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move('gallery_images', $imageName);
                $gallery->images()->create(['image' => $imageName]);
            }
        }

        return redirect()->route(route: 'galleries.index')->with('success', 'Gallery updated successfully.');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery = Gallery::find($id);
        // Delete thumbnail
        if ($gallery->thumbnail && file_exists($gallery->thumbnail)) {
            unlink($gallery->thumbnail);
        }

        // Delete all gallery images
        foreach ($gallery->images as $image) {
            if ($image->image && file_exists($image->image)) {
                unlink($image->image);
            }
            $image->delete();
        }

        $gallery->delete();

        return redirect()->route('galleries.index')->with('success', 'Gallery deleted successfully.');
    }

    // Delete individual image
    public function deleteImage($id)
    {
        $image = GalleryImage::findOrFail($id);

        // Delete from public folder
        $imagePath = 'gallery_images/' . $image->image;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Delete from database
        $image->delete();

        return back()->with('success', 'Image deleted successfully.');
    }
}
