<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchasePayments extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'purchase_payments';

    public function supplier(){
        return $this->belongsTo(Suppliers::class, 'supplier_id');
    }

    public function paymentMethod(){
        return $this->belongsTo(PaymentMethod::class, 'payment_method');
    }

    public function expenses(){
        return $this->hasMany(Expenses::class, 'purchase_payment_id');
    }
}
