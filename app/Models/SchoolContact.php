<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolContact extends Model
{
    use HasFactory;

     protected $fillable = [
        'school_id',
        'name',
        'phone',
        'email',
        'institution',
        'branch',
        'message',
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
