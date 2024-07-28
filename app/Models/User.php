<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role()
    {
        return $this->belongsTo(Role::class,'role_id');
    }

    public function allowAdd()
    {
        return $this->hasPermission('allow_add');
    }

    public function allowIndex()
    {
        return $this->hasPermission('allow_index');
    }

    public function allowEdit()
    {
        return $this->hasPermission('allow_edit');
    }

    public function allowDelete()
    {
        return $this->hasPermission('allow_delete');
    }

    public function allowShow()
    {
        return $this->hasPermission('allow_show');
    }

    protected function hasPermission($permission)
    {
        if ($this->role->role_level === 'system_admin') {
            return true;
        }
        $action = app('request')->route()->getAction();
        $controllers = explode('@', class_basename($action['controller']));
        $controller_name = $controllers[0] ?? '';
        $menuInfo = Menu::where('menu_controller',$controller_name)->first();
        $roleId = $this->role_id; // Assumes the user has a 'role_id' field
        if (!$roleId) {
            return false;
        }
        $userRole = UserRole::where('role_id', $roleId)
            ->where('menu_id', $menuInfo->id)
            ->first();

        return $userRole && $userRole->$permission;
    }
}
