<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Products extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        'product_name',
        'units_in_case',
        'units_type',
        'cost_price',
        'sale_price',
        'mrp',
        'vat',
        'product_status',
        'company_id',
        'productcategory_id',
        'product_company_id',
        'product_brand_id',
        'created_by',
    ];

    public function type(){
        return $this->belongsTo(ProductUnitTypes::class, 'units_type');
    }

    public function category(){
        return $this->belongsTo(ProductCategories::class, 'productcategory_id');
    }
    public function productcompanies(){
        return $this->belongsTo(ProductCompanies::class, 'product_company_id');
    }
    public function productbrands(){
        return $this->belongsTo(ProductBrands::class, 'product_brand_id');
    }

    public function productMakeModel(){
        return $this->hasMany(ProductMakeModel::class, 'product_id');
    }

    public function company(){
        return $this->belongsTo(Companies::class, 'company_id');
    }


    public function scopeSearch($query, $search){
        $columns = ['bar_code','product_name', 'part_no'];
        
        foreach ($columns as $column) {
            $query->orWhere( $column, 'like', "%{$search}%");
        }
    
        return $query;
    }
}
