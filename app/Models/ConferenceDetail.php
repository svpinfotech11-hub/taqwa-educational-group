<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConferenceDetail extends Model
{
    use HasFactory;

     protected $fillable = [
        'conference_id',
        'title',
        'pdfs',
        'video_links',
    ];

    protected $casts = [
        'pdfs' => 'array',
        'video_links' => 'array',
    ];
}
