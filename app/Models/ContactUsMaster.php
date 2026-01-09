<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUsMaster extends Model
{
    use HasFactory;

     protected $fillable = [
        'address',
        'emails',
        'phones',
        'whatsapp_no',
        'map_link'
    ];

    protected $casts = [
        'emails' => 'array',
        'phones' => 'array',
    ];
}
