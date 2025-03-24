<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expenses extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'expenses';

    protected $fillable = [
        'date',
        'payment_type',
        'type_id',
        'payment_method',
        'description',
        'amount',
        'created_by',

    ];

    public function paymentMethod(){
        return $this->belongsTo(PaymentMethod::class, 'payment_method');
    }

    public function paymentType(){
        return $this->belongsTo(PaymentTypes::class, 'payment_type');
    }
}
