<?php

namespace App\Models\Configurations;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Pradesh extends Model implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['pradesh_name'];
    protected $table = 'pradeshes';
    protected $dates = ['deleted_at'];

    protected static $logAttributes = ['pradesh_name'];



    public function district(){
        return $this->hasMany('App\Models\Configurations\District');
    }

}
