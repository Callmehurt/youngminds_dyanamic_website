<?php

namespace App\Http\Controllers\Backend\navbarMenuType;

use App\Http\Controllers\Controller;
use App\Models\NavbarMenuType;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Requests\NavbarMenuTypes\NavbarMenuTypeRequest;
use App\Repository\NavbarMenuTypeRepository;

class NavbarMenuTypeController extends BaseController
{
    private $navbarMenuTypeRepository;

    public function __construct(NavbarMenuTypeRepository $navbarMenuTypeRepository)
    {
        parent::__construct();
        $this->navbarMenuTypeRepository = $navbarMenuTypeRepository;
    }

    public function index()
    {
        $navbarMenuTypes = $this->navbarMenuTypeRepository->all();
        return view('backend.navbarMenuType.index', compact('navbarMenuTypes'));
    }

    public function store(NavbarMenuTypeRequest $request)
    {
        try{
            $create = NavbarMenuType::create($request->all());
            if($create){
                session()->flash('success','Successfully created!');
                return back();
            }else{
                session()->flash('error','Could not be created!');
                return back();
            }
        }catch (\Exception $e){
            $e->getMessage();
            session()->flash('error','Exception : '.$e);
            return back();
        }
    }

    public function edit($id)
    {
        try{
            $id = (int)$id;
            $edits = $this->navbarMenuTypeRepository->findById($id);
            if ($edits->count() > 0)
            {
                $navbarMenuTypes = $this->navbarMenuTypeRepository->all();
                return view('backend.navbarMenuType.index', compact('edits','navbarMenuTypes'));
            }
            else{
                session()->flash('error','Id could not be obtained!');
                return back();
            }

        }catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION :' . $exception);
        }
    }

    public function update(NavbarMenuTypeRequest $request, $id)
    {
        $id = (int)$id;
        try{
            $navbarMenuType = $this->navbarMenuTypeRepository->findById($id);
            if($navbarMenuType){
                $navbarMenuType->fill($request->all())->save();
                session()->flash('success','Updated successfully!');

                return redirect(route('navbarMenuType.index'));
            }else{

                session()->flash('error','No record with given id!');
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
            $value = $this->navbarMenuTypeRepository->findById($id);
            if($value){
                $value->delete();
                session()->flash('success','Successfully deleted!');
                return back();
            }else{
                session()->flash('error','Could not be deleted!');
                return back();
            }

        }catch (\Exception $e){
            $exception=$e->getMessage();
            session()->flash('error','EXCEPTION'.$exception);
            return back();

        }
    }
}
