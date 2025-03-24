<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentTypes extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'payment_types';

    protected $fillable = [
        'type_name',
        'description',
        'company_id',
        'created_by',
    ];
}
