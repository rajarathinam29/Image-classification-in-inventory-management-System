<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockTransfer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'stock_transfer';

    public function transferProducts(){
        return $this->hasMany(StockTransferProducts::class, 'transfer_id');
    }

    public function transferType(){
        return $this->belongsTo(StockTransferSource::class, 'transfer_source');
    }

    public function user(){
        return $this->belongsTo(Users::class, 'created_by');
    }
}
