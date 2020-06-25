<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = "role_user";
    protected $fillable = ['role_id','user_id'];
}