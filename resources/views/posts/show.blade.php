@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="{{ url('/storage/') }}/{{ $post->image }}" alt="" class="w-100">
        </div>
        <div class="col-4">
            {{-- <h3>{{ $post->user->username }}</h3> --}}
            <div class="row px-3 pb-2" style="border-bottom:1px solid grey; align-items:center">
                <a class="row d-flex" style="text-decoration:none" href="{{ url('/profile/') }}/{{ $post->user->id  }}">
                    <img src="{{  $post->user->image ?  url('/storage/') . '/' . $post->user->image : url('/') . '/img/default-profile-pic.jpg' }}"
                        alt="" class="rounded-circle mr-2" width="50px" height="50px">
                    <div class="text-dark pr-2" style="align-self: center;">{{ $post->user->username }}</div>
                </a>
                <div class="pl-3">|</div>
                <a href="#" class="pl-3" style="align-self: center;">Follow</a>
        </div>

        <p>{{ $post->caption }}</p>
    </div>
</div>
</div>
@endsection
