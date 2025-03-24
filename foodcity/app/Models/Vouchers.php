<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vouchers extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'vouchers';

    // protected $fillable = [
    //     'voucher_id',
    //     'amount',
    //     'expirydate',
    //     'vouchers_status',
    //     'created_by',

    // ];
}
