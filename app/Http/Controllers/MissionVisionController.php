<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MissionVision;
use Illuminate\Http\Request;

class MissionVisionController extends Controller
{
    public function index()
    {
        $sections = MissionVision::all();
        return view('mission-vision.index', compact('sections'));
    }

    
    public function show()
    {
        $sections = MissionVision::all();
        return view('mission-vision.index', compact('sections'));
    }

    public function create()
    {
        return view('mission-vision.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'type' => 'required|in:mission,vision,objective',
            'title' => 'nullable|string|max:255',
            'description' => 'required|string',
        ]);

        MissionVision::create($request->all());

        return redirect()->route('mission-vision.index')->with('success', 'Section added successfully.');
    }

    public function edit($id)
    {
        $section = MissionVision::findOrFail($id);
        return view('mission-vision.edit', compact('section'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|in:mission,vision,objective',
            'title' => 'nullable|string|max:255',
            'description' => 'required|string',
        ]);

        $section = MissionVision::findOrFail($id);
        $section->update($request->all());

        return redirect()->route('mission-vision.index')->with('success', 'Section updated successfully.');
    }

    public function destroy($id)
    {
        $section = MissionVision::findOrFail($id);
        $section->delete();

        return redirect()->route('mission-vision.index')->with('success', 'Section deleted successfully.');
    }
}
