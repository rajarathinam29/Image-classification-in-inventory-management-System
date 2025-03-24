<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Suppliers extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'suppliers';

    protected $fillable = [
        'company_name',
        'dealer_name',
        'phone_no',
        'email',
        'address',
        'tax_no',
        'opening_balance',
        'pay_period',
        'pay_term',
        'credit_limit',
        'suppliers_status',
        'created_by',

    ];
}
