<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

     protected $fillable = [
        'full_name',
        'fathers_name',
        'neet_hall_ticket_number',
        'application_number',
        'neet_marks',
        'all_india_rank',
        'category_rank_name',
        'date_of_birth',
        'email',
        'phone',
        'previous_school_name',
        'rural_urban',
        'medium_till_10th',
        'curriculum',
        'address',
        'district',
        'state',
        'category_selection',
        'claiming_article'
    ];
}
