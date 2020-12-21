<?php

namespace App\Models\Logs;

use Illuminate\Database\Eloquent\Model;

class LoginLogs extends Model
{
    protected $fillable = ['user_id','log_in_date','log_in_device','log_in_ip'];


    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
}
