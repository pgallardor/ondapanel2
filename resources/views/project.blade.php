@extends('partials.defaulthead')

@section('title', 'Onda Sonora Project')

@section('toolbar')
    @parent
@endsection

@section('pagecontent')
    <a href={{url('/project')}}>Volver</a>
    <div class="container col-sm-6">
        <h1> Revisando: {{$pdetail['name']}} </h1>
        <br>
        <div class="table">
            <table>
                <tr>
                    <th>Titulo proyecto</th>
                    <td>{{$pdetail['name']}}</td>
                </tr>
                <tr>
                    <th>Descripción</th>
                    <td>{{$pdetail['descr']}}</td>
                </tr>
                <tr>
                    <th>Modalidad</th>
                    @if ($pdetail)
                        <td>Flex</td>
                    @else
                        <td>Todo o nada</td>
                    @endif
                </tr>
                <tr>
                    <th>Meta</th>
                    <td>{{'$'.$pdetail['goal']}}</td>
                </tr>
                <tr>
                    <th>Fecha término</th>
                    <td>{{$pdetail['deadline']}}<br> {{$pdetail['remaining'].'dias restantes'}}</td>
                </tr>
                <tr>
                    <th>Categoría</th>
                    <td> {{$pdetail['cat']}} </td>
                </tr>
                <tr></tr>
                <tr>
                    <th>Creado por</th>
                    <td> {{'@'.$creator['username']}} - <a href="{{url('/users/'.$creator['id'])}}">Revisar perfil</a></td>
                </tr>
            </table>    
        </div>
        {!! Form::open(['method' => 'POST', 'url' => url('project/'.$pdetail["_id"].'/1')]) !!}
        {!! Form::submit('Aceptar', ['onclick' => 'true']) !!}
        {!! Form::close() !!}

        {!! Form::open(['method' => 'POST', 'url' => url('project/'.$pdetail["_id"].'/0')]) !!}
        {!! Form::submit('Desaceptar :DDD', ['onclick' => 'true']) !!}
        {!! Form::close() !!}
    </div>
@endsection