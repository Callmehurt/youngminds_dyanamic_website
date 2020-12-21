<?php

namespace App\Http\Controllers\Configurations;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Configurations\OfficeRequest;
use App\Models\Configurations\Office;
use App\Models\Configurations\OfficeType;
use App\Models\Configurations\District;
use App\Repository\Configurations\DistrictRepository;
use App\Repository\Configurations\OfficeRepository;
use App\Repository\Configurations\OfficeTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OfficeController extends BaseController
{
    /**
     * @var OfficeRepository
     */
    private $officeRepository;
    /**
     * @var DistrictRepository
     */
    private $districtRepository;
    /**
     * @var OfficeTypeRepository
     */
    private $officeTypeRepository;

    /**
     * OfficeController constructor.
     */
    public function __construct(OfficeRepository $officeRepository,
                                DistrictRepository $districtRepository,
                                OfficeTypeRepository $officeTypeRepository)
    {
        Parent::__construct();
        $this->officeRepository = $officeRepository;
        $this->districtRepository = $districtRepository;
        $this->officeTypeRepository = $officeTypeRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $district=$this->districtRepository->all();
        $officeType=$this->officeTypeRepository->all();
        $offices=$this->officeRepository->all();
        return view('backend.configurations.office.index',compact('officeType','district','offices'));
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
    public function store(OfficeRequest $request)
    {
        try{
            $create = Office::create($request->all());
            if($create){
                session()->flash('success','Office successfully created!');
                return back();
            }else{
                session()->flash('error','Office could not be created!');
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
            $edits = $this->officeRepository->findById($id);
            if ($edits->count() > 0)
            {
                $district = District::select('id', 'nepali_name')->get();
                $officeType = OfficeType::select('id', 'office_type_name')->get();
                $offices = $this->officeRepository->all();
                return view('backend.configurations.office.index', compact('edits','district','offices','officeType'));
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
    public function update(Request $request, $id)
    {
        $id = (int)$id;
        try{
            $offices = $this->officeRepository->findById($id);
            if($offices){
                $offices->fill($request->all())->save();
                session()->flash('success','Office updated successfully!');

                return redirect(route('office.index'));
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
            $value = $this->officeRepository->findById($id);
            $value->delete();
            session()->flash('success','Office successfully deleted!');
            return back();

        }catch (\Exception $e){
            $exception=$e->getMessage();
            session()->flash('error','EXCEPTION'.$exception);
            return back();

        }
    }

    public function status($id)
    {
        try {
            $id = (int)$id;
            $office = $this->officeRepository->findById($id);
            if ($office->office_status == 'inactive') {
                $office->office_status = 'active';
                $office->save();
                session()->flash('success', 'Office Status has been Activated!');
                return back();
            } else {
                $office->office_status = 'inactive';
                $office->save();
                session()->flash('success', 'Office Status has been Deactivated!');
                return back();
            }

        } catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION :' . $exception);
        }
    }
}
