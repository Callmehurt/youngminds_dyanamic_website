<?php

namespace App\Http\Controllers\Frontend\Notice;

use App\Http\Controllers\Controller;
use App\Repository\NoticeRepository;
use Illuminate\Http\Request;

class FrontendNoticeController extends Controller
{
    private $noticeRepository;

    public function __construct(NoticeRepository $noticeRepository)
    {
        $this->noticeRepository = $noticeRepository;
    }

    public function notices(){
        try{
            $allNotice = $this->noticeRepository->all();
            return view('frontend.notice.index', compact('allNotice'));
        }catch (\Exception $exception){
            return view('page');
        }
    }

    public function getNotice($id){
        try{
            $notice = $this->noticeRepository->findById($id);
            return view('frontend.notice.single', compact('notice'));
        }catch (\Exception $exception){
            return view('page');
        }
    }


    public function download_notice($id){
        try{
            $resource = $this->noticeRepository->findById($id);
            return view('Frontend.notice.download', compact('resource'));
        }catch (\Exception $exception){
            return view('page');
        }
    }



}
