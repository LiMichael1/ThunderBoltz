@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="{{ url('/storage/') }}/{{ $post->image }}" alt="" class="w-100">
        </div>
        <div class="col-4">
            <div class="row px-3 pb-2" style="align-items:center">
                <a class="row d-flex" style="text-decoration:none" href="{{ url('/profile/') }}/{{ $post->user->id  }}">
                    <img src="{{  $post->user->profile->image ?  url('/storage/') . '/' . $post->user->profile->image : url('/') . '/img/default-profile-pic.jpg' }}"
                        alt="" class="rounded-circle mr-2" width="50px" height="50px">
                    <div class="text-dark pr-2" style="align-self: center;">{{ $post->user->username }}</div>
                </a>
                <div class="pl-3">|</div>
                <follow-button user-id="{{ $post->user->id }}" follows="{{ $follows }}"></follow-button>
            </div>
            <div class="d-flex flex-wrap border-bottom pb-2">
                <div class="d-flex">
                    <div class="mx-1">
                        <img src="{{url('/svg/donut-mini.svg')}}" width="25px" alt="">
                    </div>
                    <div class="mx-1">
                        <a href="#">Yum</a>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="mx-1">
                        <i class="far fa-comments"></i>
                    </div>
                    <div class="mx-1">
                        <a href="#">Comment</a>
                    </div>
                </div>

            </div>
            <p>{{ $post->caption }}</p>
        </div>
    </div>
</div>
@endsection
