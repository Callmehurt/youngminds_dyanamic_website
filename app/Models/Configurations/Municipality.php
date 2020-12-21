<?php

namespace App\Models\Configurations;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Municipality extends Model implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    protected $fillable=['muni_type_id','district_id','muni_code','muni_name','muni_name_en'];
    protected $table = 'municipalities';
    protected $dates = ['deleted_at'];

    protected static $logAttributes = ['muni_code','muni_name'];


    public function district(){
        return $this->belongsTo('App\Models\Configurations\District','district_id','id');
    }

    public function muniType(){
        return $this->belongsTo('App\Models\Configurations\MuniType','muni_type_id','id');
    }
}
