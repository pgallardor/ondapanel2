<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title> CRUD - Añadir usuario/perfil </title>
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
                margin-left: 200px;
            }
            
        </style>
    </head>

    <body class="page-body row">
        <div class="col-sm-4">
            <h3>USUARIO</h3>
            {!! Form::open(['method' => 'POST', 'route' => 'adduser']) !!}
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>

                <div class="form-group">
                    <label for="fullname">Nombre completo</label>
                    <input type="text" class="form-control" id="fullname" name="fullname">
                </div>

                <button class="btn btn-default-sm" type="submit">
                    <i class="fa fa-plus-circle"> Submit</i>
                </button>
            {!! Form::close() !!}
        </div>
        
        <div class="col-sm-4">
        {!! Form::open(['method' => 'POST', 'route' => 'addprofile']) !!}
            <h3>PERFIL</h3>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            
            <div class="form-group">
                <label for="display">Display Name</label>
                <input type="text" class="form-control" id="display" name="display">
            </div>
            
            <div class="form-group">
                <label for="bday">Fecha nacimiento</label>
                <input type="date" class="form-contrl" id="bday" name="bday">
            </div>
            
            <div class="form-group">
                <label for="country">País</label>
                <input type="text" class="form-control" id="country" name="country">
            </div>
            
            <div class="form-group">
                <label for="user">Usuario a asignar</label>
                <select name="user">
                    @foreach($users as $user)
                        <option value={{ $user['_id'] }}>{{ $user['fullname'] }}</option>
                    @endforeach
                </select>
            </div>
            
            <button class="btn btn-default-sm" type="submit">
                <i class="fa fa-plus-circle"> Submit</i>
            </button>
        {!! Form::close() !!}
        </div>
        
        <br>
        <a href={{url('/add')}}>Volver</a>
    </body>
</html>