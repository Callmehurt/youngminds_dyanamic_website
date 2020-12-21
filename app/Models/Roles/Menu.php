<?php

namespace App\Models\Roles;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable=['parent_id','menu_name','menu_controller','menu_link','menu_css',
        'menu_icon','menu_status','menu_order'];

    public $timestamps = false;

    public static function getMenu($id)
    {

        if (Auth::user()->user_group_id == 1) {
            $result = DB::table('menus')
                ->where('parent_id', $id)->where('menu_status', 1)
                ->orderBy('menu_order', 'ASC')
                ->get();
        } else {
            $result = DB::table('menus')->select('menus.*')
                ->join('user_roles', 'menus.id', '=', 'user_roles.menu_id')
                ->where('parent_id', $id)
                ->where('menu_status', 1)
                ->where('allow_view', 1)
                ->where('user_group_id', Auth::user()->user_group_id)
                ->orderBy('menu_order', 'ASC')
                ->get();
        }
        return $result;

    }
    public static function getMenus()
    {
        /* return DB::table('menus')
             ->select('menus.*')
             ->get();
        */

        return $result = DB::table('menus')->select('menus.*')
            ->join('user_roles', 'menus.id', '=', 'user_roles.menu_id')
            ->where('parent_id', 0)
            ->where('menu_status', 1)
            ->where('allow_view', 1)
            ->where('user_group_id', Auth::user()->user_group_id)
            ->orderBy('menu_order', 'ASC')
            ->get();
    }
}
