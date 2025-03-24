<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admins extends Model
{
    use HasFactory;

    protected $hidden = ['password', 'token', 'permissions'];
    protected $fillable = [
        'title','first_name','last_name','phone_no','email','street','city','state','zip_code','country','status'
    ];
}
