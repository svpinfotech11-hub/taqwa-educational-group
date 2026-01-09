<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::latest()->get();
        return view('about-page.index', compact('abouts'));
    }

    public function create()
    {
        return view('about-page.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('about'), $imageName);

            // store relative path (optional)
            $imagePath =  $imageName;
        }

        About::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('about-page.index')->with('success', 'About record created successfully!');
    }

    public function edit(About $about)
    {
        return view('about-page.edit', compact('about'));
    }

    public function update(Request $request, About $about)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|max:2048',
        ]);

        $imagePath = $about->image; // keep the existing image by default

        // If a new image is uploaded, replace the old one
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($about->image && file_exists(public_path('about/' . basename($about->image)))) {
                unlink(public_path('about/' . basename($about->image)));
            }

            // Upload new image
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('about'), $imageName);

            // Store relative path
            $imagePath = $imageName;
        }

        $about->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('about-page.index')->with('success', 'About record updated successfully!');
    }

    public function destroy(About $about)
    {
        // Delete image file if it exists
        if ($about->image && file_exists(public_path($about->image))) {
            unlink(public_path($about->image));
        }

        // Delete about record from database
        $about->delete();

        return redirect()->route('about-page.index')->with('success', 'Data deleted successfully!');
    }
}
