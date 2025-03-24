<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'purchase';
    protected $fillable = [
        'date',
        'invoice_no',
        'total_amount',
        'discount',
        'cost',
        'purchase_status',
        'company_id',
        'branch_id',
        'suppliers_id',
        'created_by',
    ];
    public function suppliers(){
        return $this->belongsTo(Suppliers::class, 'suppliers_id');
    }

    public function company(){
        return $this->belongsTo(Companies::class, 'company_id');
    }

    public function branch(){
        return $this->belongsTo(Branches::class, 'branch_id');
    }

    public function purchaseProducts(){
        return $this->hasMany(PurchaseProducts::class, 'purchase_id');
    }
}
