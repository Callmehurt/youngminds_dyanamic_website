<?php

namespace App\Http\Controllers\Configurations;

use App\Models\Configurations\Office;
use App\Repository\Configurations\OfficeTypeRepository;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Configurations\OfficeTypeRequest;
use App\Models\Configurations\OfficeType;


class OfficeTypeController extends BaseController
{

    /**
     * @var OfficeTypeRepository
     */
    private $officeTypeRepository;

    /**
     * MuniTypeController constructor.
     * @param OfficeTypeRepository $officeTypeRepository
     */
    public function __construct(OfficeTypeRepository $officeTypeRepository)
    {
        parent::__construct();
        $this->officeTypeRepository = $officeTypeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $officeTypes = $this->officeTypeRepository->all();
        return view('backend.configurations.officeType.index',compact('officeTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfficeTypeRequest $request)
    {
        try{
            $create = OfficeType::create($request->all());
            if($create){
                session()->flash('success','Office Type successfully created!');
                return back();
            }else{
                session()->flash('error','Office type could not be created!');
                return back();
            }
        }catch (\Exception $e){
            $e->getMessage();
            session()->flash('error','Exception : '.$e);
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $id = (int)$id;
            $edits = $this->officeTypeRepository->findById($id);
            if ($edits->count() > 0)
            {
                $officeTypes = $this->officeTypeRepository->all();
                return view('backend.configurations.officeType.index', compact('edits','officeTypes'));
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OfficeTypeRequest $request, $id)
    {
        $id = (int)$id;
        try{
            $officeType =$this->officeTypeRepository->findById($id);
            if($officeType){
                $officeType->fill($request->all())->save();
                session()->flash('success','Office Type updated successfully!');

                return redirect(route('officeType.index'));
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id=(int)$id;
        try{
            $value = $this->officeTypeRepository->findById($id);
           if ($value) {
                $valueId = $value->id;
                $result = Office::where('office_type_id', $valueId)->get();

                if (count($result) > 0) {
                    session()->flash('error', 'Office Type is in use. Unable to delete!');
                    return back();
                }
            }
            $value->delete();
            session()->flash('success','Office Type successfully deleted!');
            return back();

        }catch (\Exception $e){
            $exception=$e->getMessage();
            session()->flash('error','EXCEPTION'.$exception);
            return back();

        }
    }
}
