<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::latest()->get();
        return view('banner.index', compact('banners'));
    }

    public function create()
    {
        return view('banner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move('banners', $imageName);

            // store relative path (optional)
            $imagePath =  $imageName;
        }

        Banner::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('banner.index')->with('success', 'Banner created successfully!');
    }

    public function edit(Banner $banner)
    {
        return view('banner.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|max:2048',
        ]);

        $imagePath = $banner->image; // keep the existing image by default

        // If a new image is uploaded, replace the old one
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($banner->image && file_exists('banners/' . basename($banner->image))) {
                unlink('banners/' . basename($banner->image));
            }

            // Upload new image
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move('banners', $imageName);

            // Store relative path
            $imagePath = $imageName;
        }

        // Update banner record
        $banner->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('banner.index')->with('success', 'Banner updated successfully!');
    }


    public function destroy(Banner $banner)
    {
        // Delete image file if it exists
        if ($banner->image && file_exists($banner->image)) {
            unlink($banner->image);
        }

        // Delete banner record from database
        $banner->delete();

        return redirect()->route('banner.index')->with('success', 'Banner deleted successfully!');
    }

}
