<?php

namespace App\Http\Controllers;

use App\Models\SubpageBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubpageBannerController extends Controller
{
    public function index()
    {
        $banners = SubpageBanner::latest()->get();
        return view('subpage_banners.index', compact('banners'));
    }

    public function create()
    {
        return view('subpage_banners.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageName = time() . '_' . $imageFile->getClientOriginalName();
            $imageFile->move('subpage_banners', $imageName);

            // Save relative path to DB
            $validated['image'] = $imageName;
        }

        SubpageBanner::create($validated);

        return redirect()
            ->route('subpage_banners.index')
            ->with('success', 'Banner created successfully.');
    }

    public function edit($id)
    {
        $subpageBanner = SubpageBanner::find($id);

        return view('subpage_banners.edit', compact('subpageBanner'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        $subpageBanner = SubpageBanner::find($id);

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($subpageBanner->image && file_exists(filename: 'subpage_banners/' . $subpageBanner->image)) {
                unlink('subpage_banners/' . $subpageBanner->image);
            }

            // Upload new image
            $imageFile = $request->file('image');
            $imageName = time() . '_' . $imageFile->getClientOriginalName();
            $imageFile->move('subpage_banners', $imageName);
            $validated['image'] = $imageName;
        }

        $subpageBanner->update($validated);

        return redirect()
            ->route('subpage_banners.index')
            ->with('success', 'Banner updated successfully.');
    }


    public function destroy($id)
    {
        $subpageBanner = SubpageBanner::find($id);
        if ($subpageBanner->image && file_exists(filename: 'subpage_banners/' . $subpageBanner->image)) {
                unlink('subpage_banners/' . $subpageBanner->image);
            }

        $subpageBanner->delete();

        return redirect()
            ->route('subpage_banners.index')
            ->with('success', 'Banner deleted successfully.');
    }
}
