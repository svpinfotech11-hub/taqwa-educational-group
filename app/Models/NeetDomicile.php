<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NeetDomicile extends Model
{
    use HasFactory;

    
    protected $fillable = ['state_name', 'slug', 'title', 'description'];

    // Automatically generate slug
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->state_name);
        });
    }
}
