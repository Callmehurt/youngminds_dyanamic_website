<?php

namespace App\Http\Controllers\Frontend\News;

use App\Http\Controllers\Controller;
use App\Repository\NewsRepository;
use Illuminate\Http\Request;

class FrontendNewsController extends Controller
{
    private $newsRepository;

    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
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


}

