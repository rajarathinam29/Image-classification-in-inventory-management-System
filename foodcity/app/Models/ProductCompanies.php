<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCompanies extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'product_companies';

    protected $fillable = [
        'company_name',
        'description',
        'companies_status',
        'created_by',

    ];
}
