<?php

namespace App\Http\Controllers\Frontend\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendContactController extends Controller
{
    public function contact(){
        return view('frontend.contact.index');
    }
}
