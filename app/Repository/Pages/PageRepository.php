<?php

namespace App\Repository\Pages;

use App\Models\Page;

class PageRepository{

    private $pages;

    public function __construct(Page $page)
    {
        $this->pages = $page;
    }

    public function all()
    {
        $pages = $this->pages->orderBy('created_at','DESC')->get();
        return $pages;
    }

    public function findById($id)
    {
        $pages = $this->pages->find($id);
        return $pages;
    }

    public function getPage($slug){
        $page = Page::where('slug', '=', $slug)->first();
        return $page;
    }

}

?>