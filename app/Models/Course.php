<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

       protected $fillable = [
        'category_id',
        'name',
        'code',
        'description',
        'duration',
        'start_date',
        'end_date',
        'fee',
        'discount',
        'course_status',
        'mode',
        'thumbnail_url',
    ];

    public function category()
    {
        return $this->belongsTo(CourseCategory::class, 'category_id');
    }
}
