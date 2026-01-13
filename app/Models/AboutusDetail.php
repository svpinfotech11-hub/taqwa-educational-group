<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutusDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'aboutus_id',
        'image',
        'video',
        'link'
    ];

    public function about()
    {
        return $this->belongsTo(About::class, 'id');
    }
}
