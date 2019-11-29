@extends('adminlte::page')

@section('content_header')
<h1>Produtos</h1>
<ol class="breadcrumb">
    <li><a href="/admin">Home</a></li>
    <li><a href="">Produto</a></li>
    <li><a href="">Detalhes</a></li>
</ol>
@stop

@section('content')
<div class="container">
    <form class="form-horizontal" method="post">
        <input type="hidden" name="id" value="{{$produtos->id}}">
        <fieldset>
            <legend><i class="fas fa-boxes"></i> Detalhes de produtos</legend>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-2 control-label" for="Nome">Descrição Produto
                </label>
                <div class="col-md-5">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-cart-plus"></i></span>
                        <input id="Nome" name="descricao_produto" placeholder="" class="form-control input-md"  type="text" value="{{ $produtos->descricao_produto}}" disabled>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label" for="Nome">Preço
                </label>
                <div class="col-md-2">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-dollar-sign"></i></span>
                        <input id="Nome" name="valor_produto" placeholder="" class="form-control input-md" type="text" value="{{ $produtos->valor_produto}}" disabled>
                    </div>
                </div>
            </div>
            <br>
            <br/>
            <div class="form-group">
                <label class="col-md-2 control-label" for="Cadastrar"></label>
                <div class="col-md-8">
                    <a href="{{route('todosProdutos')}}" class="btn btn-info"><i class="fas fa-arrow-circle-left"></i>
                        Voltar
                    </a>
                    <a href="/admin/produtos/update/{{$produtos->id}}" class="btn btn-success" ><i class="far fa-edit"></i>
                        Editar
                    </a>

                    <a href="#" class="btn btn-danger"><i class="far fa-trash-alt"></i>
                        Apagar
                    </a>
                </div>
            </div>
            </div>
    </form>
    @stop
