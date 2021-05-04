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
<div class="container">
            <h1 id="main-title">Sign Up</h1>
            <p id="subtitle">It only takes a minute!</p>
            <form method="post" id="SignupForm" action="/signup">
                <div id="pl_username" class="placeholders">
                    <label id="pl_username" for="text" class="">User name</label>
                    <input  id="username" type="text" name="username" placeholder="Enter your User name...">
                </div>

                <div id="pl_password" class="placeholders">
                    <label id="pl_password" for="text" class="">Password </label>
                    <input  id="password" type="text" name="password" maxlength="50" placeholder="Enter your Password...">
                </div>

                <div id="confirm_password" class="placeholders">
                    <label id="pl_confirm_password" for="text" class="">Confirm Password </label>
                    <input required id="pl_confirm_password" type="text" name="confirm_password" maxlength="50" placeholder="Confirm Password...">
                </div>                

                <div id="pl_email" class="placeholders">
                    <label id="pl_email" for="text" class="">Email</label>
                    <input  id="email" type="email" name="email" placeholder="Enter your email...">
                </div>

                <div id="dob" class="placeholders">
                    <label id="pl_dob" for="text" class="">Date of birth</label>
                    <input  id="pl_dob" type="date" name="dob" placeholder="Enter your Date of birth...">
                </div>

                <div id="city" class="placeholders">
                    <label id="pl_city" for="text" class="">City</label>
                    <input  id="pl_city" type="text" name="city" placeholder="Enter your City...">
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                <br><br>
            
                <button id="a-submit" type="submit">Submit</button>

              </form> 
              <p id="subtitle"><a href="{{ url('/') }}">Back to home</a></p>
        </div>

        <script src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
        <script type="text/javascript">
                        $(document).ready(function (){
                $('#SignupForm').validate({// initialize the plugin
//                    ignore: ":hidden:not(.appr-select)",
                    rules: {                      
                        username: {
                            required: true,
                            // remote: {
                            //     url: "{{url("/checkusername")}}",
                            //     type: "get",
                            //     data: {
                            //         username: function () {
                            //             return $("#username").val();
                                        
                            //         }
                            //     }
                            // }
                        },
                        dob: {
                            required: true,
                        },
                        city: {
                            required: true,
                        },                        
                        email: {
                            required: true,
                        },

                        password: {
                            required: true,
                            minlength: 6,
                        },
                        confirm_password: {
                            required: true,
                            minlength: 6,
                            equalTo: "#password"
                        },                        
                    },
                    // messages: {

                    //     username: {
                    //         remote: "Username Already Exists.",
                    //     },

                    // },


                });                
            });
        </script> 


<!-- <p class="credit">Developed by <a href="http://www.designtheway.com" target="_blank">Design the way</a></p> -->
</body>
</html>