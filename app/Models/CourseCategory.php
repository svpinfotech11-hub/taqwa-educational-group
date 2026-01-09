<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function courses()
    {
        return $this->hasMany(Course::class, 'category_id');
    }
}
