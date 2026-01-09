<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
  protected $fillable = [
        'name',
        'slug',
        'code',
        'address',
        'city',
        'state',
        'phone',
        'email',
        'website',
        'thumbnail',
        'description',
        'status',
    ];

    public function members()
    {
        return $this->hasMany(SchoolMember::class);
    }

}
