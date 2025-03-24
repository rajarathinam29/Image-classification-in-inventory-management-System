<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseProducts extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'purchased_products';

    public function purchase(){
        return $this->belongsTo(Purchase::class, 'purchase_id');
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
