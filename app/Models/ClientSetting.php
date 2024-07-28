<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


class ClientSetting extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'client_settings';

    protected $fillable =
     [
         'client_id',
         'setting_code',
         'value',
         'status',
     ];

    public function master_setting(): BelongsTo
    {
        return $this->belongsTo(MasterSetting::class, 'setting_code', 'code');
    }

    // public function client(): BelongsTo
    // {
    //     return $this->belongsTo(AppClient::class, 'client_id');
    // }

}
