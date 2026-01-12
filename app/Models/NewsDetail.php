<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'news_id',
        'image',
        'video',
        'link'
    ];

    public function news()
    {
        return $this->belongsTo(News::class, 'id');
    }
}
