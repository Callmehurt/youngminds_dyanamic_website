<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Page extends Model
{
    use Sluggable;
    protected $fillable = [
        'added_by_user', 'page_name', 'slug', 'page_content', 'page_title'
    ];

    public function sluggable(){
        return [
            'slug' => [
                'source' => 'page_name'
            ]
        ];
    }
}
