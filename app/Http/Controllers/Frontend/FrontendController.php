<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repository\Carousel\CarouselRepository;
use App\Repository\DownloadRepository;
use App\Repository\EventRepository;
use App\Repository\NavbarMenu\NavbarMenuRepository;
use App\Repository\NewsRepository;
use App\Repository\NoticeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    private $newsRepository;
    private $carouselRepository;
    private $eventRepository;
    private $noticeRepository;
    private $downloadRepository;
    private $navbarMenuRepository;

    public function __construct(CarouselRepository $carouselRepository, NewsRepository $newsRepository, EventRepository $eventRepository, NoticeRepository $noticeRepository, DownloadRepository $downloadRepository, NavbarMenuRepository $navbarMenuRepository)
    {
        $this->carouselRepository = $carouselRepository;
        $this->newsRepository = $newsRepository;
        $this->eventRepository = $eventRepository;
        $this->noticeRepository = $noticeRepository;
        $this->downloadRepository = $downloadRepository;
        $this->navbarMenuRepository = $navbarMenuRepository;
    }

    public function index(){
        try{
            $carousels = $this->carouselRepository->getActive();
            $allNotice = $this->noticeRepository->getLimitedNotice();
            $allEvents = $this->eventRepository->getLimitedEvent();
            $allDownloads = $this->downloadRepository->getLimitedDownloads();
            $allNews = $this->newsRepository->getLimitedNews();
            return view('frontend.index', compact( 'allNotice', 'allEvents','allDownloads', 'allNews', 'carousels'));
        }catch (\Exception $e){
            return view('page');
        }
    }

    public function news(){
        try{
            $allNews = $this->newsRepository->all();
            return view('frontend.news.index', compact('allNews'));
        }catch (\Exception $exception){
            return view('page');
        }
    }

    public function getNews($id){
        try{
            $news = $this->newsRepository->findById($id);
            return view('frontend.news.single', compact('news'));
        }catch (\Exception $exception){
            return view('page');
        }
    }

    public function events(){
        try{
            $allEvents = $this->eventRepository->all();
            return view('frontend.event.index', compact('allEvents'));
        }catch (\Exception $exception){
            return view('page');
        }
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


    public function downloads(){
        try{
            $allDownloads = $this->downloadRepository->all();
            return view('frontend.download.index', compact('allDownloads'));
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

    public function download_downloads($id){
        try{
            $resource = $this->downloadRepository->findById($id);
            return view('Frontend.download.download', compact('resource'));
        }catch (\Exception $exception){
            return view('page');
        }
    }

    public function contact(){
        return view('frontend.contact.index');
    }


    public function getSinglePage($slug){
        $page = $this->navbarMenuRepository->getPage($slug);
        return view('frontend.dynamic_page', compact('page'));
    }

}
