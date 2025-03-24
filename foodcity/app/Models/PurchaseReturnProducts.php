<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseReturnProducts extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'purchase_return_products';

    public function return(){
        return $this->belongsTo(PurchaseReturn::class, 'purchase_return_id');
    }

    public function product(){
        return $this->belongsTo(Products::class, 'product_id');
    }

    public function company(){
        return $this->belongsTo(Companies::class, 'company_id');
    }

    public function branch(){
        return $this->belongsTo(Branches::class, 'branch_id');
    }
}
