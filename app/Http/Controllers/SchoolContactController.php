<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\SchoolContact;
use Illuminate\Http\Request;

class SchoolContactController extends Controller
{
    public function store(Request $request, $slug)
    {
        $school = School::where('slug', $slug)->firstOrFail();

        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
                'email' => 'required|email|max:255',
                'institution' => 'required|string|max:255',
                'branch' => 'required|string|max:255',
                'message' => 'required|string',
            ]);

            $validated['school_id'] = $school->id;

            SchoolContact::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Your message has been submitted successfully!',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Send validation errors back as JSON
            return response()->json([
                'success' => false,
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            // Catch any unexpected errors
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong! ' . $e->getMessage(),
            ], 500);
        }
    }
}
