<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockTransferProducts extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'stock_transfer_products';

    public function transfer(){
        return $this->belongsTo(StockTransfer::class, 'transfer_id');
    }

    public function product(){
        return $this->belongsTo(Products::class, 'product_id');
    }

    public function user(){
        return $this->belongsTo(Users::class, 'created_by');
    }

    public function company(){
        return $this->belongsTo(Companies::class, 'company_id');
    }

    public function branch(){
        return $this->belongsTo(Branches::class, 'branch_id');
    }
}
