<?php

namespace App\Models\Configurations;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;


class Country extends Model  implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $fillable = ['country_name','short_name','status'];
    protected $table = 'countries';

    protected $dates = ['deleted_at'];

    protected static $logAttributes = ['country_name'];
}
