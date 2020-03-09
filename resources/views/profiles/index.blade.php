@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4 p-3 text-center">
            <img src="https://placeimg.com/250/250/any" class="img-fluid rounded-circle" style="max-width=175px; border:3px solid lightgray">
        </div>
        <div class="col-8 pt-3">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-middle">
                    <h2>{{ $user->username }}</h2>
                    <div class="btn btn-primary ml-4 h-75">Follow</div>
                </div>
            <a href="{{ url('/') }}/post/create">Add New Post</a>
            </div>
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
            <a href="#" target="_blank" rel="noopener noreferrer"><strong>{{ $user->profile->url }}</strong></a>
            </div>
        </div>
    </div>
    <div class="row pt-4">
        @foreach($user->posts as $post)
            <div class="col-4 p-2">
            <a href="{{ url('/post/') }}/{{ $post->id }}">
                    <img src="{{url('/storage/')}}/{{ $post->image }}" alt="" height='100%' git width="100%" class="" style="object-fit: cover">
                </a>
            </div>

        @endforeach

        {{-- <div class="col-4 p-2"><a href="#"><img src="https://placeimg.com/250/251/any" alt="" class="w-100"></a></div>
        <div class="col-4 p-2"><a href="#"><img src="https://placeimg.com/251/250/any" alt="" class="w-100"></a></div>
        <div class="col-4 p-2"><a href="#"><img src="https://placeimg.com/250/252/any" alt="" class="w-100"></a></div> --}}
    </div>
</div>
@endsection
