<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseOrderAttachments extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'purchase_order_attachments';

    public function company(){
        return $this->belongsTo(Companies::class, 'company_id');
    }

    public function user(){
        return $this->belongsTo(Users::class, 'created_by');
    }
}
