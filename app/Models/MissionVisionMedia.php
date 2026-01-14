<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionVisionMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'mission_vision_id',
        'media_type',
        'media_path'
    ];

    public function missionVision()
    {
        return $this->belongsTo(MissionVision::class);
    }
}
