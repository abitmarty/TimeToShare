<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

        <title>Lenen</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="css/decss.css">
        <link rel="stylesheet" type="text/css" href="css/hoofdcss.css">
    </head>
    <body>
        <div class="center">
            @if (Route::has('login'))
                <div id="niks" class="top-right links">
                    @auth
                        <a class="Loging" href="{{ url('/home') }}">Home</a>
                    @else
                        <a class="Loging" href="{{ route('login') }}">Login</a>
                        <a class="Loging" href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <p id="leen" >Leen en leenuit</p>
            </div>
        </div>
    </body>
</html>
