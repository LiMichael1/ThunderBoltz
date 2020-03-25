@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Followed Users Posts</h1>
    </div>
    @forelse($posts as $post)
    <div class="row my-4">
        <div class="col-10 offset-1">
            <a href="{{ url('/post/') . '/' . $post->id }}">
                <img src="{{ url('/storage/') }}/{{ $post->image }}" alt="" class="w-100">
            </a>
        </div>
    </div>
    <div class="row mb-4">
        <div class="row col-10 offset-1 align-items-start mb-5">
            <div class="col-4 border-right">
                <div class="row pl-3 mb-2">
                    <h2>{{ $post->user->image }}</h2>
                    <a class="row justify-content-center" style="text-decoration:none;"
                        href="{{ url('/profile/') }}/{{ $post->user->id  }}">
                        <img src="{{  $post->user->profile->image ?  url('/storage/') . '/' . $post->user->profile->image : url('/') . '/img/default-profile-pic.jpg' }}"
                            alt="" class="rounded-circle" width="50px" height="50px">
                        <div class="text-primary ml-2" style="align-self: center;"><strong>{{ $post->user->username }}</strong></div>
                    </a>
                </div>
                <div class="d-flex flex-wrap">
                    <div class="d-flex">
                        <div class="mx-1">
                            <a href="#">{{ $post->likes->count() }}</a>
                        </div>
                        <div class="mx-1">
                            <img src="{{url('/svg/transparent-donut.svg')}}" width="25px" alt="" class="icon-white">
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="mx-1">
                            <a href="#">{{ $post->comments->count() }}</a>
                        </div>
                        <div class="mx-1">
                            <i class="far fa-comments"></i>
                        </div>  
                    </div>

                </div>
            </div>
            <div class="col-8">
                
                <p>{{ $post->caption }}</p>
            </div>

        </div>
    </div>
    @empty
        <div class="row">
            <p>You do not follow any profiles</p>
        </div>
    @endforelse
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
