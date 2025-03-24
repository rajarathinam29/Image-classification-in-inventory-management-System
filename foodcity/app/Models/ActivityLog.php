<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActivityLog extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'activity_log';

    protected $fillable = [
        'date_time',
        'mudule',
        'mudule_id',
        'logs',
        'company_id',
        'branch_id',
        'created_by',
    ];

    public function user(){
        return $this->belongsTo(Users::class, 'created_by');
    }

    public function company(){
        return $this->belongsTo(Companies::class, 'company_id');
    }

    public function branch(){
        return $this->belongsTo(Branches::class, 'branch_id');
    }
}
