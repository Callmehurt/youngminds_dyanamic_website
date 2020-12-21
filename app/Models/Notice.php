<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = [
        'title', 'content', 'notice_file', 'notice_banner', 'notice_date', 'user_id'
    ];
}
