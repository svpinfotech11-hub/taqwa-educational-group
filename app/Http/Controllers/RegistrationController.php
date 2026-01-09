<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Registration;
use Illuminate\Http\Request;
use App\Models\SubpageBanner;
use App\Models\RegistrationCategory;

class RegistrationController extends Controller
{
    // Show the registration form for a specific category
    public function showForm($slug)
    {
        $category = RegistrationCategory::where('slug', $slug)->first();

        if (!$category) {
            return redirect()->route('home')->with('error', 'Category not found!');
        }

        $regId = 'REG-' . strtoupper(Str::random(6));  // Generate a unique registration ID
        $page = SubpageBanner::where('id', 22)->first();
        return view('registration.form', compact('category', 'regId', 'page'));
    }

    // Handle form submission
    public function submitForm(Request $request)
    {
        // Validate the incoming form data
        $request->validate([
            'category_id' => 'required|exists:registration_categories,id',  // Ensure category exists
            'registration_id' => 'required|unique:registrations',  // Ensure registration ID is unique
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:registrations',
            'phone' => 'required|string|max:20',
        ]);

        // Create the registration record
        $registration = Registration::create([
            'category_id' => $request->category_id,
            'registration_id' => $request->registration_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        // Return JSON response for AJAX
        return response()->json([
            'status' => 'success',
            'message' => 'Registration Successful!',
            'data' => $registration
        ]);
    }
}
