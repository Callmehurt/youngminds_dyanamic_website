<?php

namespace App\Models\Configurations;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;


class FiscalYear extends Model implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    protected $fillable=['fy_start_date','fy_start_date_localized','fy_end_date',
        'fy_end_date_localized','fy_status','fy_name'];
    protected $dates = ['deleted_at'];
    
    protected static $logAttributes = ['fy_name','fy_start_date','fy_end_date'];

}
