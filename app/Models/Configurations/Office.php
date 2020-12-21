<?php

namespace App\Models\Configurations;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Office extends Model implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['office_type_id','parent_id','district_id','office_code','office_name','office_path','office_status'];
    protected $dates = ['deleted_at'];

    protected static $logAttributes = ['office_code','office_name'];

    public function officeType(){
        return $this->belongsTo('App\Models\Configurations\OfficeType');
    }

    public function district(){
        return $this->belongsTo('App\Models\Configurations\District');
    }
}
