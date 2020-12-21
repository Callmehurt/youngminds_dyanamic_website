<?php

namespace App\Http\Controllers\Backend\carousel;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Carousel\CarouselRequest;
use App\Models\Carousel;
use App\Repository\Carousel\CarouselRepository;
use Illuminate\Http\Request;

class CarouselController extends BaseController
{
    private $carouselRepository;

    public function __construct(CarouselRepository $carouselRepository)
    {
        parent::__construct();
        $this->carouselRepository = $carouselRepository;
    }

    public function index(){
        $carousels = $this->carouselRepository->all();
        return view('backend.carousel.index', compact('carousels'));
    }

    public function store(CarouselRequest $request){
        try{

            if(Request()->hasFile('carousel_image')){
                $originName = $request->file('carousel_image')->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $request->file('carousel_image')->getClientOriginalExtension();
                $fileName = $fileName.'_'.time().'.'.$extension;
                $request->file('carousel_image')->move(public_path('uploads/carousel'), $fileName);

                $carousel = Carousel::create([
                    'carousel_image' => $fileName,
                    'status' => $request->status,
                ]);
                if($carousel){
                    session()->flash('success','Successfully Added!');
                    return back();
                }else{
                    session()->flash('error','Could not be Added!');
                    return back();
                }
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
            $edits = $this->carouselRepository->findById($id);
            if ($edits->count() > 0)
            {
                $carousels = $this->carouselRepository->all();
                return view('backend.carousel.index', compact('edits','carousels'));
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

    public function update(CarouselRequest $request, $id)
    {
        $id = (int)$id;
        try{
            if(request()->hasFile('carousel_image')){
                request()->validate([

                    'carousel_image' => 'required|image|mimes:jpeg,jpg,png|max:5048',

                ]);
            }

            if(request()->hasFile('carousel_image')){
                $originName = $request->file('carousel_image')->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $request->file('carousel_image')->getClientOriginalExtension();
                $fileName = $fileName.'_'.time().'.'.$extension;
                $request->file('carousel_image')->move(public_path('uploads/carousel'), $fileName);
                $img = $this->carouselRepository->findById($id);
                $img->carousel_image = $fileName;
                $img->save();
            }

            if($img){
                session()->flash('success','Successfully Updated!');
                return redirect(route('carousel.index'));
            }else{
                session()->flash('error','No record with given id!');
                return back();
            }
        }catch (\Exception $e){
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION :' . $exception);
        }

    }

    public function destroy($id)
    {
        $id=(int)$id;
        try{
            $value = $this->carouselRepository->findById($id);
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

    public function changeStatus($id){

        try{
            $id=(int)$id;
            $carousel=$this->carouselRepository->findById($id);
            if($carousel->status =='0'){
                $carousel->status='1';
                $carousel->save();
                session()->flash('success','Successfully Activated');
                return back();
            }
            $carousel->status='0';
            $carousel->save();
            session()->flash('success','Successfully Deactivated');
            return back();
        }catch (\Exception $e){
            $message=$e->getMessage();
            session()->flash('error',$message);
            return back();
        }

    }


}
