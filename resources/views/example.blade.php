<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">        
        
        <!-- Styles -->
    
        <style>
        
          @font-face{
            font-family: 'airstreamregular';
            src: url('fonts/Airstream-webfont.eot');
            src: url('fonts/Airstream-webfont.eot?#iefix') format('embedded-opentype'),
            url('fonts/Airstream-webfont.woff') format('woff'),
            url('fonts/Airstream-webfont.ttf') format('truetype'),
            url('fonts/Airstream-webfont.svg#Lakeshore') format('svg');
            font-weight:normal;
            font-style: normal;
          }
          html,body{
          height: 20%;
          }
           
          
            .logo-text{
            font-family: airstreamregular;
            background:lightblue;
            font-size: 47px;
            margin-top:0px;
            
            margin-left: 0px;
            text-shadow: rgba(0,0,0,0.9) 1px 2px 9px;
            }
            .row{     
              margin-top: 0;
              background: white;
            }
            .demo-content{
                padding: 60px;
                font-size: 20px;
               
                margin-top: 0px;
            }
            .demo-content.bg-alt{
              padding: 60px;
              font-size: 20px;
              
              margin-top: 0px;
            }
        </style>
      </head>
    
<body>
    <div class="container">
        <!--Row with two equal columns-->
        <div class="row">
            <div class="col"><img src="img/banner.jfif"> </div>
          
        </div>
        <div class="logo-text">Foodie</div>

        <div class="row">
                      
                <div class="col-md-6">
                    <div class="demo-content">

                    <p> Welcome to Foodie! <br> 
                    Group Name: ThunderBoltz <br>
                        Brian Warfield <br>
                        Michael Li <br>
                        Brendon Linthurst <br>
                        Gita Nikzad <br>
                      

                    </p>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="demo-content bg-alt">
                    <p>This website works like Instagram. It has several pages that show comments and 
                    followers, and users can follow others much like Instagram, the only difference is that every post is food.
                    Users can like the food that they enjoy and can follow people who have the best food posts to
                      see more good food from them.</p>
                    </div>
                </div>
            </div>
        
    </div>
     

</body>
    
</html>

