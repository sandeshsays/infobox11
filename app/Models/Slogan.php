<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slogan extends Model
{
    use HasFactory;
    protected $table = 'slogans';
    protected $fillable = [
        'name',
        'name_ne',
        'content',
        'content_ne',
        'palika_id',
        'order',
        'status',
    ];
}
