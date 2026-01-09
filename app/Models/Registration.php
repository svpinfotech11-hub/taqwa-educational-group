<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

       protected $fillable = [
        'category_id', 
        'registration_id', 
        'name', 
        'email', 
        'phone'
    ];

    // Relationship to RegistrationCategory
    public function category()
    {
        return $this->belongsTo(RegistrationCategory::class);
    }
}
