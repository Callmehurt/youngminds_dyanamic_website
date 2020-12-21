<?php

namespace App\Models\Roles;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserGroup extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable=['group_name','group_details'];
    public function users(){
        return $this->hasMany('App\User');
    }
    public function user_roles(){
        return $this->hasMany('App\Models\Configurations\UserRole');
    }
}
