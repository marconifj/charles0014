@extends('adminlte::page')

@section('content_header')
<ol class="breadcrumb">
    <li><a href="/admin">Home</a></li>
    <li>Cliente</li>
    <li>Relatório</li>
</ol>
@stop

@section('content')
<h6>  Total de clientes: {{$total}}</h6>
<a href="pdfCliente" target="_blank" type="button" class="btn btn-success"><i class="far fa-file-pdf"></i> PDF</a>
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
    <input type="hidden" name="id" value="{{ $cliente->id }}">
    <tr>
        <td>{{$cliente->nome_cliente}}</td>
        <td>{{$cliente->tel_cliente}}</td>
        <td>{{$cliente->cel_cliente}}</td>
        <td>{{$cliente->email_cliente}}</td>
    </tr>
    @endforeach
</tbody>
</table>
{!! $clientes->links() !!}
@stop
