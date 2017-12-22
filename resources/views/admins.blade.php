@extends('partials.defaulthead')

@section('title', 'Onda Sonora - Administradores')

@section('toolbar')
    @parent
@endsection

@section('pagecontent')
{!! Form::open(['method' => 'POST', 'url' => 'signup']) !!}
    <center>
        <div class="form-group col-sm-4">
            <label for="username">Admin name</label>
            <input type="text" class="form-control" id="name" name="username">
            
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <button class="btn btn-default-sm" type="submit">
            <i class="fa fa-plus">Agregar</i>
        </button>
    </center>
{!! Form::close() !!}
@endsection