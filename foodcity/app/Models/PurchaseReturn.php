<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseReturn extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'purchase_return';

    public function suppliers(){
        return $this->belongsTo(Suppliers::class, 'suppliers_id');
    }

    public function company(){
        return $this->belongsTo(Companies::class, 'company_id');
    }

    public function branch(){
        return $this->belongsTo(Branches::class, 'branch_id');
    }

    public function returnProducts(){
        return $this->hasMany(PurchaseReturnProducts::class, 'purchase_return_id');
    }
}
