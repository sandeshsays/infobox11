<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SystemSetting extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'system_settings';


    protected $fillable = [
        'app_name',
        'app_name_np',
        'app_short_name',
        'app_short_name_np',
        'app_logo',
        'login_attempt_required',
        'login_attempt_limit',
        'login_captcha_required',
        'forget_password_required',
        'login_title',
        'login_title_np',
        'session_expire_time',
        'api_key_expire_time',
        'client_id',
        'created_by',
        'updated_by',
        'deleted_by',
    ];



}
