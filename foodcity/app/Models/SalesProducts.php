<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesProducts extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'sales_products';

    public function product(){
        return $this->belongsTo(Products::class, 'product_id');
    }

    public function sale(){
        return $this->belongsTo(Sales::class, 'sale_id');
    }
}
