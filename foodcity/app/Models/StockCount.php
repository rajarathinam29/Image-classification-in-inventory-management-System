<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockCount extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'stock_count';

    public function countProducts(){
        return $this->hasMany(StockCountProducts::class, 'stock_count_id');
    }

    public function user(){
        return $this->belongsTo(Users::class, 'created_by');
    }
}
