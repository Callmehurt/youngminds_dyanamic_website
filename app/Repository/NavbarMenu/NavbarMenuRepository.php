<?php
/**
 * Created by PhpStorm.
 * User: santosh
 * Date: 3/21/18
 * Time: 5:03 PM
 */

namespace App\Repository\NavbarMenu;


use App\Models\NavbarMenu;
use App\Models\Page;

class NavbarMenuRepository
{

    private $navbarMenuRepository;

    public function __construct(NavbarMenu $navbarMenu)
    {
        $this->navbarMenuRepository = $navbarMenu;
    }

    public function all()
    {
        $navbarMenus = $this->navbarMenuRepository->orderBy('created_at','DESC')->get();
        return $navbarMenus;
    }

    public function findById($id)
    {
        $navbarMenus = $this->navbarMenuRepository->find($id);
        return $navbarMenus;
    }

    public function navParentList(){
        $menus=$this->navbarMenuRepository
            ->select('id','menu_name')
            ->where('parent_id', '=', 0)
            ->orderBy('id','DESC')
            ->get();
        return $menus;
    }

    public function getPage($slug){
        $page = Page::where('slug', '=', $slug)->first();
        return $page;
    }
}