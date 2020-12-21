<?php

namespace App\Repository;

use App\Models\Event;
use Illuminate\Support\Facades\DB;

class EventRepository{

    private $event;

    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    public function all()
    {
        $events = $this->event->orderBy('start_date','ASC')->paginate(10);
        return $events;
    }

    public function findById($id)
    {
        $event = $this->event->find($id);
        return $event;
    }

    public function getLimitedEvent(){
        $allEvents = DB::table('events')->orderBy('start_date', 'ASC')->limit(10)->get();
        return $allEvents;
    }

}

?>