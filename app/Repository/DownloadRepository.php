<?php

namespace App\Repository;

use App\Models\Download;
use Illuminate\Support\Facades\DB;

class DownloadRepository{

    private $downloads;

    public function __construct(Download $download)
    {
        $this->downloads = $download;
    }

    public function all()
    {
        $downloads = $this->downloads->orderBy('created_at','ASC')->paginate(10);
        return $downloads;
    }

    public function findById($id)
    {
        $download = $this->downloads->find($id);
        return $download;
    }

    public function getLimitedDownloads(){
        $allDownloads = DB::table('downloads')->orderBy('created_at', 'ASC')->limit(10)->get();
        return $allDownloads;
    }

}

?>