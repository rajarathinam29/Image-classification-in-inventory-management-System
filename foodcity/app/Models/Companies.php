<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Companies extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'companies';

    protected $fillable = [
        'name',
        'registerd_no',
        'start_date',
        'address',
        'telephone_no',
        'email',
        'proprietor_name',
        'status',
    ];
    public function currency(){
        return $this->belongsTo(Currency::class, 'currency_id');
    }
}
