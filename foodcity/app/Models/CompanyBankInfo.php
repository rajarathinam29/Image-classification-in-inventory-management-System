<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyBankInfo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'company_bank_info';

    public function bank(){
        return $this->belongsTo(Banks::class, 'bank_id');
    }

    public function bankBranch(){
        return $this->belongsTo(BankBranches::class, 'bank_branch_id');
    }
}
