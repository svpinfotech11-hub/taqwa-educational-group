<?php

namespace App\Http\Controllers;

use App\Models\TaxiBooking;
use Illuminate\Http\Request;
use App\Models\SubpageBanner;

class TaxiBookingController extends Controller
{
    public function index()
    {
        $page = SubpageBanner::where('id', 12)->first();
        return view('pages.taxi-booking', compact('page'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'admission_number' => 'required|string|max:100',
            'class' => 'required|string|max:100',
            'parent_mobile' => 'required|digits:10',
            'parent_email' => 'nullable|email',
            'booking_date' => 'required|date',
            'number_of_persons' => 'required|integer|min:1',
        ]);

        TaxiBooking::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Taxi booking submitted successfully!'
        ]);
    }
}
