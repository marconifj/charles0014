@extends('adminlte::page')

@section('content_header')
<h1>Cliente</h1>
<ol class="breadcrumb">
    <li><a href="/admin">Home</a></li>
    <li><a href="">Produto</a></li>
    <li><a href="">Apagar</a></li>
</ol>
@stop
@section('content')

<div class="container">

    <input type="hidden" name="id" value="{{$produto->id}}">
    <legend class="Teste">*Dados do produto</legend>
    <!-- Text input-->
    <div class="form-group">
        <div class="col-md-6">
            Nome: {{ $produto->descricao_produto}}
            <br> {{ $produto->valor_produto}}
            <br>
            <hr>
            <a href="{{route('todosProdutos')}}" class="btn btn-info"><i class="fas fa-arrow-circle-left"></i>
                Voltar
            </a>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal_confirmar"><i class="far fa-trash-alt"></i> Apagar
                </a>
        </div>
    </div>

</div>

<div class="modal fade" id="modal_confirmar" tabindex="-1" role="dialog" aria-spanledby="form_modal_confirmar" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('deleteProdutos')}}" id="deleteProdutoForm" method="post" style="border:0px;">
                {!! csrf_field() !!}
                <input type="hidden" name="id" value="{{$produto->id}}">
                <!-- Header modal -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title titulo_color" id="form_agendar_visita_span"><i class="fa fa-pencil"></i> Apagar registro</h4>
                </div>
                <!-- End Header modal -->

                <!-- Body Modal -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <span class="text_deseja_excluir">Tem certeza que deseja apagar este produto?</span>
                            <br>
                        </div>
                    </div>
                </div>
                <!-- End Body Modal -->

                <!-- Rodapé Modal -->
                <div class="modal-footer" style="margin-top: 10px;">
                    <button type="button" class="btn rounded btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Não</button>
                    <button type="submit" name="alterar" value="categoria_query" class="btn rounded btn-success"><i class="fa fa-check"></i> Sim</button>
                </div>
                <!-- End Rodapé Modal -->
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

</div>
@stop
