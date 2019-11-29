@extends('adminlte::page')

@section('content_header')
<h1> Produtos</h1>
<ol class="breadcrumb">
    <li><a href="/admin">Home</a></li>
    <li><a href="">Produto</a></li>
    <li><a href="">Listar</a></li>
</ol>
@stop
@section('content')
@include('admin.includes.alerts')
<div class="box">
    <!-- /.box-header -->
    <div class="box-body">
        <a class="btn btn-info pull-right" href="{{route('criarProdutos')}}"><i class="fas fa-user-plus"></i> Adicionar</a>
        <form action="{{route('searchProduto')}}" method="POST" class="form form-inline">
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
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produtos as $produto)
            <input type="hidden" name="id" value="{{ $produto->id }}">
            <tr>
                <td>{{$produto->id}}</td>
                <td>{{$produto->descricao_produto}}</td>
                <td>{{$produto->valor_produto}}</td>
                <td>
                    <a href="/admin/produtos/update/{{$produto->id}}" class="btn btn-success btn-sm mr-1" ><i class="far fa-edit"></i>
                        Editar
                    </a>
                    <a href="produtos/show/{{$produto->id}}" class="btn btn-info btn-sm mr-1"><i class="fas fa-info"></i>
                        Detalhe
                    </a>
                    <a href="produtos/delete/{{$produto->id}}" class="btn btn-danger btn-sm mr-1"><i class="far fa-trash-alt"></i>
                        Apagar
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {!! $produtos->links() !!}
    </div>
    <!-- /.box-body -->
</div>
<script  src="https://code.jquery.com/jquery-3.2.1.min.js"  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script>

<script type="text/javascript">
$(document).ready(function ($) {
    $("#valor_produto").mask('00,00');

});
</script>
@stop
