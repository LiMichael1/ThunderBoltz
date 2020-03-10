<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index(\App\User $user)
    {
        
        return view('profiles.index', compact('user'));
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
