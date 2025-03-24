<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VoucherSalePayments extends Model
{
    use HasFactory, SoftDeletes;

    public function paymentMethod(){
        return $this->belongsTo(paymentMethod::class, 'payment_method');
    }
}
