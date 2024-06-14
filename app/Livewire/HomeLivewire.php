<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Like;

class HomeLivewire extends Component
{
    // public $likes;
    public $posts;
    public $search;

    public function __constract(){
        $this->posts=Post::get();
        $this->search='';
    }
    public function render()
    {
        // $this->likes=Like::where('post_id',$post->id)->get()->count() ;


        $this->posts=Post::where('title','like','%'.$this->search.'%')->orWhere('short_description','like','%'.$this->search.'%')->orWhere('description','like','%'.$this->search.'%')->get();

        return view('livewire.home-livewire');
    }

    public function like($post_id){
        Like::create([
            'user_id'=>auth()->user()->id,
            'post_id'=>$post_id,

        ]);
    }

    public function not_like($post_id){
        Like::where('post_id',$post_id)->delete();
    }


}
