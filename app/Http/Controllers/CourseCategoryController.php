<?php

namespace App\Http\Controllers;

use App\Models\CourseCategory;
use Illuminate\Http\Request;

class CourseCategoryController extends Controller
{
    public function index()
    {
        $categories = CourseCategory::latest()->get();
        return view('course-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('course-categories.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);

        CourseCategory::create($request->only('name', 'description'));

        return redirect()->route('course-categories.index')->with('success', 'Category created successfully!');
    }

    public function edit(CourseCategory $courseCategory)
    {
        return view('course-categories.edit', compact('courseCategory'));
    }

    public function update(Request $request, CourseCategory $courseCategory)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $courseCategory->update($request->only('name', 'description'));
        return redirect()->route('course-categories.index')->with('success', 'Category updated successfully!');
    }

    public function destroy(CourseCategory $courseCategory)
    {
        $courseCategory->delete();
        return redirect()->route('course-categories.index')->with('success', 'Category deleted successfully!');
    }
}

