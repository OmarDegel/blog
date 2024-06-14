<?php

namespace App\Http\Controllers\blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function home(){
        // $posts=Post::get();
        return view('blog.home');
    }

    public function createPost(){
        return view('blog.createPost');
    }

    public function storePost(Request $request){
        $title=$request->title;

        $slug = Str::of($title.uniqid())->slug('-');

        $image=$request->file('path_photo')->store('posts','public');


        Post::create([
            'title'=>$request->title,
            'short_description'=>$request->short_description,
            'description'=>$request->description,
            'slug'=>$slug,
            'path_photo'=>$image,
            'user_id'=>auth()->user()->id
        ]);

        return  redirect()->route('your_profile')->with('message','تم اضافه البوست بنجاح');
    }

    public function showPost($slug){
        $post=Post::with('comments')->where('slug',$slug)->first();

        $popular_posts = Post::withCount('comments')->orderBy('comments_count', 'desc')->paginate(5);
        return view('blog.singlePost',compact('post'),compact('popular_posts'));
    }







}
