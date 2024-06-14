<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CreatePost;

class CreatePostLivewire extends Component
{
    use WithFileUploads;
    public $message='';
    public $title;
    public $short_description;
    public $description;
    public $path_photo;


    public function render()
    {
        return view('livewire.create-post-livewire');
    }

    public function save(){
        $this->validate([
            'title'=>'required|string|min:3',
            'short_description'=>'required|min:10',
            'description'=>'required|min:20',
            'path_photo'=>'required|mimes:png,jpg|max:2048'
        ]);

        $slug = Str::of($this->title.uniqid())->slug('-');
        // dd($this->path_photo);
        $image=$this->path_photo->store('posts','public');


       $post= Post::create([
            'title'=>$this->title,
            'short_description'=>$this->short_description,
            'description'=>$this->description,
            'slug'=>$slug,
            'path_photo'=>$image,
            'user_id'=>auth()->user()->id
        ]);

        $this->message='تمت اضافه لبوست بنجاح';
        $users=User::where('id','!=',auth()->user()->id)->get();

        Notification::send($users, new CreatePost(auth()->user()->name,$image,$slug,$post->id));

    }

    public function close_message(){
        $this->message='';
    }

}
