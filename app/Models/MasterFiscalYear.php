<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class MasterFiscalYear extends Model
{
    use HasFactory;
    
    protected $table = 'mst_fiscal_year';
}
