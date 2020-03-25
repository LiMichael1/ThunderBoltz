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

        $posts = Post::whereIn('user_id', $users)->with('user.profile')->latest()->paginate(5);

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

        $post = $post->with('user.profile', 'comments.user')->where('id', $post->id)->first();
        $follows = (auth()->user()) ? auth()->user()->following->contains($post->user->id) : false;
        
        $liked_post = (auth()->user()) ? auth()->user()->liked->contains($post) : false;
        $likes_count = $post->likes->count();
        $comments_count = $post->comments->count();

        return view('posts.show', compact('post', 'follows', 'liked_post', 'likes_count', 'comments_count'));
    }
}
