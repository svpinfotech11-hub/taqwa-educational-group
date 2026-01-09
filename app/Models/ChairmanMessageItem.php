<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChairmanMessageItem extends Model
{
    use HasFactory;

    protected $fillable = ['chairman_message_id', 'image', 'description'];
}
