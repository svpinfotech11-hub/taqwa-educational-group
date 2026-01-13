<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutusDetail;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::with('details')->latest()->get();
        return view('about-page.index', compact('abouts'));
    }

    public function create()
    {
        return view('about-page.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'links.*' => 'nullable|url'
        ]);
        $about = About::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $images = $request->file('images', []);
        $videos = $request->file('videos', []);
        $links  = $request->links ?? [];

        $count = max(count($images), count($videos), count($links));

        for ($i = 0; $i < $count; $i++) {

            $imageName = null;
            $videoName = null;

            if (isset($images[$i])) {
                $imageName = time() . '_' . $images[$i]->getClientOriginalName();
                $images[$i]->move('about/images', $imageName);
            }

            if (isset($videos[$i])) {
                $videoName = time() . '_' . $videos[$i]->getClientOriginalName();
                $videos[$i]->move('about/videos', $videoName);
            }

            AboutusDetail::create([
                'aboutus_id' => $about->id,
                'image' => $imageName,
                'video' => $videoName,
                'link'  => $links[$i] ?? null,
            ]);
        }

        return back()->with('success', 'About Us saved successfully');
    }

    public function edit($id)
    {
        $about = About::with('details')->findOrFail($id);
        return view('about-page.edit', compact('about'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'links.*' => 'nullable|url',
        ]);

        $about = About::findOrFail($id);

        $about->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $submittedIds = $request->detail_ids ?? [];
        $existingIds  = $about->details()->pluck('id')->toArray();

        $deleteIds = array_diff($existingIds, $submittedIds);

        if (!empty($deleteIds)) {
            AboutusDetail::whereIn('id', $deleteIds)->delete();
        }

        $images    = $request->file('images', []);
        $videos    = $request->file('videos', []);
        $links     = $request->links ?? [];
        $detailIds = $request->detail_ids ?? [];

        $count = max(count($images), count($videos), count($links), count($detailIds));

        for ($i = 0; $i < $count; $i++) {

            $detail = isset($detailIds[$i])
                ? AboutusDetail::find($detailIds[$i])
                : new AboutusDetail();

            $detail->aboutus_id = $about->id;

            if (isset($images[$i])) {
                $imageName = time() . '_' . $images[$i]->getClientOriginalName();
                $images[$i]->move('about/images', $imageName);
                $detail->image = $imageName;
            }

            if (isset($videos[$i])) {
                $videoName = time() . '_' . $videos[$i]->getClientOriginalName();
                $videos[$i]->move('about/videos', $videoName);
                $detail->video = $videoName;
            }

            if (!empty($links[$i])) {
                $detail->link = $links[$i];
            }

            if (
                empty($detail->image) &&
                empty($detail->video) &&
                empty($detail->link)
            ) {
                continue;
            }

            $detail->save();
        }

        return redirect()
            ->route('about-page.index')
            ->with('success', 'About Us Updated Successfully');
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
