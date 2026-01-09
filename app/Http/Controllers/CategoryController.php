<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\RegistrationCategory;
use Illuminate\Http\Request; // Use this for dependency injection

class CategoryController extends Controller
{
    public function show()
    {
        $categories = RegistrationCategory::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        $categories = RegistrationCategory::all();
        return view('admin.category.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'title' => 'required'
        ]);

        // Create new category using the validated data
        RegistrationCategory::create([
            'title' => $request->title,
            'slug'  => Str::slug($request->title),
        ]);

        // Redirect back with success message
        return back()->with('success', 'Category Added');
    }
}
