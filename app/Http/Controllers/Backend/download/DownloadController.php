<?php

namespace App\Http\Controllers\Backend\download;

use App\Models\Download;
use Illuminate\Http\Request;
use App\Repository\DownloadRepository;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Auth;

class DownloadController extends BaseController
{
    private $downloadRepository;

    public function __construct(DownloadRepository $downloadRepository)
    {
        parent::__construct();
        $this->downloadRepository = $downloadRepository;
    }


    public function index(){
        $downloads = $this->downloadRepository->all();
        return view('backend.pages.download.index', compact('downloads'));
    }

    public function store(Request $request){
        try{
            if(request()->hasFile('download_file')){
                request()->validate([

                    'download_file' => 'required',

                ]);
            }

            $this -> validate($request, [
                'title' => ['required', 'string', 'max:255', 'unique:downloads'],
            ]);


            if(Request()->hasFile('download_file')){
                $file = $request->file('download_file');
                $fileName = time().'.'. $file->getClientOriginalExtension();
                $file->move(public_path('Download'), $fileName);

                $download = Download::create([
                   'title' => $request->input('title'),
                   'download_file' => $fileName,
                   'user_id' => Auth::user()->id,
                ]);
            }

            if($download){
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
            $edits = $this->downloadRepository->findById($id);
            if ($edits->count() > 0)
            {
                $downloads = $this->downloadRepository->all();
                return view('backend.pages.download.index', compact('edits','downloads'));
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

    public function update(Request $request, $id)
    {
        $id = (int)$id;
        try{

            $this -> validate($request, [
                'title' => ['required', 'string', 'max:255'],
            ]);

            if(Request()->hasFile('download_file')){
                $file = $request->file('download_file');
                $fileName = time().'.'. $file->getClientOriginalExtension();
                $file->move(public_path('Download'), $fileName);
                $download = new Download();
                $download -> download_file= $fileName;
                $download -> save();
            }


            $update = $this->downloadRepository->findById($id)->update([
                'title' => $request->input('title'),
            ]);

            if($update){
                session()->flash('success','Successfully Updated!');
                return redirect(route('download.index'));
            }else{
                session()->flash('error','No record with given id!');
                return back();
            }
        }catch (\Exception $e){
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION :' . $exception);
        }

    }

    public function destroy(Download $download)
    {
        try{
           $download->delete();
           if($download){
               session()->flash('success','Successfully deleted!');
               return back();
           }else{
               session()->flash('error','Could not delete!');
               return back();

           }

        }catch (\Exception $e){
            $exception=$e->getMessage();
            session()->flash('error','EXCEPTION'.$exception);
            return back();

        }
    }


}
