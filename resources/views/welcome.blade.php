<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My PhoneBook</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
            html, body {
                background-color: #b9c7ce;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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
                position: absolute;
                color: #4a388c;
                font-size: 50px;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                color: #4a388c;
                right: 30px;
                top: 20px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 80px;
            }

            .links > a {
                color: #f2ebea;
                padding: 0 25px;
                font-size: 30px;
                font-weight: 900;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    My PhoneBook
                </div>
            @if (Route::has('login'))
                <div class="flex-center links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        
        <a class="btn btn-primary" href="{{ route('login') }}" role="button">Login</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                        
        <a class="btn btn-primary" href="{{ route('register') }}" role="button">Register</a>  
                    @endauth
                </div>
            @endif

                
            </div>
        </div>
    </body>
</html>
