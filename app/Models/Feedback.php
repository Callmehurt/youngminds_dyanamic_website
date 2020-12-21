<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Feedback extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $dates = ['deleted_at'];


    protected $fillable = ['title', 'url', 'description', 'attachment','date','user_id','category'];

    protected static $logAttributes = ['title', 'url', 'description', 'attachment','date','user_id','category'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
