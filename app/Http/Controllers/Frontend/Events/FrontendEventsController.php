<?php

namespace App\Http\Controllers\Frontend\Events;

use App\Http\Controllers\Controller;
use App\Repository\EventRepository;
use Illuminate\Http\Request;

class FrontendEventsController extends Controller
{
    private $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function events(){
        try{
            $allEvents = $this->eventRepository->all();
            return view('frontend.event.index', compact('allEvents'));
        }catch (\Exception $exception){
            return view('page');
        }
    }



}
