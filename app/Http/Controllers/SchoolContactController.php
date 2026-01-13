<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use App\Models\SchoolContact;
use App\Mail\SchoolEnquiryMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SchoolContactController extends Controller
{
    public function store(Request $request, $slug)
    {
        $school = School::where('slug', $slug)->firstOrFail();

        // ✅ Validation outside try-catch so ValidationException is handled automatically
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'phone'       => 'required|string|max:20',
            'email'       => 'required|email|max:255',
            'institution' => 'required|string|max:255',
            'branch'      => 'required|string|max:255',
            'message'     => 'required|string',
        ]);

        $validated['school_id'] = $school->id;

        try {
            // Save the enquiry
            $enquiry = SchoolContact::create($validated);

            // Send email to admin/school
            Mail::to(config('mail.from.address'))
                ->send(new SchoolEnquiryMail($school, $enquiry));

            // Return success JSON
            return response()->json([
                'success' => true,
                'message' => 'Your message has been submitted successfully!',
            ]);
        } catch (\Exception $e) {
            // Log the exception for debugging
            Log::error('School Contact Form Error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong! Please try again later.',
            ], 500);
        }
    }
}
