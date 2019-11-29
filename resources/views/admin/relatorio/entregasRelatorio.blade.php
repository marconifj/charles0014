@extends('adminlte::page')

@section('content_header')
<ol class="breadcrumb">
    <li><a href="/admin">Home</a></li>
    <li>entrega</li>
    <li>Relatório</li>
</ol>
@stop
@section('content')
<h6>  Total de entregas: {{$total}}</h6>
<a href="pdfEntrega" target="_blank" type="button" class="btn btn-success"><i class="far fa-file-pdf"></i> PDF</a>
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
{!! $entregas->links() !!}
@stop
