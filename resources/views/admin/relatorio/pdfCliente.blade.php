<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <hr>
        <h6>  Total  {{$total}}</h6>
        <h4>Clientes</h4>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Celular</th>
                    <th>Fixo</th>
                    <th>E-mail</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                <tr>
                    <td>{{$cliente->nome_cliente}}</td>
                    <td>{{$cliente->tel_cliente}}</td>
                    <td>{{$cliente->cel_cliente}}</td>
                    <td>{{$cliente->email_cliente}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
