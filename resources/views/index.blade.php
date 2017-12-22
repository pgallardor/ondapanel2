@extends('partials.defaulthead')

@section('title', 'Onda Sonora Admin Panel')

@section('sidebar')
    @parent
@endsection

@section('pagecontent')
{!! Form::open(['method'=>'GET','url'=>'testing','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
     <div class="input-group custom-search-form col-sm-4">
        <input type="text" class="form-control" name="search" placeholder="Busqueda por nombre">
        <span class="input-group-btn">
            <button class="btn btn-default-sm" type="submit">
                <i class="fa fa-search">Buscar</i>
            </button>
        </span>
    </div>                
{!! Form::close() !!}
<br>
<div class="container col-sm-10">
    <div class="table table-bordered table-hover">
        <table style="width: 100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Autor</th>
                    <th>Meta</th>
                    <th>Día término</th>
                    <th>Estado</th>
                    <th>{{--Vacio :DDDD"--}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($project as $pr)
                <tr>
                    <td> {{$pr['name']}} </td>
                    <td> {{$pr['user']['fullname']}} ({{$pr['user']['email']}})</td>
                    <td> {{'$'.$pr['goal']}} </td>
                    <td> {{$pr['deadline']}} <br> {{$pr['remaining'].' dias restantes'}} </td>
                    @if ($pr['status'] == 1)
                        <td>Aceptado</td>
                    @else
                        <td>Por confirmar</td>
                    @endif
                    <td><a href="{{url('project/'.$pr['_id'])}}">Detalles</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection