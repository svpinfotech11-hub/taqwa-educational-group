<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;
use App\Models\SubpageBanner;

class ConferenceController extends Controller
{
    public function index()
    {
        $conferences = Conference::all();
        return view('conferences.index', compact('conferences'));
    }

    public function create()
    {
        return view('conferences.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
        ]);

        Conference::create($validated);

        return redirect()->route('conferences.index')
            ->with('success', 'Conference created successfully!');
    }

    public function show($slug)
    {
        $conference = Conference::where('slug', $slug)->firstOrFail();
        return view('conferences.show', compact('conference'));
    }

    public function edit($slug)
    {
        $conference = Conference::where('slug', $slug)->firstOrFail();
        return view('conferences.edit', compact('conference'));
    }

    public function update(Request $request, $slug)
    {
        $conference = Conference::where('slug', $slug)->firstOrFail();

        $validated = $request->validate([
            'title' => 'sometimes|string',
            'description' => 'nullable|string',
        ]);

        $conference->update($validated);

        return redirect()->route('conferences.index')
            ->with('success', 'Conference updated successfully!');
    }

    public function destroy($slug)
    {
        $conference = Conference::where('slug', $slug)->firstOrFail();
        $conference->delete();

        return redirect()->route('conferences.index')
            ->with('success', 'Conference deleted successfully!');
    }

    public function showMethod()
    {
        $conference = Conference::all();
        $page = SubpageBanner::where('id', 26)->first();
        return view('conferences-show', compact('conference', 'page'));
    }
}
