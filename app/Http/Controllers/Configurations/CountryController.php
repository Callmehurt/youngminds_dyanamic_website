<?php

namespace App\Http\Controllers\Configurations;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Configurations\CountryRequest;
use App\Models\Configurations\Country;
use App\Repository\Configurations\CountryRepository;


class CountryController extends BaseController
{

    private $countryRepository;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(CountryRepository $countryRepository)
    {
        parent::__construct();
        $this->countryRepository = $countryRepository;
    }

    public function index()
    {
        $countries=$this->countryRepository->all();
        return view('backend.configurations.country.index',compact('countries'));
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
    public function store(CountryRequest $request)
    {
        try{
            $create = Country::create($request->all());
            if($create){
                session()->flash('success','Country successfully created!');
                return back();
            }else{
                session()->flash('error','Country could not be created!');
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
            $edits = $this->countryRepository->findById($id);
            if ($edits->count() > 0)
            {
                $countries = Country::get();
                return view('backend.configurations.country.index', compact('edits','countries'));
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
            $country = $this->countryRepository->findById($id);

            if($country){
                $country->fill($request->all())->save();
                session()->flash('success','Country updated successfully!');

                return redirect(route('country.index'));
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
            $value = $this->countryRepository->findById($id);
            $value->delete();
            session()->flash('success','Country successfully deleted!');
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
            $country = $this->countryRepository->findById($id);

            if ($country->status == 'inactive') {
                $country->status = 'active';
                $country->save();
                session()->flash('success', 'Country has been Activated!');
                return back();
            } else {
                $country->status = 'inactive';
                $country->save();
                session()->flash('success', 'Country Year has been Deactivated!');
                return back();
            }

        } catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION :' . $exception);
        }
    }
}
