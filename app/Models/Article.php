<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_ne',
        'content',
        'content_ne',
        'category_id',
        'sub_category_id',
        'palika_id',
        'cover_photo',
        'status',
        'order',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
