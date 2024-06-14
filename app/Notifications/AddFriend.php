<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AddFriend extends Notification
{
    use Queueable;

    private $user_id;
    private $user_name;
    private $user_image;
    private $status;

    public function __construct($user_id,$user_name,$user_image,$status)
    {
        $this->user_id=$user_id;
        $this->user_name=$user_name;
        $this->user_image=$user_image;
        $this->status=$status;
    }


    public function via(object $notifiable): array
    {
        return ['database'];
    }


    // public function toMail(object $notifiable): MailMessage
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }


    public function toArray(object $notifiable): array
    {
        return [
            'status'=>$this->status,
            'user_id'=>$this->user_id,
            'user_name'=>$this->user_name,
            'user_image'=>$this->user_image
        ];
    }
}
