<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanySettings extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'company_settings';

    protected $fillable = [
        'company_id','branch_id','setting_name','setting'
    ];
}
