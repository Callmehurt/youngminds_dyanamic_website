<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    protected $fillable = [
        'title', 'content', 'notice_date', 'user_id', 'banner_image'
    ];

    public static function getLastestNews(){
        return $news = DB::table('news')->orderBy('created_at', 'ASC')->limit(6)->get();
    }
}
