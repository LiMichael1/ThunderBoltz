<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function show(\App\User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $posts = $user->posts;
        $followersCount = $user->profile->followers->count();
        $followingCount = $user->following->count();

        return view('profiles.show', compact('user', 'follows', 'posts', 'followersCount', 'followingCount') );
    }

    public function index()
    {
        $users_query = \App\User::with([
            'profile.followers',
            'following',
            'posts'
        ])->paginate(5);

        // collect($users)->map(function ( $user ){
        //     $user->profile['followers'] = $user->profile->followers->count();
        //     $user['posts'] = $user->posts->count();

        //     return $user;
        // });

        $users = [];

        foreach($users_query as $query_obj)
        {
            $user = [];
            $user['id'] = $query_obj->id;
            $user['username'] = $query_obj->username;
            $user['profile']['image'] = $query_obj->profile->image;
            $user['profile']['title'] = $query_obj->profile->title;
            $user['profile']['description'] = $query_obj->profile->description;
            $user['profile']['url'] = $query_obj->profile->url;
            $user['followers_count'] = $query_obj->profile->followers->count();
            $user['post_count'] = $query_obj->posts->count();
            $user['following_count'] = $query_obj->following->count();
            $user['followed'] = $query_obj->profile->followers->contains('id', auth()->user() ? auth()->user()->id : -1 );

            array_push($users, $user);
        }

        // dd($users_query->links());

        return view( 'profiles.index', compact('users', 'users_query') );
    }

    public function edit(\App\User $user)
    {
        $this->authorize('update', $user->profile);
        return view( 'profiles.edit', compact('user') );
    }

    public function update(\App\User $user ){
        $this->authorize('update', $user->profile);
        $data = request()->validate([
            'title' => 'required',
            'description' => 'nullable',
            'url' => 'nullable|url',
            'image' => 'nullable|image',
        ]);

        
        if( request('image') )
        {
            $imagePath = request('image')->store('profile',  ['disk' => 'public']);
            auth()->user()->profile->update(array_merge(
                $data,
                ['image' => $imagePath]
            ));
        }
        else{
            auth()->user()->profile->update($data);
        }

        return redirect(url("/profile/") . '/' . auth()->user()->id);
    }
}
