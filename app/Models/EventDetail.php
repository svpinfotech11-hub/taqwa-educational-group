<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'image',
        'video',
        'link'
    ];

    public function events()
    {
        return $this->belongsTo(Event::class, 'id');
    }
}
