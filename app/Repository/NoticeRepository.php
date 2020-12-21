<?php

namespace App\Repository;

use App\Models\Notice;
use Illuminate\Support\Facades\DB;

class NoticeRepository{

    private $notice;

    public function __construct(Notice $notice)
    {
        $this->notice = $notice;
    }

    public function all()
    {
        $notices = $this->notice->orderBy('notice_date','ASC')->paginate(10);
        return $notices;
    }

    public function findById($id)
    {
        $notice = $this->notice->find($id);
        return $notice;
    }

    public function getLimitedNotice(){
        $allNotice = DB::table('notices')->orderBy('notice_date', 'ASC')->limit(10)->get();
        return $allNotice;
    }

}

?>