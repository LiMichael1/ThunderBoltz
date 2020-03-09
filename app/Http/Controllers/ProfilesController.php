<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index($user)
    {
        
        $userData = User::findOrFail($user);
        return view('profiles.index', [
            'user' => $userData
        ]);
    }
}
