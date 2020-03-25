@extends('layouts.app')

@section('content')
<div class="container px-5">
    <div class="row align-items-start">
            <div
                class="col-4 p-3 embed-responsive embed-responsive-1by1 text-center  d-flex justify-content-center align-items-start">
                    <img src="{{ $user->profile->image ? url('/storage/') . '/' . $user->profile->image : url('/img/default-profile-pic.jpg')}}"
                        class="rounded-circle embed-responsive-item profile-pic" style="object-fit:cover">
                    @can('update', $user->profile)
                        <a href="{{ url('/profile/') }}/{{ $user->id }}/edit">  
                            <div class="profile-pic-overlay rounded-circle embed-responsive-item">
                                <h3 class="caption neon-white-text">Edit Profile</h3>
                            </div>
                        </a>
                    @endcan
            </div>        
            
        <div class="col-8 pt-3">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-middle">
                    <h2 class="username-text">{{ $user->username }}</h2>
                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                </div>

                @can('update', $user->profile)
                <a href="{{ url('/') }}/post/create" class="glow-button">Add New Post</a>

                <!-- <a href="{{ url('/') }}/post/create">
                    <button class="glow-button">Add New Post</button>
                </a> -->
                @endcan
            </div>

            <div class="d-flex neon-white-text">
                <div class="pr-4"><strong>{{ $posts->count() }}</strong> posts</div>
                <div class="pr-4"><strong>{{ $followersCount}}</strong> followers</div>
                <div class="pr-4"><strong>{{ $followingCount }}</strong> following</div>
            </div>
            <div class="pt-3 neon-white-text quicksand">
                <p><strong> {{ $user->profile->title }}</strong></p>
                <p>
                    {{ $user->profile->description }}
                </p>
                <a href="{{ $user->profile->url }}" target="_blank"
                    rel="noopener noreferrer"><strong>{{ $user->profile->url }}</strong></a>
            </div>
        </div>
    </div>
    <div class="row pt-4 auto-overflow">
        @foreach($user->posts as $post)
        <div class="col-4 p-2 mb-3">
            <a href="{{ url('/post/') }}/{{ $post->id }}">
                <div class="image-overlay image-border">
                    <!-- <i class="fa fa-heart"></i> &nbsp
                    <i class="fa fa-comment"></i> -->
                    <div class="d-flex icon-pos">
                        <div class="d-flex">
                            <div class="mx-1">
                                {{ $post->likes->count() }}
                            </div>
                            <div class="mx-1">
                                <img src="{{url('/svg/transparent-donut.svg')}}" width="25px" alt="" class="icon-white">
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="mx-1">
                                {{ $post->comments->count() }}
                            </div>
                            <div class="mx-1">
                                <i class="far fa-comments"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <img src="{{url('/storage/')}}/{{ $post->image }}" alt="" git height="95%" git width="95%" 
                    class="image-border" style="object-fit: cover">
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
