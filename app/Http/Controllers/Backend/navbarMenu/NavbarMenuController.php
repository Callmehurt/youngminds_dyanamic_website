<?php

namespace App\Http\Controllers\Backend\navbarMenu;

use App\Http\Controllers\BaseController;
use App\Models\NavbarMenu;
use Illuminate\Http\Request;
use App\Repository\NavbarMenu\NavbarMenuRepository;
use App\Repository\NavbarMenuTypeRepository;
use App\Http\Requests\NavbarMenu\NavbarMenuRequest;
use App\Repository\Pages\PageRepository;

class NavbarMenuController extends BaseController
{
    private $navbarMenuRepository;
    private $navbarMenuTypeRepository;
    private $pageRepository;

    public function __construct(NavbarMenuRepository $navbarMenuRepository, NavbarMenuTypeRepository $navbarMenuTypeRepository, PageRepository $pageRepository)
    {
        parent::__construct();
        $this->navbarMenuRepository = $navbarMenuRepository;
        $this->navbarMenuTypeRepository = $navbarMenuTypeRepository;
        $this->pageRepository = $pageRepository;
    }

    public function index()
    {
        $menus = $this->navbarMenuRepository->all();
        $menusParentList = $this->navbarMenuRepository->navParentList();
        $pages = $this->pageRepository->all();
        $navbarMenuTypes = $this->navbarMenuTypeRepository->all();

        return view('backend.nav.index', compact('menus', 'menusParentList', 'pages', 'navbarMenuTypes'));
    }

    public function store(NavbarMenuRequest $request)
    {
        try{

            if($request->parent_id == 0){
                $parent_id = 0;
            }else{
                $parent_id = $request->parent_id;
            }
            $create=NavbarMenu::create([
                'parent_id' => $parent_id,
                'menu_name' => $request->menu_name,
                'menu_type_id' => $request->menu_type_id,
                'site_url' => $request->site_url,
                'module_url' => $request->module_url,
                'display_order' => $request->display_order,
                'status' => $request->status,
                'slug' => $request->page_slug,
            ]);
            if($create){
                session()->flash('success','Menu successfully created');
                return back();
            }else{
                session()->flash('error','Menu could not be created');
                return back();
            }
        }catch (\Exception $e){
            $e = $e->getMessage();
            session()->flash('error','Exception : '.$e);
            return back();
        }
    }


    public function edit($id)
    {
        try{
            $id=(int)$id;
            $edits=$this->navbarMenuRepository->findById($id);
            if($edits){
                $menus = $this->navbarMenuRepository->all();
                $menusParentList = $this->navbarMenuRepository->navParentList();
                $pages = $this->pageRepository->all();
//                $pages = $this->pageRepository->getPage($edits->slug);
                $navbarMenuTypes = $this->navbarMenuTypeRepository->all();
                return view('backend.nav.index', compact('edits', 'menus', 'menusParentList', 'pages', 'navbarMenuTypes'));
            }else{
                session()->flash('error','Id could not be obtained');
                return back();
            }

        }catch (\Exception $e){
            $exception=$e->getMessage();
            session()->flash('error','EXCEPTION :'.$exception);
        }
    }

    public function update(Request $request, $id)
    {
        try{

            $parent_id = $request->input('parent_id');
            if($parent_id == 0){
                $parent_id = 0;
                echo $parent_id;
            }else{
                echo $parent_id;
            }

            $menuName = $request->input('menu_name');
            $menuType = $request->input('menu_type_id');
            $checkMenuType = $this->navbarMenuTypeRepository->findById($menuType);
            if($checkMenuType->menu_type_name == "Page Menu"){
                $slug = $request->input('page_slug');
            }else{
                $slug = "";
            }
            if($checkMenuType->menu_type_name == "Module Menu"){
                $moduleUrl = $request->input('module_url');
            }else{
                $moduleUrl = "";
            }
            if($checkMenuType->menu_type_name == "URL Menu"){
                $siteUrl = $request->input('site_url');
            }else{
                $siteUrl = "";
            }

            $displayOrder = $request->input('display_order');
            $menu = $this->navbarMenuRepository->findById($id);

            echo " Menu Name:".$menuName." module_url:".$moduleUrl." Slug:".$slug." Menu Type:".$menuType." Site Url:".$siteUrl." Display Order:".$displayOrder;

            $update = $menu->update([
               'parent_id' => $parent_id,
               'menu_name' => $menuName,
               'menu_type_id' => $menuType,
               'slug' => $slug,
               'module_url' => $moduleUrl,
               'site_url' => $siteUrl,
               'display_order' => $displayOrder,
            ]);

            if($update){
                session()->flash('success','Updated Successfully');
                return redirect(route('navbar.index'));
            }else{
                session()->flash('error','Could not update');
                return back();
            }

        }catch (\Exception $e){
            $exception=$e->getMessage();
            session()->flash('error','EXCEPTION:'.$exception);
            return back();
        }

    }

    public function destroy($id)
    {
        $id=(int)$id;
        try{
            $menu = NavbarMenu::find($id);
            $isActive = $menu->status;
            if($isActive == 0){
                if($menu->destroy($id)){
                    session()->flash('success','Menu successfully deleted');
                    return back();
                }else{
                    session()->flash('error','Menu could not be deleted');
                    return back();
                }
            }else{
                session()->flash('warning','Menu still active');
                return back();

            }

        }catch (\Exception $e){
            $exception=$e->getMessage();
            session()->flash('error','EXCEPTION'.$exception);
            return back();

        }
    }

    public function changeStatus($id){

        try{
            $id=(int)$id;
            $menu=$this->navbarMenuRepository->findById($id);
            if($menu->status =='0'){
                $menu->status='1';
                $menu->save();
                session()->flash('success','Menu Successfully Activated');
                return back();
            }
            $menu->status='0';
            $menu->save();
            session()->flash('success','Menu Successfully Deactivated');
            return back();
        }catch (\Exception $e){
            $message=$e->getMessage();
            session()->flash('error',$message);
            return back();
        }

    }
}
