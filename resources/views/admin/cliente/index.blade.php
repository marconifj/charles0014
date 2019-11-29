@extends('adminlte::page')

@section('content_header')
<h1> Cliente</h1>
<ol class="breadcrumb">
    <li><a href="/admin">Home</a></li>
    <li>Cliente</li>
    <li>Listar</li>
</ol>
@stop

@section('content')
@include('admin.includes.alerts')
<div class="box">
    <!-- /.box-header -->
    <div class="box-body">
        <a class="btn btn-info pull-right" href="{{route('criarCliente')}}"><i class="fas fa-user-plus"></i> Adicionar</a>
        <form action="{{route('searchCliente')}}" method="POST" class="form form-inline">
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
                    <th>Fixo</th>
                    <th>E-mail</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
            <input type="hidden" name="id" value="{{ $cliente->id }}">
            <tr>
                <td>{{$cliente->id}}</td>
                <td>{{$cliente->nome_cliente}}</td>
                <td>{{$cliente->tel_cliente}}</td>
                <td>{{$cliente->cel_cliente}}</td>
                <td>{{$cliente->email_cliente}}</td>
                <td>
                    <a href="clientes/update/{{$cliente->id}}" class="btn btn-success btn-sm mr-1" ><i class="far fa-edit"></i>
                        Editar
                    </a>
                    <a href="clientes/show/{{$cliente->id}}" class="btn btn-info btn-sm mr-1"><i class="fas fa-info"></i>
                        Detalhe
                    </a>
                    <a href="clientes/delete/{{$cliente->id}}" class="btn btn-danger btn-sm mr-1"><i class="far fa-trash-alt"></i>
                        Apagar
                    </a>


                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {!! $clientes->links() !!}
    </div>
    <!-- /.box-body -->
</div>
@stop
