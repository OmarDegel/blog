<?php

namespace App\Http\Controllers\blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;


class CommentController extends Controller
{
    public function store(Request $request){
        Comment::create([
            'user_id'=>auth()->user()->id,
            'post_id'=>$request->post_id,
            'comment'=>$request->comment
        ]);

        return redirect()->back();
    }
}
