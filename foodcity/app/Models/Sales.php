<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sales extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'sales';

    public function customer(){
        return $this->belongsTo(Customers::class, 'customer_id');
    }

    public function salesProducts(){
        return $this->hasMany(SalesProducts::class, 'sale_id');
    }
}
