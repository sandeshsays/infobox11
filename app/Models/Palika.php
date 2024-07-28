<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Palika extends Model
{
    use HasFactory;
    protected $table = 'palikas';
    protected $fillable = [
        'name',
        'name_ne',
        'code',
        'status',
    ];
}
