<?php

namespace App\Http\Controllers\Frontend\Downloads;

use App\Http\Controllers\Controller;
use App\Repository\DownloadRepository;
use Illuminate\Http\Request;

class FrontendDownloadsController extends Controller
{
    private $downloadRepository;

    public function __construct(DownloadRepository $downloadRepository)
    {
        $this->downloadRepository = $downloadRepository;
    }

    public function downloads(){
        try{
            $allDownloads = $this->downloadRepository->all();
            return view('frontend.download.index', compact('allDownloads'));
        }catch (\Exception $exception){
            return view('page');
        }
    }

    public function download_downloads($id){
        try{
            $resource = $this->downloadRepository->findById($id);
            return view('Frontend.download.download', compact('resource'));
        }catch (\Exception $exception){
            return view('page');
        }
    }


}
