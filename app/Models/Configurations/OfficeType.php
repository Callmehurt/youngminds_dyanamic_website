<?php

namespace App\Models\Configurations;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class OfficeType extends Model implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['office_type_name'];
    protected $dates = ['deleted_at'];

    protected static $logAttributes = ['office_type_name'];

    public function office(){
        return $this->hasMany('App\Models\Configurations\Office');
    }
}
