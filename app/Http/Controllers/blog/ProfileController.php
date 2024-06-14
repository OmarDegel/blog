<?php

namespace App\Http\Controllers\blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Friend;

class ProfileController extends Controller
{
    public function show_your_profile(){
        $my_user=User::with('posts')->orderBy('id','desc')->where('id',auth()->user()->id)->first();
        $friends=Friend::where('status','friends')->where('user_id',auth()->user()->id)->orWhere('friend_id',auth()->user()->id)->get();

        return view('blog.yourprofile',compact('my_user'),compact('friends'));
    }
    public function show_profile($slug_user){
        $user=User::with('posts')->where('slug',$slug_user)->first();
        $friends=Friend::where('status','friends')->where('user_id',auth()->user()->id)->orWhere('friend_id',auth()->user()->id)->get();
        return view('blog.profile',compact('user'),compact('friends'));
    }

    public function edit_your_profile(){
        $user=User::where('id',auth()->user()->id)->first();
        return view('blog.edit_profile',compact('user'));
    }

    public function store_profile(Request $request){
        $request->validate([
            'name'=>'required|string|min:3',
            'email'=>'required|email',
            'image'=>'image|mimes:jpeg,png,gif|max:2048'
        ]);
        if($request->file('image')){
            $image=$request->file('image')->store('users','public');
        }else{
            $image='null';
        }
        User::where('id',auth()->user()->id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'image'=>$image,
            'short_description'=>$request->short_decription
        ]);


        return  redirect()->back()->with('message','Edit Profile successfully');
    }

    public function chat(){
        return view('home');
    }
}
