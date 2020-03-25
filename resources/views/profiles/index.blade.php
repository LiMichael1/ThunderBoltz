@extends('layouts.app')

@section('content')
<div class="container px-5">
    <div class="row">
        <h1>User List</h1>
    </div>
    @forelse ($users as $user)
    <div class="row align-items-start my-4 border rounded user-bg">
        <div class="col-3 offset-2 p-3 d-flex">
            <div class="embed-responsive embed-responsive-1by1 text-center justify-content-center align-items-start">
                <a href="{{ url('/profile/') . '/' . $user['id'] }}" style="text-decoration: none;" class="text-dark">
                    <img src="{{ $user['profile']['image'] ? url('/storage/') . '/' . $user['profile']['image'] : url('/img/default-profile-pic.jpg')}}"
                        class="rounded-circle embed-responsive-item home-image"
                        style="border:3px solid lightgray; object-fit:cover">
                </a>
            </div>
        </div>
        <div class="col-5 pt-3">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-middle">
                    <a href="{{ url('/profile/') . '/' . $user['id'] }}" style="text-decoration: none;"
                        class="text-dark">
                        <h2 class="username-text">{{ $user['username'] }}</h2>
                    </a>
                    <follow-button user-id="{{ $user['id'] }}" follows="{{ $user['followed'] }}"></follow-button>
                </div>

            </div>

            <div class="d-flex">
                <div class="pr-4"><strong>{{ $user['post_count'] }}</strong> posts</div>
                <div class="pr-4"><strong>{{ $user['followers_count']}}</strong> followers</div>
                <div class="pr-4"><strong>{{ $user['following_count'] }}</strong> following</div>
            </div>
            <div class="pt-3">
                <p><strong> {{ $user['profile']['title'] }}</strong></p>
                <p>
                    {{ $user['profile']['description'] }}
                </p>
                <a href="{{ $user['profile']['url'] }}" target="_blank"
                    rel="noopener noreferrer"><strong>{{ $user['profile']['url'] }}</strong></a>
            </div>
        </div>
    </div>

    @empty
    <div class="row">
        <h2>No Active Users</h2>
    </div>
    @endforelse
    <div class="row justify-content-center">
        {{ $users_query }}
    </div>
</div>
@endsection
