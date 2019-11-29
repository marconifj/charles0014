@extends('adminlte::page')

@section('content_header')
<ol class="breadcrumb">
    <li><a href="/admin">Home</a></li>
    <li>Produtos</li>
    <li>Relatório</li>
</ol>
@stop

@section('content')
<h6>  Total de Produtos: {{$total}}</h6>
<a href="pdfProduto" target="_blank" type="button" class="btn btn-success"><i class="far fa-file-pdf"></i> PDF</a>
<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Descrição</th>
            <th>Preço</th>
        </tr>
    </thead>
    <tbody>
        @foreach($produtos as $produto)
    <input type="hidden" name="id" value="{{ $produto->id }}">
    <tr>
        <td>{{$produto->descricao_produto}}</td>
        <td>{{$produto->valor_produto}}</td>
    </tr>
    @endforeach
</tbody>
</table>
{!! $produtos->links() !!}
@stop
