<?php

namespace App\Models\Logs;

use Illuminate\Database\Eloquent\Model;

class LoginFails extends Model
{
    protected $fillable = ['user_name','fail_password','log_in_ip','log_in_device'];
}
