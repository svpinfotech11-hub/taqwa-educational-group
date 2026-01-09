<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(10);
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
            'image' => 'nullable|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move('uploads/news', $fileName);
            $data['image'] = $fileName;
        }

        News::create($data);

        return redirect()->route('news.index')->with('success', 'News added successfully.');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'news_date' => 'required|date',
            'image' => 'nullable|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move('uploads/news', $fileName);
            $data['image'] = $fileName;
        }

        $news->update($data);

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
