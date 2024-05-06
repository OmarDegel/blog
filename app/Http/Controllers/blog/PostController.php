<?php

namespace App\Http\Controllers\blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function home(){
        return view("blogs.home");
    }
    
    public function create(){
        

        return view("blogs.createPost");
    }
    public function create(){


        return view("blogs.createPost");
    }

}
