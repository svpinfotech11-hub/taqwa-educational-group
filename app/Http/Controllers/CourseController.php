<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseCategory;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('category')->latest()->get();
        return view('courses-master.index', compact('courses'));
    }

    public function create()
    {
        $categories = CourseCategory::all();
        return view('courses-master.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail_url' => 'nullable|max:2048',
        ]);
        $imagePath = null;

        if ($request->hasFile('thumbnail_url')) {
            $image = $request->file('thumbnail_url');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move('courses', $imageName);
            // store relative path (optional)
            $imagePath =  $imageName;
        }

        Course::create([
            'category_id' => $request->category_id,
            'name'        => $request->name,
            'code'        => $request->code,
            'description' => $request->description,
            'duration'    => $request->duration,
            'start_date'  => $request->start_date,
            'end_date'    => $request->end_date,
            'fee'         => $request->fee,
            'discount'    => $request->discount,
            'course_status' => $request->course_status ?? 'active',
            'mode'        => $request->mode,
            'thumbnail_url' => $imagePath,
        ]);

        return redirect()->route('courses-master.index')->with('success', 'Course created successfully!');
    }

    public function edit(Course $course)
    {
        $categories = CourseCategory::all();
        // dd($course);
        return view('courses-master.edit', compact('course', 'categories'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail_url' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

      $imagePath = $course->thumbnail_url; // keep the existing image by default

        // If a new image is uploaded, replace the old one
        if ($request->hasFile('thumbnail_url')) {
            // Delete old image if it exists
            if ($course->thumbnail_url && file_exists('courses/' . basename($course->thumbnail_url))) {
                unlink('courses/' . basename($course->thumbnail_url));
            }

            // Upload new image
            $image = $request->file('thumbnail_url');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move('courses', $imageName);

            // Store relative path
            $imagePath = $imageName;
        }

        $course->update([
            'category_id' => $request->category_id,
            'name'        => $request->name,
            'code'        => $request->code,
            'description' => $request->description,
            'duration'    => $request->duration,
            'start_date'  => $request->start_date,
            'end_date'    => $request->end_date,
            'fee'         => $request->fee,
            'discount'    => $request->discount,
            'course_status' => $request->course_status,
            'mode'        => $request->mode,
            'thumbnail_url' => $imagePath,
        ]);

        return redirect()->route('courses-master.index')->with('success', 'Course updated successfully!');
    }

    public function destroy(Course $course)
    {
         if ($course->thumbnail_url && file_exists('courses/' . basename($course->thumbnail_url))) {
                unlink('courses/' . basename($course->thumbnail_url));
            }
        $course->delete();
        return redirect()->route('courses-master.index')->with('success', 'Course deleted successfully!');
    }
}
