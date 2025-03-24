<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VoucherPayments extends Model
{
    use HasFactory, SoftDeletes;

    public function revenue(){
        return $this->belongsTo(Revenues::class, 'revenue_id');
    }
}
