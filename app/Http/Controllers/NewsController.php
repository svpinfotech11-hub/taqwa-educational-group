<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsDetail;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('details')->latest()->paginate(10);
        return view('news.index', compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'news_date' => 'required|date',
            'links.*' => 'nullable|url',
        ]);

        $news = News::create([
            'title' => $request->title,
            'description' => $request->description,
            'news_date' => $request->news_date,
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
                $images[$i]->move('news/images', $imageName);
            }

            if (isset($videos[$i])) {
                $videoName = time() . '_' . $videos[$i]->getClientOriginalName();
                $videos[$i]->move('news/videos', $videoName);
            }

            if (!$imageName && !$videoName && empty($links[$i])) {
                continue;
            }

            NewsDetail::create([
                'news_id' => $news->id,
                'image' => $imageName,
                'video' => $videoName,
                'link'  => $links[$i] ?? null,
            ]);
        }

        return redirect()->route('news.index')->with('success', 'News added successfully.');
    }

    public function edit($id)
    {
        $news = News::with('details')->findOrFail($id);
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'news_date' => 'required|date',
            'links.*' => 'nullable|url',
        ]);

        $news = News::findOrFail($id);

        $news->update([
            'title' => $request->title,
            'description' => $request->description,
            'news_date' => $request->news_date,
        ]);

        $submittedIds = $request->detail_ids ?? [];
        $existingIds  = $news->details()->pluck('id')->toArray();
        $deleteIds    = array_diff($existingIds, $submittedIds);

        if (!empty($deleteIds)) {
            NewsDetail::whereIn('id', $deleteIds)->delete();
        }

        $images    = $request->file('images', []);
        $videos    = $request->file('videos', []);
        $links     = $request->links ?? [];
        $detailIds = $request->detail_ids ?? [];

        $count = max(count($images), count($videos), count($links), count($detailIds));

        for ($i = 0; $i < $count; $i++) {

            $detail = isset($detailIds[$i])
                ? NewsDetail::find($detailIds[$i])
                : new NewsDetail();

            $detail->news_id = $news->id;

            if (isset($images[$i])) {
                $imageName = time() . '_' . $images[$i]->getClientOriginalName();
                $images[$i]->move('news/images', $imageName);
                $detail->image = $imageName;
            }

            if (isset($videos[$i])) {
                $videoName = time() . '_' . $videos[$i]->getClientOriginalName();
                $videos[$i]->move('news/videos', $videoName);
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

        return redirect()->route('news.index')->with('success', 'News updated successfully.');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        if ($news->image && file_exists('uploads/news/' . $news->image)) {
            unlink('uploads/news/' . $news->image);
        }
        $news->delete();

        return redirect()->route('news.index')->with('success', 'News deleted successfully.');
    }
}
