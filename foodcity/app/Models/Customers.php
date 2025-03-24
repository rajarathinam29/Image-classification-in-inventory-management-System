<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customers extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'customers';

    protected $fillable = [
        'title',
        'first_name',
        'last_name',
        'phone_no',
        'alternate_phone_no',
        'email',
        'building_no',
        'street',
        'city',
        'state',
        'country',
        'zipcode',
        'tax_no',
        'opening_balance',
        'pay_period',
        'pay_term',
        'credit_limit',
        'company_id',
        'created_by',
    ];

    public function company(){
        return $this->belongsTo(Companies::class, 'company_id');
    }

    public function user(){
        return $this->belongsTo(Users::class, 'created_by');
    }

    public function scopeSearch($query, $search){
        $columns = ['first_name','last_name', 'phone_no'];
        
        foreach ($columns as $column) {
            $query->orWhere( $column, 'like', "%{$search}%");
        }
    
        return $query;
    }
}
