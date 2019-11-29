@extends('adminlte::page')


@section('content_header')
<h1>Entrega</h1>
<ol class="breadcrumb">
    <li><a href="/admin">Home</a></li>
    <li>Entrega</li>
    <li>Listar</li>
</ol>
@stop
@section('content')
@include('admin.includes.alerts')
<div class="box">
    <!-- /.box-header -->
    <div class="box-body">
        <a class="btn btn-info pull-right" href="{{route('criarEntrega')}}"><i class="fas fa-user-plus"></i> Adicionar</a>
        <form action="{{route('searchEntrega')}}" method="POST" class="form form-inline">
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
                    <th>Codigo entrega</th>
                    <th>Status</th>
                    <th>Cliente</th>
                    <th>Produto</th>
                    <th>Entregador</th>
                    <th>Destino/Bairro</th>
                    <th>Total R$</th>
                    <th>Ações</th>
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
                <td>
                    <a href="entregas/update/{{$entrega->id}}" class="btn btn-success btn-sm mr-1" ><i class="far fa-edit"></i>
                        Alterar
                    </a>
                    <a href="entregas/show/{{$entrega->id}}" class="btn btn-info btn-sm mr-1"><i class="fas fa-info-circle"></i>
                        Detalhe
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {!! $entregas->links() !!}
    </div>
    <!-- /.box-body -->
</div>

@stop
