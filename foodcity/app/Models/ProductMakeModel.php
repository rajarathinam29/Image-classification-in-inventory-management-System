<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductMakeModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'product_make_model';

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function makeModel(){
        return $this->belongsTo(MakeModel::class, 'make_model_id');
    }
}
