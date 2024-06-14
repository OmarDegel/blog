<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Friend;
use App\Models\User;
use App\Notifications\AddFriend;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;


class NotificationLivewire extends Component
{



    public function render()
    {
        return view('livewire.notification-livewire');
    }

    public function approve_friend($friend_id,$notification_id){

        $f=Friend::where('user_id',$friend_id)->where('friend_id',auth()->user()->id)
        ->update([
            'status'=>'friends'
        ]);
        $friend=User::find($friend_id);
        Notification::send($friend, new AddFriend(auth()->user()->id,auth()->user()->name,auth()->user()->image,'approve_friends'));
        // $notification = Notification::find($notification->id);

        // Notification::where('id',$notification->id)->update([
        //     'read_at'=>now()
        //  ]);
        DB::table('notifications')->where('notifiable_id', $notification_id)->update([
           'read_at'=>now()
        ]);

        // $notification->markAsRead();

    }



    public function cancel_friend($friend_id,$notification_id){
        $f=Friend::where('user_id',$friend_id)->where('friend_id',auth()->user()->id)
        ->delete();
        $friend=User::find($friend_id);
        Notification::send($friend, new AddFriend(auth()->user()->id,auth()->user()->name,auth()->user()->image,'cancel_friends'));
        DB::table('notifications')->where('notifiable_id',$notification_id)->update([
           'read_at'=>now()
        ]);


    }
}
