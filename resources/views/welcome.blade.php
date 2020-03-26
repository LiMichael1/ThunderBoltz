<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Permanent+Marker|Quicksand|Rock+Salt&display=swap" rel="stylesheet">
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #fff;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .group-bg{
              background-color: #6441A5!important;
            }

            .text-style {
              font-family: 'Quicksand', sans-serif;
              font-size: 20px;
              font-weight: bold;
            }

            .group-name-font {
              font-size: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height neon-white-text">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content land-logo">
                <div class="title m-b-md header-text">
                    Foodies
                </div>

                <div class="row d-flex text-style">
                    <div class="col-6 ">
                      Group Name: <strong class="username-text ml-4 group-name-font">ThunderBoltz</strong>
                      <ul class="list-group">
                        <li class="list-group-item group-bg">Brian Warfield</li>
                        <li class="list-group-item group-bg">Michael Li</li>
                        <li class="list-group-item group-bg">Brendon Linthurst</li>
                        <li class="list-group-item group-bg">Gita Nikzad</li>
                      </ul>
                    </div>
                    <div class="col-6">
                      Photo Website for foodies to 
                      <ul class="list-group">
                        <li class="list-group-item group-bg">Share what they're eating</li>
                        <li class="list-group-item group-bg">Follow other fellows</li>
                        <li class="list-group-item group-bg">Comment on the Food Photos</li>
                        <li class="list-group-item group-bg">Provide support to fellow fodoies by smashing that YUM button</li>
                      </ul> 
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
