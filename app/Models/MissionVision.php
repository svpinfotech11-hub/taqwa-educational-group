<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionVision extends Model
{
    use HasFactory;

        protected $table = 'missions_visions';
      protected $fillable = ['type', 'title', 'description'];

      public function media()
      {
          return $this->hasMany(MissionVisionMedia::class);
      }
}
