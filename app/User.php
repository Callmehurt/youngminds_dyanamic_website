<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use Notifiable;
    protected $dates = ['deleted_at'];
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'designation_id','user_group_id', 'name', 'email', 'password',
        'user_image', 'user_status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function designation(){
        return $this->belongsTo('App\Models\Configurations\Designation','designation_id','id');
    }

    public function user_group(){
        return $this->belongsTo('App\Models\Configurations\UserGroup','user_group_id','id');
    }
}
