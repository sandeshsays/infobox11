<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class MasterSetting extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'master_settings';

    protected $dates = ['deleted_at'];
}
