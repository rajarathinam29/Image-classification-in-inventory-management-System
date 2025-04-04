<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banks extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'banks';


    public function branches(){
        return $this->hasMany(BankBranches::class, 'bank_id');
    }
}
