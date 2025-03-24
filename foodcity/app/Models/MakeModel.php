<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MakeModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'make_model';
}
