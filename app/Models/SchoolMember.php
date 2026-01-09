<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'name',
        'title',
        'description',
        'image',
        'created_by'
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function creator()
{
    return $this->belongsTo(User::class, 'created_by');
}
}
