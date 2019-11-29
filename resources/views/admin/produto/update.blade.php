@extends('adminlte::page')

@section('content_header')
<h1>Produtos</h1>
<ol class="breadcrumb">
    <li><a href="/admin">Home</a></li>
    <li><a href="">Cliente</a></li>
    <li><a href="">Detalhes</a></li>
</ol>
@stop
@section('content')
@include('admin.includes.alerts')
<div class="container">
    <form class="form-horizontal" method="post" action="{{route('updateProdutos')}}">
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
                        <input id="Nome" name="descricao_produto" placeholder="" class="form-control input-md"  type="text" value="{{ $produtos->descricao_produto}}">
                    </div>
                </div>
            </div>
            {!! csrf_field() !!}
            <div class="form-group">
                <label class="col-md-2 control-label" for="Nome">Preço
                </label>
                <div class="col-md-2">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-dollar-sign"></i></span>
                        <input id="Nome" name="valor_produto" placeholder="" class="form-control input-md" type="text" value="{{ $produtos->valor_produto}}">
                    </div>
                </div>
            </div>
            <br>
            <br/>
            <!-- Button (Double) -->
            <div class="form-group">
                <label class="col-md-2 control-label" for="Atualizar"></label>
                <div class="col-md-8">

                    <a href="{{route('todosProdutos')}}" class="btn btn-info"><i class="fas fa-arrow-circle-left"></i>
                        Voltar
                    </a>
                    <button id="Cadastrar" name="Atualizar" class="btn btn-success" type="Submit"><i class="fas fa-sync"></i>
                        Atualizar</button>
                </div>
            </div>
            </div>
    </form>
    @stop
