<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\NeetDomicile;
use Illuminate\Http\Request;

class NeetDomicileController extends Controller
{
    public function index()
    {
        $neetStates = NeetDomicile::latest()->get();
        return view('neet-domiciles.index', compact('neetStates'));
    }

    public function create()
    {
        return view('neet-domiciles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'state_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        NeetDomicile::create($request->all());

        return redirect()->route('neet-domiciles.index')->with('success', 'NEET Domicile Criteria added.');
    }

    public function edit(NeetDomicile $neet_domicile)
    {
        return view('neet-domiciles.edit', compact('neet_domicile'));
    }

    public function update(Request $request, NeetDomicile $neet_domicile)
    {
        $request->validate([
            'state_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $neet_domicile->update($request->all());

        return redirect()->route('neet-domiciles.index')->with('success', 'NEET Domicile Criteria updated.');
    }

    public function destroy(NeetDomicile $neet_domicile)
    {
        $neet_domicile->delete();
        return back()->with('success', 'Deleted successfully.');
    }
}
