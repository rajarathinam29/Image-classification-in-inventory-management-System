<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesPayments extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sales_payments';

    public function customer(){
        return $this->belongsTo(Customers::class, 'customer_id');
    }

    public function paymentMethod(){
        return $this->belongsTo(PaymentMethod::class, 'payment_method');
    }

    public function revenue(){
        return $this->hasMany(Revenues::class, 'sales_payment_id');
    }
}
