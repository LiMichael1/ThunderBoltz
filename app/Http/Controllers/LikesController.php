<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;

use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function store(Post $post)
    {
        auth()->user()->liked()->toggle($post);
        return (auth()->user()) ? auth()->user()->liked->contains($post) : false;
    }
}
