<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>

    <body>
        <h1> Pagos para {{ $project['name'] }} </h1>
        <br>
        <table border="1">
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
                    <td>{{ $payment['user']['email']}}</td>
                    <td>{{ $payment['status']}}</td>
                    <td>{{ $payment['date'] }}</td>
                    <td>{{ $payment['plan'] }}</td>
                </tr>
            @endforeach
            </table>  
    </body>
</html>