<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NavbarMenu extends Model
{
    protected $fillable = [
        'parent_id', 'menu_name', 'menu_type_id', 'site_url', 'module_url', 'display_order', 'status', 'slug'
    ];

    public static function getMenu($id)
    {

        return $result = DB::table('navbar_menus')->select('navbar_menus.*')
            ->where('parent_id', $id)
            ->where('status', 1)
            ->orderBy('display_order', 'ASC')
            ->get();

    }

    public static function getMenus()
    {
        return $result = DB::table('navbar_menus')->select('navbar_menus.*')
            ->where('parent_id', 0)
            ->where('status', 1)
            ->orderBy('display_order', 'ASC')
            ->get();
    }
}
