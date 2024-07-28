<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'menus';

    protected $dates = ['deleted_at'];

    protected $fillable =
        [
            'parent_id',
            'menu_name',
            'menu_name_np',
            'menu_controller',
            'menu_link',
            'menu_css',
            'menu_icon',
            'menu_status',
            'menu_order',
            'action_module_status',
            'menu_module',
        ];

    public $timestamps = false;

    public function children(): HasMany
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Menu::class, 'parent_id')->where('parent_id', 0)->with('parent');
    }

  

   
}
