<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Mail\MailRequest;

class MailController extends Controller
{
    public function index(MailRequest $request){
        try{
            $title = $request['title'];
            $email = $request['email'];
            $message = $request['message'];
            $details = [
                'title' => $title,
                'body' => $message,
            ];

            Mail::to($email)->send(new SendMail($details));
            Session()->flash('success', 'Mail sent successfully');
            return back();
        }catch (\Exception $e){
            Session()->flash('error', 'Error');
            return back();
        }
    }
}
