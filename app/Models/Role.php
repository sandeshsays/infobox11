<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Role extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'roles';

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'client_id',
        'name_en',
        'name_np',
        'details',
        'status',
        'role_level',
        'role_module',
        'created_by',
        'updated_by',
        'deleted_by',
        'ward_no',
        'branch_id',
        'is_system_admin_role',
        'is_client_role',
        'is_branch_role',
        'is_ward_role',
    ];
    

}
