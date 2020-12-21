<?php

namespace App\Http\Controllers\Backend\message;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Repository\Message\MessageRepository;
use App\Http\Requests\Message\MessageRequest;

class MessageController extends BaseController
{
    private $messageRepository;

    public function __construct(MessageRepository $messageRepository)
    {
        parent::__construct();
        $this->messageRepository = $messageRepository;
    }


    public function index(){
        $messages = $this->messageRepository->all();
        return view('backend.pages.message.index', compact('messages'));
    }

   public function sendMessage(MessageRequest $request){
       try{
           $create=Message::create($request->all());
           if($create){
               return back()->with('success', 'Message sent successfully');
           }else{
               session()->flash('error','Message Could not be sent');
               return back();
           }
       }catch (\Exception $e){
           $e = $e->getMessage();
           session()->flash('error','Exception : '.$e);
           return back();
       }
   }

    public function destroy($id)
    {
        $id=(int)$id;
        try{
            $message = $this->messageRepository->findById($id);
            if($message->destroy($id)){
                session()->flash('success','Successfully deleted');
                return back();
            }else{
                session()->flash('error','Could not be deleted');
                return back();
            }
        }catch (\Exception $e){
            $exception=$e->getMessage();
            session()->flash('error','EXCEPTION'.$exception);
            return back();

        }
    }
}
