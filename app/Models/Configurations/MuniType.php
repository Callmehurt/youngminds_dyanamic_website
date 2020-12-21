<?php

namespace App\Models\Configurations;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class MuniType extends Model implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['muni_type_name'];
    protected $table = 'muni_types';
    protected $dates = ['deleted_at'];

    protected static $logAttributes = ['muni_type_name'];

    public function municipality(){
        return $this->hasMany('App\Models\Configurations\Municipality');
    }
}
