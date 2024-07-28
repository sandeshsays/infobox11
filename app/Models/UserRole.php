<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


class UserRole extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'user_roles';

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'role_id', 
        'menu_id', 
        'allow_index', 
        'allow_add', 
        'allow_edit', 
        'allow_delete', 
        'allow_show'
    ];

    public function roles():BelongsTo
    {
        return $this->belongsTo(Role::class,'role_id');
    }

    public function menu():BelongsTo
    {
        return $this->belongsTo(Menu::class,'menu_id');
    }
}
