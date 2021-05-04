<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/custom-css/custom.css') }}" rel="stylesheet" type="text/css">
    </head>
<body>
@if(session()->has('message'))
<div class="alert alert-success" role="alert">
<strong>Message: </strong>{{ session()->get('message') }}
    </div>
@endif
<div class="container" style="height:500px !important">

            <h1 id="main-title">Sign In</h1>
            <p id="subtitle">It only takes a minute!</p>
            <form method="post" id="LoginForm" action="{{ asset('users') }}">
            {{ csrf_field() }}
                <div id="username" class="placeholders">
                    <label id="pl_username" for="text" class="">Enter Username</label>
                    <input  id="pl_username" type="text" name="username" placeholder="Enter Username...">
                </div>
                <div id="password" class="placeholders">
                    <label id="pl_password" for="text" class="">Enter Password</label>
                    <input  id="pl_password" type="password" name="password" placeholder="Enter Password...">
                </div>                

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                <br><br>
            
                <button id="a-submit" type="submit">Submit</button>

              </form> 

              <p id="subtitle"><a href="{{ url('/') }}">Back to home</a></p>
        </div>

        <script src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
        <script>
            $('#LoginForm').validate({// initialize the plugin
                rules: {
                    username: {
                        required: true,
                    },
                    password: {
                        required: true,
                    },                    
                }

            });
        </script>  

<!-- <p class="credit">Developed by <a href="http://www.designtheway.com" target="_blank">Design the way</a></p> -->
</body>
</html>