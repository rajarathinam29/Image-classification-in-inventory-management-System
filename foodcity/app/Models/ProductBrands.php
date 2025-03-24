<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductBrands extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'product_brands';

    protected $fillable = [
        'brand_name',
        'description',
        'brands_status',
        'created_by',

    ];
}
