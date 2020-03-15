@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($posts as $post)
    <div class="row my-4">
        <div class="col-10 offset-1">
            <a href="{{ url('/post/') . '/' . $post->id }}">
                <img src="{{ url('/storage/') }}/{{ $post->image }}" alt="" class="w-100">
            </a>
        </div>
    </div>
    <div class="row mb-4">
        <div class="row col-10 offset-1 align-items-start">
            <div class="col-4 border-right">
                <div class="row pl-3 mb-2">
                <h2>{{ $post->user->image }}</h2>
                    <a class="row justify-content-center" style="text-decoration:none;" href="{{ url('/profile/') }}/{{ $post->user->id  }}">
                        <img src="{{  $post->user->profile->image ?  url('/storage/') . '/' . $post->user->profile->image : url('/') . '/img/default-profile-pic.jpg' }}"
                            alt="" class="rounded-circle" width="50px" height="50px">
                        <div class="text-dark ml-2" style="align-self: center;">{{ $post->user->username }}</div>
                    </a>
                </div>
                <div class="d-flex flex-wrap">
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
            </div>
            <div class="col-8">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia omnis distinctio saepe, id sequi
                    deserunt quod repellat magni odit dolorum molestias iusto officia, eos repellendus reiciendis nobis
                    non quam inventore necessitatibus nulla, quibusdam suscipit accusantium? Esse quidem nemo non minus
                    maxime ratione eaque atque repudiandae hic, modi placeat quas officia.</p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fugit praesentium quod fugiat dolorum
                    repellat! Minima alias beatae blanditiis perspiciatis eos?</p>
                <p>{{ $post->caption }}</p>
            </div>

        </div>
</div>
@endforeach
<div class="row">
    <div class="col-12 d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
</div>
</div>
@endsection
