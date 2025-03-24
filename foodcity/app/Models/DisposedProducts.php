<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DisposedProducts extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'disposed_products';

    public function product(){
        return $this->belongsTo(Products::class, 'product_id');
    }

    public function type(){
        return $this->belongsTo(DisposedType::class, 'disposed_type');
    }

    public function company(){
        return $this->belongsTo(Companies::class, 'company_id');
    }

    public function branch(){
        return $this->belongsTo(Branches::class, 'branch_id');
    }

    public function user(){
        return $this->belongsTo(Users::class, 'created_by');
    }
}
