@extends('layouts.app')

@section('content')
<div class="container px-5">
    <div class="row">
        <div class="col-4 p-3 text-center">
            <img src="{{ $user->profile->image ? url('/storage/') . '/' . $user->profile->image : url('/img/default-profile-pic.jpg')}}"
                class="rounded-circle" style="width:200px; height:200px; border:3px solid lightgray; object-fit:cover">
        </div>
        <div class="col-8 pt-3">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-middle">
                    <h2>{{ $user->username }}</h2>
                    <follow-button user-id="{{ $user->id }}"></follow-button>
                </div>

                @can('update', $user->profile)
                <a href="{{ url('/') }}/post/create">Add New Post</a>
                @endcan
            </div>

            @can('update', $user->profile)
            <a href="{{ url('/profile/') }}/{{ $user->id }}/edit">Edit Profile</a>
            @endcan

            <div class="d-flex">
                <div class="pr-4"><strong>{{ $user->posts->count() }}</strong> posts</div>
                <div class="pr-4"><strong>####</strong> followers</div>
                <div class="pr-4"><strong>####</strong> following</div>
            </div>
            <div class="pt-3">
                <p><strong> {{ $user->profile->title }}</strong></p>
                <p>
                    {{ $user->profile->description }}
                </p>
                <a href="{{ $user->profile->url }}" target="_blank"
                    rel="noopener noreferrer"><strong>{{ $user->profile->url }}</strong></a>
            </div>
        </div>
    </div>
    <div class="row pt-4">
        @foreach($user->posts as $post)
        <div class="col-4 p-2">
            <a href="{{ url('/post/') }}/{{ $post->id }}">
                <img src="{{url('/storage/')}}/{{ $post->image }}" alt="" height='100%' git width="100%" class=""
                    style="object-fit: cover">
            </a>
        </div>

        @endforeach

        {{-- <div class="col-4 p-2"><a href="#"><img src="https://placeimg.com/250/251/any" alt="" class="w-100"></a></div>
        <div class="col-4 p-2"><a href="#"><img src="https://placeimg.com/251/250/any" alt="" class="w-100"></a></div>
        <div class="col-4 p-2"><a href="#"><img src="https://placeimg.com/250/252/any" alt="" class="w-100"></a></div> --}}
    </div>
</div>
@endsection
