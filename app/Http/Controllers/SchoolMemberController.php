<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\SchoolMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchoolMemberController extends Controller
{
    public function index()
    {
        $members = SchoolMember::with('school')
            ->where('created_by', Auth::id())
            ->latest()
            ->paginate(10);
        return view('school-members.index', compact('members'));
    }

    public function create()
    {
        $schools = School::orderBy('name', 'asc')->get();
        return view('school-members.create', compact('schools'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'school_id' => 'required|exists:schools,id',
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->move('school_members', $filename);
            $data['image'] = $filename;
        }

        $data['created_by'] = Auth::id();

        SchoolMember::create($data);

        return redirect()->route('school-members.index')->with('success', 'School member added successfully!');
    }

    public function edit($id)
    {

        $record = SchoolMember::findOrFail($id);
        if ($record->created_by !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        $schools = School::orderBy('name', 'asc')->get();
        return view('school-members.edit', compact('schools', 'record'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'school_id' => 'required|exists:schools,id',
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|max:2048',
        ]);

        $schoolMember = SchoolMember::findOrFail($id);
        if ($schoolMember->created_by !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($schoolMember->image && file_exists('school_members/' . basename($schoolMember->image))) {
                unlink('school_members/' . basename($schoolMember->image));
            }
            $filename = time() . '.' . $request->image->extension();
            $request->image->move('school_members', $filename);
            $data['image'] = $filename;
        }

        $schoolMember->update($data);

        return redirect()->route('school-members.index')->with('success', 'School member updated successfully!');
    }

    public function destroy($id)
    {
        $schoolMember = SchoolMember::findOrFail($id);
        if ($schoolMember->created_by !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        if ($schoolMember->image && file_exists('school_members/' . $schoolMember->image)) {
            unlink('school_members/' . $schoolMember->image);
        }
        $schoolMember->delete();

        return redirect()->route('school-members.index')->with('success', 'School member deleted successfully!');
    }
}
