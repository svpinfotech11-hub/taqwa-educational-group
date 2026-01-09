<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Conference extends Model
{
    protected $fillable = ['title', 'slug', 'description'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($conference) {
            $conference->slug = Str::slug($conference->title);
        });

        static::updating(function ($conference) {
            if ($conference->isDirty('title')) {
                $conference->slug = Str::slug($conference->title);
            }
        });
    }
}
