<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseOrder extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'purchase_order';

    public function suppliers(){
        return $this->belongsTo(Suppliers::class, 'suppliers_id');
    }

    public function wip(){
        return $this->belongsTo(Wip::class, 'wip_id');
    }

    public function company(){
        return $this->belongsTo(Companies::class, 'company_id');
    }

    public function branch(){
        return $this->belongsTo(Branches::class, 'branch_id');
    }

    public function purchaseProducts(){
        return $this->hasMany(PurchaseOrderProducts::class, 'order_id');
    }
}
