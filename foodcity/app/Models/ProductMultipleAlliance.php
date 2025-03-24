<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductMultipleAlliance extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'product_multiple_alliance';

    public function type(){
        return $this->belongsTo(ProductUnitTypes::class, 'units_type');
    }
    
    public function product(){
        return $this->belongsTo(products::class, 'product_id');
    }

    public function scopeSearch($query, $search){
        $columns = ['barcode'];
        
        foreach ($columns as $column) {
            $query->orWhere( $column, 'like', "%{$search}%");
        }
    
        return $query;
    }
}
