@extends('partials.defaulthead')

@section('title', 'Onda Sonora - Usuarios')

@section('toolbar')
    @parent
@endsection

@section('pagecontent')
{!! Form::open(['method'=>'GET','url'=>'users','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
     <div class="input-group custom-search-form col-sm-4">
        <input type="text" class="form-control" name="search" placeholder="Busqueda por username">
        <span class="input-group-btn">
            <button class="btn btn-default-sm" type="submit">
                <i class="fa fa-search">Buscar</i>
            </button>
        </span>
    </div>                
{!! Form::close() !!}
<br>
<div class="container col-md-7">
    <div class="table">
        <table>
            <tr>
                <th><i>Username</i></th>
                <th>Nombre completo</th>
                <th>Ciudad</th>
                <th>País</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td> {{$user['email']}} </td>
                <td> {{$user['fullname']}}</td>
                <td> Por agregar </td>
                <td> {{$user['profile']['country']}} </td>
                @if ($user['status'] == 1)
                    <td>Activo</td>
                @elseif ($user['status'] == 0)
                    <td>Pendiente</td>
                @else
                    <td>Baneado</td>
                @endif
                <td>
                    @if ($user['status'] == 1)
                        {!! Form::open(['method' => 'POST', 'url' => url('users/'.$user["_id"].'/-1')]) !!}
                            {!! Form::submit('Ban', ['onclick' => 'true']) !!}
                        {!! Form::close() !!}
                    @elseif($user['status'] == -1)
                        {!! Form::open(['method' => 'POST', 'url' => url('users/'.$user["_id"].'/0')]) !!}
                            {!! Form::submit('Unban', ['onclick' => 'true']) !!}
                        {!! Form::close() !!}
                    @else
                        {!! Form::open(['method' => 'POST', 'url' => url('users/'.$user["_id"].'/1')]) !!}
                            {!! Form::submit('Confirmar', ['onclick' => 'true']) !!}
                        {!! Form::close() !!}
                    @endif
                </td>
                <td>
                    <a href={{ url('users/'.$user['_id']) }}>Ver perfil</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
