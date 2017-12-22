@extends('partials.defaulthead')

@section('title', 'Onda Sonora - Pagos')

@section('toolbar')
    @parent
@endsection

@section('pagecontent')

{!! Form::open(['method'=>'GET','url'=>'#','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
     <div class="input-group custom-search-form col-sm-6">
        <input type="text" class="form-control" name="search" placeholder="Busqueda por nombre">
        <select name="dates">
            <option value="all">Todos los periódos &emsp;</option>
            @foreach($dates as $date)
                <option value={{ $date['value'] }}> {{ $date['string'] }} </option>
            @endforeach
        </select>
        <span class="input-group-btn">
            <button class="btn btn-default-sm" type="submit">
                <i class="fa fa-search">Buscar</i>
            </button>
        </span>
    </div>                
{!! Form::close() !!}
<br>
@foreach($projects as $project)
    <div class="container col-sm-6">
      <div class="panel panel-primary">
        <div class="alert alert-dark" role="alert">
          <h4 class="alert-heading">
              <center>
                  <a class="" data-toggle="collapse" href={{ '#'.$project['reference'] }}>
                    {{ $project['name'] }}
                  </a>
              </center>
          </h4>
        </div>
      </div>
        <div id={{ $project['reference'] }} class="panel-collapse collapse">
            <table class="table table-bordered">
                <tr>
                    <th>Monto</th>
                    <th>Username</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                    <th>Plan escogido</th>
                </tr>
            @foreach($project['pays'] as $payment)        
                <tr>
                    <td>{{'$'.$payment['amount']}}</td>
                    <td>{{$payment['user']['email']}}</td>
                    <td>{{ 'Pagado' }}</td> <!-- Change later-->
                    <td>{{ $payment['date'] }}</td>
                    <td>{{ $payment['plan'] }}</td>
                </tr>
            @endforeach
            </table>
            <a href={{url('/generate_pdf/'.$project['_id'])}}> Generar PDF </a> <br>
        </div>
    </div> 
@endforeach

@endsection