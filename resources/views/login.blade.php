<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="containner-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Log In</h3>
                        {{ Form::open(array('url'=> 'login'))}}

                        {{ Form::label('username', 'Username')}}
                        {{ Form::text('username')}}

                        {{ Form::label('password', 'Password')}}
                        {{ Form::password('password')}}

                        {{ Form::submit('Login')}}
                    </div>
                </div>

            </div>
        </div>
    </body>
</html>
