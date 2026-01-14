<?php

namespace App\Http\Controllers;

use App\Models\HomeAbout;
use Illuminate\Http\Request;

class HomeAboutController extends Controller
{
    public function index()
    {
        $homeabouts = HomeAbout::all();
        return view('homeabout.index', compact('homeabouts'));
    }

    public function create()
    {
        return view('homeabout.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        HomeAbout::create($request->all());

        return redirect()->route('homeabout.index')->with('success', 'Home About created successfully.');
    }

    public function edit(HomeAbout $homeabout)
    {
        return view('homeabout.edit', compact('homeabout'));
    }

    public function update(Request $request, HomeAbout $homeabout)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $homeabout->update($request->all());

        return redirect()->route('homeabout.index')->with('success', 'Home About updated successfully.');
    }

    public function destroy(HomeAbout $homeabout)
    {
        $homeabout->delete();
        return redirect()->route('homeabout.index')->with('success', 'Home About deleted successfully.');
    }
}
