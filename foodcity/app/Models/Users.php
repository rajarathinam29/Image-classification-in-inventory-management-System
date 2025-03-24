<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password', 'token'];
    protected $fillable = [
        'title','first_name','last_name','phone_no','email','street','city','state','zip_code','country','role_id','status'
    ];

    public function role(){
        return $this->belongsTo(UserRole::class, 'role_id');
    }

    public function profile(){
        return $this->hasMany(UserProfile::class, 'user_id');
    }
}
