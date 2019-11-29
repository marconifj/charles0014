@extends('adminlte::page')

@section('content_header')
<link href="{{ asset('plugins\DataTables\datatables.min.css') }}" rel="stylesheet">
<h1>Entregador</h1>
<ol class="breadcrumb">
    <li><a href="/admin">Home</a></li>
    <li>Entregador</li>
    <li>Listar</li>
</ol>
@stop
@section('content')
@include('admin.includes.alerts')
<div class="box">
    <!-- /.box-header -->
    <div class="box-body">
        <a class="btn btn-info pull-right" href="{{route('criarEntregador')}}"><i class="fas fa-user-plus"></i> Adicionar</a>
        <form action="{{route('searchEntregador')}}" method="POST" class="form form-inline">
            {!! csrf_field() !!}
            <div class="form-group">
                <div class="input-group">
                    <input id="data" name="data" placeholder="Pesquisar" class="form-control" type="text">
                    <span class="input-group-addon"><i class="fas fa-search"></i></span>
                </div>
            </div>
        </form>
        <br>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Celular</th>
                    <th>Veiculo</th>
                    <th>Placa</th>
                    <th>E-mail</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($entregadors as $entregador)
            <input type="hidden" name="id" value="{{ $entregador->id }}">
            <tr>
                <td>{{$entregador->id}}</td>
                <td>{{$entregador->nome_entregador}}</td>
                <td>{{$entregador->celular_entregador}}</td>
                <td>{{$entregador->veiculo_entregador}}</td>
                <td>{{$entregador->placa_veiculo_entregador}}</td>
                <td>{{$entregador->email_entregador}}</td>
                <td>
                    <a href="entregadores/update/{{$entregador->id}}" class="btn btn-success btn-sm mr-1" ><i class="far fa-edit"></i>
                        Editar
                    </a>
                    <a href="entregadores/show/{{$entregador->id}}" class="btn btn-info btn-sm mr-1"><i class="fas fa-info"></i>
                        Detalhe
                    </a>
                    <a href="entregadores/delete/{{$entregador->id}}" class="btn btn-danger btn-sm mr-1"><i class="far fa-trash-alt"></i>
                        Apagar
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {!! $entregadors->links() !!}
    </div>
    <!-- /.box-body -->
</div>

@stop
