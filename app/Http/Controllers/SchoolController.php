<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Support\Str;
use App\Models\SchoolMember;
use Illuminate\Http\Request;
use App\Models\SubpageBanner;

class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::latest()->paginate(10);
        return view('schools-master.index', compact('schools'));
    }

    public function create()
    {
        return view('schools-master.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail'   => 'nullable|max:2048',
        ]);

        $data = $request->except('thumbnail');
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('schools', $filename);
            $data['thumbnail'] = $filename;
        }

        School::create($data);

        return redirect()->route('schools-master.index')->with('success', 'School created successfully.');
    }

    public function edit(School $school)
    {
        return view('schools-master.edit', compact('school'));
    }

    public function update(Request $request, School $school)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        $data['slug'] = Str::slug($request->name);
        $data = $request->except('thumbnail');

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('schools', $filename);
            $data['thumbnail'] = $filename;
        }

        $school->update($data);

        return redirect()->route('schools-master.index')->with('success', 'School updated successfully.');
    }

    public function destroy(School $school)
    {
        if ($school->thumbnail && file_exists('schools/' . $school->thumbnail)) {
            unlink('schools/' . $school->thumbnail);
        }

        $school->delete();

        return redirect()->route('schools-master.index')->with('success', 'School deleted successfully.');
    }

    public function show($slug)
    {
        // Get school details by slug
        $school = School::where('slug', $slug)->firstOrFail();
        // Get ALL members related to that school (no auth restriction)
        $members = SchoolMember::where('school_id', $school->id)
            ->latest()
            ->paginate(8);

            // dd($members);

        $page = SubpageBanner::where('id', 5)->first();

        return view('pages.show', compact('school', 'members', 'page'));
    }

   public function detailPage($id)
    {
        $member = SchoolMember::findOrFail($id);

        // Get the school of this member
        $school = School::find($member->school_id);

        $page = SubpageBanner::where('id', 6)->first();

        return view('pages.detail-page', compact('member', 'school', 'page'));
    }

}
