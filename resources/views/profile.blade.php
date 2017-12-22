@extends('partials.defaulthead')

@section('title', 'Onda Sonora - Perfil')

@section('toolbar')
    @parent
@endsection

@section('pagecontent')
    <a href={{url('/users')}}>Volver</a>
    <div class="container col-sm-6">
        <h1> Perfil de: {{$user['fullname'].'('.$user['email'].')'}} </h1>
        <br>
        <div class="table">
            <table>
                <tr>
                    <th>Nombre público</th>
                    <td>{{$user['profile']['display_name']}}</td>
                </tr>
                <tr>
                    <th>Nombre usuario</th>
                    <td>{{$user['profile']['username']}}</td>
                </tr>
                <tr>
                    <th>País origen</th>
                    <td>{{$user['profile']['country']}}</td>
                </tr>
                <tr>
                    <th>Cumpleaños</th>
                    <td>{{$user['profile']['birthday']}}</td>
                </tr>
                <tr>
                    <th>Última modificación</th>
                    <td> {{$user['profile']['updated_at']}} </td>
                </tr>
            </table>    
        </div>
@endsection