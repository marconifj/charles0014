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
        <h4>Entregas</h4>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Codigo entrega</th>
                    <th>Status</th>
                    <th>Cliente</th>
                    <th>Produto</th>
                    <th>Entregador</th>
                    <th>Destino/Bairro</th>
                    <th>Total R$</th>
                </tr>
            </thead>
            <tbody>
                @foreach($entregas as $entrega)
            <input type="hidden" name="id" value="{{ $entrega->id }}">
            <tr>
                <td>{{$entrega->codigo_entrega}}</td>
                <td>{{$entrega->descricao_status}}</td>
                <td>{{$entrega->nome_cliente}}</td>
                <td>{{$entrega->descricao_produto}}</td>
                <td>{{$entrega->nome_entregador}}</td>
                <td>{{$entrega->bairro_endereco}}</td>
                <td>{{$entrega->total_entrega}}</td>
                @endforeach
                </tbody>
        </table>
    </body>
</html>
