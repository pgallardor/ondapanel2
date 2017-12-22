<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title> CRUD - Añadir proyecto/plan </title>
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

    <body class="page-body">
        <div class="row">
            <div class="col-sm-4">
                <h3>PROYECTO</h3>
                {!! Form::open(['method' => 'POST', 'route' => 'addproject']) !!}
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>

                    <div class="form-group">
                        <label for="descr">Descripcion corta</label>
                        <input type="text" class="form-control" id="descr" name="descr">
                    </div>

                    <div class="form-group">
                        <label for="mode">Modalidad</label>
                        <select name="mode">
                            <option value="flex">Flex</option>
                            <option value="aon">Todo o nada</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="cat">Categoría</label>
                        <select name="cat">
                            <option value="music">Música</option>
                            <option value="art">Arte</option>
                            <option value="audvisual">Audiovisual</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="goal">Meta en CLP</label>
                        <input type="number" class="form-control" id="goal" name="goal">
                    </div>

                    <div class="form-group">
                        <label for="user">Usuario creador</label>
                        <select name="user">
                            @foreach($users as $user)
                                <option value={{$user['_id']}}>{{ $user['fullname'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button class="btn btn-default-sm" type="submit">
                        <i class="fa fa-plus-circle"> Submit</i>
                    </button>
                {!! Form::close() !!}
            </div>

            <div class="col-sm-4">
            {!! Form::open(['method' => 'POST', 'route' => 'addplan']) !!}
                <h3>PLAN</h3>
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="form-group">
                    <label for="brief">Resumen</label>
                    <input type="text" class="form-control" id="brief" name="brief">
                </div>

                <div class="form-group">
                    <label for="descr">Descripción</label>
                    <input type="text" class="form-control" id="descr" name="descr">
                </div>

                <div class="form-group">
                    <label for="floor">Piso</label>
                    <input type="number" class="form-control" id="floor" name="floor">
                </div>

                <div class="form-group">
                    <label for="project">Proyecto a asignar</label>
                    <select name="project">
                        @foreach($projects as $project)
                            <option value={{ $project['_id'] }}> {{ $project['name'] }} </option>
                        @endforeach
                    </select>
                </div>

                <button class="btn btn-default-sm" type="submit">
                    <i class="fa fa-plus-circle"> Submit</i>
                </button>
            {!! Form::close() !!}
            </div>
        </div>
        
        <br>
        
        <div class="row">
            <div class="col-sm-4">
            {!! Form::open(['method' => 'POST', 'route' => 'addpayment']) !!}
                <h3>PAGO</h3>
                <div class="form-group">
                    <label for="amount">Monto en CLP</label>
                    <input type="number" class="form-control" id="amount" name="amount">
                </div>

                <div class="form-group">
                    <label for="method">Método</label>
                    <select name="method">
                        <option value="paypal">PayPal</option>
                        <option value="khipu">Khipu</option>
                        <option value="machete">Plata macheteada</option>
                    </select>
                </div>

                <!--<div class="form-group">
                    <label for="floor"></label>
                    <input type="number" class="form-control" id="floor" name="floor">
                </div> -->
                
                <div class="form-group">
                    <label for="user">Usuario a asignar</label>
                    <select name="user">
                        @foreach($users as $user)
                            <option value={{ $user['_id'] }}> {{ $user['fullname'] }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="plan">Plan a asignar</label>
                    <select name="plan">
                        @foreach($plans as $plan)
                            <option value={{ $plan['_id'] }}> {{ $plan['name'] }} </option>
                        @endforeach
                    </select>
                </div>

                <button class="btn btn-default-sm" type="submit">
                    <i class="fa fa-plus-circle"> Submit</i>
                </button>
            {!! Form::close() !!}
            </div>
        </div>
        
        <br>
        <a href={{url('/add')}}>Volver</a>
    </body>
</html>