<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResultController extends Controller
{
    public function show()
    {
        $results = Result::latest()->paginate(10);
        return view('results-master.index', compact('results'));
    }

    public function create()
    {
        return view('results-master.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'pdf'   => 'required|mimes:pdf|max:20480', // 20MB
        ]);

        if ($request->hasFile('pdf')) {
            $pdfName = time() . '-' . uniqid() . '.' . $request->file('pdf')->getClientOriginalExtension();
            $request->file('pdf')->move('results', $pdfName);

            $pdfPath = $pdfName;
        }

        Result::create([
            'title' => $request->title,
            'pdf_path' => $pdfPath
        ]);

        return redirect()->route('results-master.index')->with('success', 'Result created successfully.');
    }

    public function edit($id)
    {
        $result = Result::findOrFail($id);
        return view('results-master.edit', compact('result'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'pdf'   => 'nullable|mimes:pdf|max:20480',
        ]);

        $result = Result::findOrFail($id);

        if ($request->hasFile('pdf')) {
            // delete old file
            if (file_exists('results/' . $result->pdf_path)) {
                unlink('results/' . $result->pdf_path);
            }

            $pdfName = time() . '-' . uniqid() . '.' . $request->file('pdf')->getClientOriginalExtension();
            $request->file('pdf')->move('results', $pdfName);

            $result->pdf_path =  $pdfName;
        }

        $result->update([
            'title' => $request->title
        ]);


        $result->update([
            'title' => $request->title,
        ]);

        return redirect()->route('results-master.index')->with('success', 'Result updated successfully.');
    }

    public function destroy(Result $result)
    {
        // delete old file
        if (file_exists('results/' . $result->pdf_path)) {
            unlink('results/' . $result->pdf_path);
        }
        $result->delete();

        return back()->with('success', 'Result deleted successfully.');
    }

    // PUBLIC PDF VIEW ROUTE
    public function showBySlug($slug)
    {
        $result = Result::where('slug', $slug)->firstOrFail();
        return view('frontend.results-master.view', compact('result'));
    }
}
