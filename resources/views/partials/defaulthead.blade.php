<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title> @yield('title') </title>
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
                margin-top: 50px;
                margin-left: 10px;
            }
            
        </style>
    </head>

    <body style="background-color:#E0E0E0">
        
        @section('toolbar')
            <div class="pos-f-t">
              <div class="collapse" id="navbarToggleExternalContent">
                <div class="bg-dark-prpl p-4">
                  <h4 class="text-white">
                    <div class="row">
                          <div class="container col-sm-2">
                              <a href="{{ url('/testing') }}">
                                <i class="fa fa-home" aria-hidden="true"></i> Home
                              </a>
                          </div>
                          <div class="container col-sm-2">
                              <a href="{{ url('/users') }}">
                                <i class="fa fa-user" aria-hidden="true"></i> Usuarios
                              </a>
                          </div>
                          <div class="container col-sm-2">
                              <a href="{{ url('/project') }}">
                                <i class="fa fa-star-o" aria-hidden="true"></i> Proyectos
                              </a>
                          </div>
                          <div class="container col-sm-2">
                              <a href="{{ url('/payments') }}">
                                <i class="fa fa-money" aria-hidden="true"></i> Pagos
                              </a>
                          </div>          
                          <div class="container col-sm-2">
                              <a href="{{ url('/admins') }}">
                                <i class="fa fa-at" aria-hidden="true"></i> Admins
                              </a>
                          </div>
                          <div class="container col-sm-2">
                             <!-- <a href="#">
                                <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
                              </a> -->
                              
                              {!! Form::open(['method' => 'POST', 'url' => 'logout']) !!}
                                <button class="btn btn-default-sm" type="submit">
                                    <i class="fa fa-sign-out"> Logout</i>
                                </button>
                              {!! Form::close() !!}
                          </div>
                    </div>
                  </h4>
                  <!--<span class="text-muted">Toggleable via the navbar brand.</span> -->
                </div>
              </div>
              <nav class="navbar navbar-dark bg-purple">
                <h4 class="text-white">Onda Sonora Admin Panel | {{ $pagename }} </h4>  
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="container">
                        <i class="fa fa-cogs"></i>
                    </span>
                </button>
              </nav>
            </div>
        @show

        <div class="page-body">
            @yield('pagecontent')
        </div>
        
        <script>
            @yield('scripts')
        </script>
           
    </body>
</html>