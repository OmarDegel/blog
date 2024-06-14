<?php

namespace App\Livewire;

use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\User;

class EditProfileLivewire extends Component
{
    use WithFileUploads;
    public $user;
    public $message='';
    public $name;
    public $short_description;
    public $email;
    

    public $image;


    public function render()
    {
        return view('livewire.edit-profile-livewire');
    }

    public function save(){

        $this->validate([
            'name'=>'required|string|min:3',
            'short_description'=>'min:10',
            'email'=>'required|email',
            'image'=>'image|mimes:jpeg,png,gif|max:2048',

        ]);


        if($this->image){
            $img=$this->image->store('users','public');
        }else{
            $img='null';
        }

        User::where('id',auth()->user()->id)->update([
            'name'=>$this->name,
            'email'=>$this->email,
            'image'=>$img,
            'short_description'=>$this->short_description
        ]);


        $this->message='ُedit profile successfully';
    }

    public function close_message(){
        $this->message='';
    }
}
