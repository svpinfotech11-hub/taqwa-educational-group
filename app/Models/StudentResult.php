<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentResult extends Model
{
    use HasFactory;


    protected $fillable = [
        'exam_name',
        'exam_year',
        'student_name',
        'roll_no',
        'registration_no',
        'father_name',
        'mother_name',
        'dob',
        'marks',
        'percentage',
        'rank',
        'result_status',
        'photo',
        'pdf_path',
        'certificate_no',
        'issue_date'
    ];
}
