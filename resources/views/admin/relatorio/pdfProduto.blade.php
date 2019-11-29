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
        <h4>Produtos</h4> 
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th></th>
                    <th>Preço</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produtos as $produto)
                <tr>
                    <td>{{$produto->descricao_produto}}</td>
                    <td></td>
                    <td>{{$produto->valor_produto}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
