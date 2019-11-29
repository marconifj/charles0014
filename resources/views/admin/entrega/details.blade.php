@extends('adminlte::page')

@section('content_header')
<ol class="breadcrumb">
    <li><a href="/admin">Home</a></li>
    <li>Entrega</li>
    <li>Detalhe</li>
</ol>
@stop
@section('content')
<div class="container">
    <form class="form-horizontal" id="formEntrega" method="post">
        <input type="hidden" name="id" value="{{$entrega->id}}">
        <fieldset>
            <div class="form-group">
                <label class="col-md-2 control-label" for="Nome">Status
                    <h11>*</h11>
                </label>
                <div class="col-md-2">
                    <select class="form-control" name="id_status" id="selectIdCliente" disabled>
                        <option>{{$status->descricao_status}}</option>
                    </select>
                </div>
            </div>
        </fieldset>
        <fieldset>
            <legend><i class="fas fa-user-check"></i> Entrega</legend>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-2 control-label" for="Nome">Codigo/Produto
                    <h11>*</h11>
                </label>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-barcode"></i></span>
                        <input id="Nome" name="codigo_entrega"  class="form-control input-md" type="text" value="{{ $entrega->codigo_entrega}}" disabled>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-hamburger"></i></span>
                        <input id="prependedtext" name="produto_entrega" class="form-control"  type="text" value="{{ $entrega->produto_entrega}}" disabled>
                    </div>
                </div>
            </div>

            <div class="form-group ">
                <label class="col-md-2 control-label" for="prependedtext">Cliente</label>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="far fa-user"></i></span>
                        <select class="form-control" name="id_cliente" id="selectIdCliente" disabled>
                            <option>{{$cliente->nome_cliente}}</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fab fa-whatsapp"></i></span>
                        <input id="celularIdCliente" name="cel_cliente" class="form-control" value="{{$cliente->cel_cliente}}" disabled>
                    </div>
                </div>
            </div>

            <legend><i class="fas fa-map-marker-alt"></i> Endereço</legend>
            <!-- Prepended text-->
            <div class="form-group">
                <label class="col-md-2 control-label" for="prependedtext"></label>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-addon">Rua</span>
                        <input id="rua" name="rua_endereco" class="form-control" type="text" value="{{$endereco->rua_endereco}}" disabled>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="input-group">
                        <span class="input-group-addon">Nº <h11>*</h11></span>
                        <input id="numero" name="numero_endereco" class="form-control" type="text" value="{{$endereco->numero_endereco}}" disabled>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="input-group">
                        <span class="input-group-addon">Comp.</span>
                        <input id="complemento" name="complemento_endereco" class="form-control" type="text" value="{{$endereco->complemento_endereco}}" disabled>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label" for="prependedtext"></label>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-addon">Cidade</span>
                        <input id="cidade" name="cidade_endereco" class="form-control" type="text" value="{{$endereco->cidade_endereco}}" disabled>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-addon">Bairro</span>
                        <input id="bairro" name="bairro_endereco" class="form-control" type="text" value="{{$endereco->bairro_endereco}}" disabled>
                    </div>

                </div>
            </div>
            <fieldset>
                <legend><i class="fas fa-motorcycle"></i> Entregador</legend>

                <div class="form-group ">
                    <label class="col-md-2 control-label" for="prependedtext"></label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-motorcycle"></i></span>
                            <select class="form-control"  name="id_entregador" id="selectIdEntregador" disabled>
                                <option>{{$entregador->nome_entregador}}</option>

                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fab fa-whatsapp"></i></span>
                            <input id="celularIdCliente" name="celular_entregador" class="form-control" value="{{$entregador->celular_entregador }}" disabled>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label" for="prependedtext"></label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-traffic-light"></i></span>
                            <input id="cidade" name="veiculo_entregador" class="form-control" type="text" value="{{$entregador->veiculo_entregador }}" disabled>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-chess-board"></i></span>
                            <input id="bairro" name="placa_veiculo_entregador" class="form-control" type="text" value="{{$entregador->placa_veiculo_entregador}}" disabled>
                        </div>
                    </div>
                </div>
                <legend><i class="fas fa-shopping-cart"></i> Pagamento</legend>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="prependedtext"></label>
                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="prependedtext">Total</label>
                            <div class="input-group">
                                <input id="prependedtext" name="valor_entrega" class="form-control" type="text" value="R$ {{$entrega->total_entrega}}" disabled>
                            </div>
                        </div>
                    </div>
            </fieldset>
            
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-2 control-label" for="textinput">Observação:</label>
                <div class="col-md-4">
                    <textarea name="obs_entrega" class="form-control" rows="5" id="comment " disabled >{{$entrega->obs_entrega}}</textarea>
                </div>
            </div>
            <!-- Button (Double) -->
            <div class="form-group">
                <label class="col-md-2 control-label" for="Cadastrar"></label>
                <div class="col-md-8">
                    <a href="{{route('todasEntregas')}}" class="btn btn-info"><i class="fas fa-arrow-circle-left"></i>
                        Voltar
                    </a>
                    <a href="/admin/entregas/update/{{$entrega->id}}" class="btn btn-success" ><i class="far fa-edit"></i>
                        Editar
                    </a>

                </div>
            </div>

            </div>
            </div>
            </div>
    </form>

    @stop
