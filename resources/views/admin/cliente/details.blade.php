@extends('adminlte::page')

@section('content_header')
<h1>Cliente</h1>
<ol class="breadcrumb">
    <li><a href="/admin">Home</a></li>
    <li>Cliente</li>
    <li>Detalhe</li>
</ol>
@stop
@section('content')
<div class="container">
    <form class="form-horizontal" method="post">
        <input type="hidden" name="id" value="{{$clientes->id}}">
        <fieldset>
            <legend><i class="fas fa-user-check"></i> Cliente</legend>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-2 control-label" for="Nome">Nome
                    <h11>*</h11>
                </label>
                <div class="col-md-5">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="far fa-user-circle"></i></span>
                        <input id="Nome" name="nome_cliente"  class="form-control input-md"  type="text" value="{{ $clientes->nome_cliente}}" disabled>
                    </div>
                </div>
            </div>
            {!! csrf_field() !!}
            <!-- Prepended text-->
            <div class="form-group">
                <label class="col-md-2 control-label" for="prependedtext">Telefone
                    <h11>*</h11>
                </label>
                <div class="col-md-2">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-phone-volume"></i></span>
                        <input id="prependedtext" name="tel_cliente" class="form-control" placeholder="XX XXXXX-XXXX"  type="text" maxlength="13" value="{{ $clientes->tel_cliente}}" disabled>
                    </div>
                </div>

                <label class="col-md-1 control-label" for="prependedtext">Celular</label>
                <div class="col-md-2">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fab fa-whatsapp"></i></span>
                        <input id="prependedtext" name="cel_cliente" class="form-control" placeholder="XX XXXXX-XXXX" type="text" maxlength="13"value="{{ $clientes->cel_cliente}}" disabled>
                    </div>
                </div>
            </div>

            <!-- Prepended text-->
            <div class="form-group">
                <label class="col-md-2 control-label" for="prependedtext">Email
                    <h11>*</h11>
                </label>
                <div class="col-md-5">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-envelope-open-text"></i></span>
                        <input id="prependedtext" name="email_cliente" class="form-control" placeholder="email@email.com"  type="text" value="{{ $clientes->email_cliente}}" disabled>
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
                    <input id="cep" name="cep_endereco" onblur="pesquisacep(this.value)" placeholder="00000-000" class="form-control input-md"  value="{{ $clientes->cep_endereco}}"type="search" maxlength="8" disabled>
                </div>

            </div>

            <!-- Prepended text-->
            <div class="form-group">
                <label class="col-md-2 control-label" for="prependedtext"></label>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-addon">Rua</span>
                        <input id="rua" name="rua_endereco" class="form-control"   type="text" value="{{ $clientes->rua_endereco}}" disabled>
                    </div>

                </div>
                <div class="col-md-2">
                    <div class="input-group">
                        <span class="input-group-addon">Nº <h11>*</h11></span>
                        <input id="numero" name="numero_endereco" class="form-control"  type="text" value="{{ $clientes->numero_endereco}}" disabled>
                    </div>

                </div>

                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-addon">Comp.</span>
                        <input id="complemento" name="complemento_endereco" class="form-control"  type="text" value="{{ $clientes->complemento_endereco}}" disabled>
                    </div>
                </div>

            </div>

            <div class="form-group">
                <label class="col-md-2 control-label" for="prependedtext"></label>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-addon">Cidade</span>
                        <input id="cidade" name="cidade_endereco" class="form-control"   type="text" value="{{ $clientes->cidade_endereco}}" disabled>
                    </div>

                </div>

                <div class="col-md-2">
                    <div class="input-group">
                        <span class="input-group-addon">Estado</span>
                        <input id="uf" name="uf_endereco" class="form-control"   type="text" value="{{ $clientes->uf_endereco}}" disabled>
                    </div>

                </div>

                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-addon">Bairro</span>
                        <input id="bairro" name="bairro_endereco" class="form-control"   type="text" value="{{ $clientes->bairro_endereco}}" disabled>
                    </div>

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-2 control-label" for="textinput">Observação:</label>
                <div class="col-md-4">
                    <textarea name="obs_cliente" class="form-control" rows="5" id="comment " disabled>{{ $clientes->obs_cliente}}</textarea>
                </div>

            </div>
        </fieldset>

        <!-- Button (Double) -->
        <div class="form-group">
            <label class="col-md-2 control-label" for="Cadastrar"></label>
            <div class="col-md-8">
                <a href="{{route('todosClientes')}}" class="btn btn-info"><i class="fas fa-arrow-circle-left"></i>
                    Voltar
                </a>
                <a href="/admin/clientes/update/{{$clientes->id}}" class="btn btn-success" ><i class="far fa-edit"></i>
                    Editar
                </a>

                <a href="/admin/clientes/delete/{{$clientes->id}}" class="btn btn-danger"><i class="far fa-trash-alt"></i>
                    Apagar
                </a>
            </div>
        </div>

</div>
</div>
</div>


</form>
@stop
