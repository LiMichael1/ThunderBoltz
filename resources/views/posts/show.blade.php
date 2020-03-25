@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="{{ url('/storage/') }}/{{ $post->image }}" alt="" class="w-100 post-image">
        </div>
        <div class="col-4">
            <div class="row px-3 pb-2" style="align-items:center">
                <a class="row d-flex" style="text-decoration:none" href="{{ url('/profile/') }}/{{ $post->user->id  }}">
                    <img src="{{  $post->user->profile->image ?  url('/storage/') . '/' . $post->user->profile->image : url('/') . '/img/default-profile-pic.jpg' }}"
                        alt="" class="rounded-circle mr-2" width="50px" height="50px">
                    <div class="pr-2" style="align-self: center;">{{ $post->user->username }}</div>
                </a>
                <div class="pl-3">|</div>
                <follow-button user-id="{{ $post->user->id }}" follows="{{ $follows }}"></follow-button>
            </div>
            <div class="d-flex flex-wrap border-bottom pb-2">
                <div class="d-flex">
                    <div class="mx-1">
                        <a href="#"> {{ $likes_count }}</a>
                    </div>
                    <div class="mx-1">
                        <!-- <img src="{{url('/svg/transparent-donut.svg')}}" width="25px" alt="" class="icon-white"> -->
                        <like-button post-id="{{ $post->id }}" liked="{{ $liked_post }}"></like-button>
                    </div>
                    
                </div>
                <div class="d-flex">
                    <div class="mx-1">
                        <a href="#">{{ $comments_count }}</a>
                    </div>
                    <div class="mx-1">
                        <i class="far fa-comments"></i>
                    </div>
                </div>

            </div>
            <p>{{ $post->caption }}</p>

            @foreach($post->comments as $comment)
                <p class="d-block">
                    <strong class="mr-4 com-usr">{{ $comment->user->username }}</strong>
                    {{ $comment->body }}
                </p>
            @endforeach
            <form action="{{url('/')}}/comment" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="form-group">
                    <textarea class="form-control" name="body"></textarea>
                    <input type="hidden" name="post_id" value="{{ $post->id }}"/>
                </div>
                <div class="form=group">
                    <input type="submit" class="btn btn-primary" value="Add Comment">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
