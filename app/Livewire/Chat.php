<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Message;

class Chat extends Component
{
    public $message;

    public function render()
    {
        $messages=Message::get();
        return view('livewire.chat',compact('messages'));
    }

    public function send_message(){
        Message::create([
            'message'=>$this->message,
            'user_id'=>auth()->user()->id
        ]);
        $this->message='';
    }
}
