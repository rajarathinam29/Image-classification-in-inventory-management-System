<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VoucherSales extends Model
{
    use HasFactory, SoftDeletes;

    public function customer(){
        return $this->belongsTo(Customers::class, 'customer_id');
    }

    public function payment(){
        return $this->hasMany(VoucherSalePayments::class, 'voucher_sale_id');
    }
}
