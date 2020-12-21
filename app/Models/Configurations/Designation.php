<?php

namespace App\Models\Configurations;

use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Designation extends Model implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    protected $fillable=['designation_name','designation_short_name'];
    protected $dates = ['deleted_at'];


    protected static $logAttributes = ['designation_name', 'designation_short_name'];

    public function users(){
        return $this->hasMany('App\User');
    }
}
