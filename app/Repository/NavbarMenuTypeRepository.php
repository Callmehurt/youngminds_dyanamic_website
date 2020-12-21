<?php
/**
 * Created by PhpStorm.
 * User: santosh
 * Date: 3/21/18
 * Time: 5:03 PM
 */

namespace App\Repository;


use App\Models\NavbarMenuType;

class NavbarMenuTypeRepository
{

    private $navbarMenuType;

    public function __construct(NavbarMenuType $navbarMenuType)
    {
        $this->navbarMenuType = $navbarMenuType;
    }

    public function all()
    {
        $navbarMenuTypes = $this->navbarMenuType->orderBy('menu_type_name','ASC')->get();
        return $navbarMenuTypes;
    }
    public function findById($id)
    {
        $navbarMenuTypes = $this->navbarMenuType->find($id);
        return $navbarMenuTypes;
    }

    public function parentList(){
        $menuList=$this->navbarMenuType
            ->select('id','menu_type_name')
            ->orderBy('menu_type_name','ASC')
            ->get();
        return $menuList;
    }
}