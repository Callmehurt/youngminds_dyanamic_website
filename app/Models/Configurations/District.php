<?php

namespace App\Models\Configurations;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class District extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;


    protected $fillable=['pradesh_id','district_code','nepali_name','english_name'];
    protected $table = 'districts';
    protected $dates = ['deleted_at'];
    protected static $logAttributes = ['district_code', 'nepali_name'];

    public function pradesh(){
        return $this->belongsTo('App\Models\Configurations\Pradesh','pradesh_id','id');
    }

    public function municipality(){
        return $this->hasMany('App\Models\Configurations\Municipality');
    }

    public function office(){
        return $this->hasMany('App\Models\Configurations\Office');
    }
}
