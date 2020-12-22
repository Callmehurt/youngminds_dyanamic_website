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

    public function getSinglePage($slug){
        $page = $this->navbarMenuRepository->getPage($slug);
        return view('frontend.dynamic_page', compact('page'));
    }

}
