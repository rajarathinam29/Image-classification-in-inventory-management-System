<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockCountProducts extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'stock_count_products';

    public function product(){
        return $this->belongsTo(Products::class, 'product_id');
    }

    public function stockCount(){
        return $this->belongsTo(stockCount::class, 'stock_count_id');
    }
}
