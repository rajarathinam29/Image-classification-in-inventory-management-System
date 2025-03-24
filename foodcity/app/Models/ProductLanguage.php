<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductLanguage extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'product_language';

    protected $fillable = [
        'product_name',
    ];

    public function product(){
        return $this->belongsTo(Products::class, 'product_id');
    }

    public function languages(){
        return $this->belongsTo(Languages::class, 'language_id');
    }

}
