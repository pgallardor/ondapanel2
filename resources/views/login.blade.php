<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title> Login a Admin Panel </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

        
        <style>
            .bg-purple {
                background-color: #660066;
                background-image: none;
                background-repeat: no-repeat;
            }
            
            .bg-dark-prpl {
                background-color: #330033;
            }
            
            .page-body {
                margin-top: 200px;
                background-color: #E0E0E0;
                margin-left: 10px;
            }
            
        </style>
    </head>

    <body class="page-body">
        {!! Form::open(['method' => 'POST', 'url' => '/signin']) !!}
        <center>
            <div class="form-group col-sm-4">
                <label for="username">Admin name</label>
                <input type="text" class="form-control" id="name" name="username">
            </div>
            
            <div class="form-group col-sm-4">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            
            {{ csrf_field() }}

            <button class="btn btn-default-sm" type="submit">
                <i class="fa fa-gear"> Entrar</i>
            </button>
        </center>
        {!! Form::close() !!}
    </body>
</html>