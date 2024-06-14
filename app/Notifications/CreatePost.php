<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreatePost extends Notification
{
    use Queueable;
    private $user_name;
    private $user_image;
    private $post_slug;
    private $post_id;



    public function __construct($user_name,$user_image,$post_slug,$post_id)
    {
        $this->user_name=$user_name;
        $this->user_image=$user_image;
        $this->post_slug=$post_slug;
        $this->post_id=$post_id;
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
            'user_name'=>$this->user_name,
            'user_image'=>$this->user_image,
            'post_slug'=>$this->post_slug,
            'post_id'=>$this->post_id
        ];
    }
}
