<?php
namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\SubpageBanner;

class StudentController extends Controller
{
    public function index()
    {
        return Student::all();
    }

     public function create()
    {
        $page = SubpageBanner::where('id', 23)->first();
        return view('pages.mbbs-neet-mentor', compact('page'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'fathers_name' => 'required|string|max:255',
            'neet_hall_ticket_number' => 'required|string|unique:students',
            'application_number' => 'required|string|unique:students',
            'neet_marks' => 'required|integer',
            'all_india_rank' => 'required|integer',
            'category_rank_name' => 'required|string',
            'date_of_birth' => 'required|date',
            'email' => 'required|email|unique:students',
            'phone' => 'required|string|max:15',
            'previous_school_name' => 'required|string',
            'rural_urban' => 'required|in:Rural,Urban',
            'medium_till_10th' => 'required|string',
            'curriculum' => 'required|in:State Board,CBSE,ICSE,Others',
            'address' => 'required|string',
            'district' => 'required|string',
            'state' => 'required|string',
            'category_selection' => 'required|string',
            'claiming_article' => 'required|boolean'
        ]);

        $student = Student::create($validated);
        return response()->json($student, 201);
    }

    public function destroy($id)
    {
        Student::destroy($id);
        return response()->json(['message' => 'Deleted successfully']);
    }
}

