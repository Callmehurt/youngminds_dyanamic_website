<?php
/**
 * Created by PhpStorm.
 * User: santosh
 * Date: 3/21/18
 * Time: 5:03 PM
 */

namespace App\Repository\Message;


use App\Models\Message;

class MessageRepository
{

    private $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function all()
    {
        $messages = $this->message->orderBy('created_at','DESC')->get();
        return $messages;
    }

    public function findById($id)
    {
        $messages = $this->message->find($id);
        return $messages;
    }

}