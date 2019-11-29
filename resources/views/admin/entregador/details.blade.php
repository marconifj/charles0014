@extends('adminlte::page')

@section('content_header')
<h1>Entregador</h1>
<ol class="breadcrumb">
    <li><a href="/admin">Home</a></li>
    <li>Entregador</li>
    <li>Detalhe</li>
</ol>
@stop

@section('content')
<div class="container">
    <form class="form-horizontal" method="post">
        <input type="hidden" name="id" value="{{$entregadors->id}}" disabled>
        <fieldset>
            <legend> <i class="fas fa-user-check"></i> Dados Pessoas</legend>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-2 control-label" for="Nome">Nome
                    <h11>*</h11>
                </label>
                <div class="col-md-5">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="far fa-user-circle"></i></span>
                        <input id="prependedtext" name="identidade_entregador" class="form-control"  type="text" maxlength="13" value="{{$entregadors->nome_entregador}}" disabled>
                    </div>
                </div>

            </div>
            {!! csrf_field() !!}
            <!-- Prepended text-->
            <div class="form-group">
                <label class="col-md-2 control-label" for="prependedtext">Identidade</label>
                <div class="col-md-2">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-fingerprint"></i></span>
                        <input id="prependedtext" name="identidade_entregador" class="form-control"  type="text" maxlength="13" value="{{$entregadors->identidade_entregador}}" disabled>
                    </div>
                </div>
                <label class="col-md-1 control-label" for="prependedtext">CPF</label>
                <div class="col-md-2">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="far fa-id-badge"></i></span>
                        <input id="prependedtext" name="cpf_entregador" class="form-control"  type="text" maxlength="13" value="{{$entregadors->cpf_entregador}}" disabled>
                    </div>
                </div>

            </div>
            <!-- Prepended text-->
            <div class="form-group">
                <label class="col-md-2 control-label" for="prependedtext">Celular</label>
                <div class="col-md-2">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fab fa-whatsapp"></i></span>
                        <input id="prependedtext" name="celular_entregador" class="form-control"  type="text" maxlength="13" value="{{$entregadors->celular_entregador}}" disabled>
                    </div>
                </div>
                <label class="col-md-1 control-label" for="prependedtext">Telefone</label>
                <div class="col-md-2">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-phone-volume"></i></span>
                        <input id="prependedtext" name="telefone_entregador" class="form-control"  type="text" maxlength="13" value="{{$entregadors->telefone_entregador}}" disabled>
                    </div>
                </div>

            </div>

            <!-- Prepended text-->
            <div class="form-group">
                <label class="col-md-2 control-label" for="prependedtext">Veiculo
                    <h11>*</h11>
                </label>
                <div class="col-md-3">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-traffic-light"></i></span>
                        <input id="prependedtext" name="veiculo_entregador" class="form-control" type="text" value="{{$entregadors->veiculo_entregador}}" disabled>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="prependedtext">Placa
                    <h11>*</h11>
                </label>
                <div class="col-md-3">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-chess-board"></i></span>
                        <input id="prependedtext" name="placa_veiculo_entregador" class="form-control" type="text"value="{{$entregadors->placa_veiculo_entregador}}" disabled>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="prependedtext">Email
                    <h11>*</h11>
                </label>
                <div class="col-md-5">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-envelope-open-text"></i></span>
                        <input id="prependedtext" name="email_entregador" class="form-control" placeholder="email@email.com" type="text" value="{{$entregadors->email_entregador}}" disabled>
                    </div>
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend><i class="fas fa-map-marker-alt"></i> Endereço</legend>

            <!-- Search input-->
            <div class="form-group">
                <label class="col-md-2 control-label" for="CEP">CEP
                    <h11>*</h11>
                </label>
                <div class="col-md-2">
                    <input id="cep" name="cep_endereco" class="form-control input-md"  maxlength="8" value="{{$endereco->cep_endereco}}" disabled>
                </div>

            </div>

            <!-- Prepended text-->
            <div class="form-group">
                <label class="col-md-2 control-label" for="prependedtext"></label>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-addon">Lougradouro</span>
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

                <div class="col-md-2">
                    <div class="input-group">
                        <span class="input-group-addon">Bairro</span>
                        <input id="bairro" name="bairro_endereco" class="form-control"  type="text" value="{{$endereco->bairro_endereco}}" disabled>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-addon">Cidade</span>
                        <input id="cidade" name="cidade_endereco" class="form-control"  type="text" value="{{$endereco->cidade_endereco}}" disabled>
                    </div>

                </div>

                <div class="col-md-2">
                    <div class="input-group">
                        <span class="input-group-addon">Estado</span>
                        <input id="uf" name="uf_endereco" class="form-control"  type="text" value="{{$endereco->uf_endereco}}" disabled>
                    </div>

                </div>
            </div>
            <fieldset>
            <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-2 control-label" for="textinput">Observação:</label>
                    <div class="col-md-4">
                        <textarea name="obs_entregador" class="form-control" rows="5" id="comment " disabled>{{$entregadors->obs_entregador}}</textarea>
                    </div>
                </div>

                <!-- Button (Double) -->
                <div class="form-group">
                    <label class="col-md-2 control-label" for="Cadastrar"></label>
                    <div class="col-md-8">
                        <a href="{{route('todosEntregadores')}}" class="btn btn-info"><i class="fas fa-arrow-circle-left"></i>
                            Voltar
                        </a>
                        <a href="/admin/entregadores/update/{{$entregadors->id}}" class="btn btn-success" ><i class="far fa-edit"></i>
                            Editar
                        </a>
                        <a href="/admin/entregadores/delete/{{$entregadors->id}}" class="btn btn-danger"><i class="far fa-trash-alt"></i>
                            Apagar
                        </a>
                    </div>
                </div>

                </div>
                </div>
                </div>
                </form>
                @stop
