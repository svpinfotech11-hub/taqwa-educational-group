<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Result extends Model
{
    use HasFactory;

     protected $fillable = [
        'title',
        'slug',
        'pdf_path'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($result) {
            $result->slug = Str::slug($result->title);
        });

        static::updating(function ($result) {
            if ($result->isDirty('title')) {
                $result->slug = Str::slug($result->title);
            }
        });
    }
}
