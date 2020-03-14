<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function __construct()
    {
        
    }

    public function create()
    {
        $this->middleware('auth');
        return view('posts.create');
    }

    public function index()
    {
        $this->middleware('auth');
        $users = auth()->user()->following()->pluck('profiles.user_id');

        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);
        // dd($posts);

        return view( 'posts.index', compact('posts') );
    }

    public function store()
    {
        $this->middleware('auth');
        $data = request()->validate([
            'caption' => 'required',
            'image' => 'required|image',
        ]);

        $imagePath = request('image')->store('uploads', ['disk' => 'public']);
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/' . auth()->user()->id);
        
    }

    public function show(\App\Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
