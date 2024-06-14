<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Friend;
use App\Notifications\AddFriend;
use Illuminate\Support\Facades\Notification;

class SearchUserLivewire extends Component
{
    public $users=null;
    public $search='';
    public function render()
    {
        $this->users=User::where('name','like','%'.$this->search.'%')->get();
        return view('livewire.search-user-livewire');
    }


    public function create_friend($user_id){
        $friend=User::find($user_id);
        if((Friend::where('user_id',auth()->user()->id)->where('friend_id',$friend->id)->exists()) || (Friend::where('friend_id',auth()->user()->id)->where('user_id',$friend->id)->exists())){

        }else{
            Friend::create([
                'user_id'=>auth()->user()->id,
                'friend_id'=>$user_id,
                'status'=>'waitting'
            ]);
            Notification::send($friend, new AddFriend(auth()->user()->id,auth()->user()->name,auth()->user()->image,'friends'));
        }
    }

}
