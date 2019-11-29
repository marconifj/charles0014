@extends('adminlte::page')

@section('content_header')
<h1>Entregador</h1>
<ol class="breadcrumb">
    <li><a href="/admin">Home</a></li>
    <li>Entregador</li>
    <li>Atualizar</li>
</ol>
@stop

@section('content')

<div class="container">
    <form class="form-horizontal" method="post" action="{{route('updateEntregador')}}">
        <input type="hidden" name="id" value="{{$entregadors->id}}" >
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
                        <input id="prependedtext" name="nome_entregador" class="form-control"  type="text" value="{{$entregadors->nome_entregador}}" >
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
                        <input id="prependedtext" name="identidade_entregador" class="form-control"  type="text" maxlength="13" value="{{$entregadors->identidade_entregador}}" >
                    </div>
                </div>
                <label class="col-md-1 control-label" for="prependedtext">CPF</label>
                <div class="col-md-2">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="far fa-id-badge"></i></span>
                        <input id="prependedtext" name="cpf_entregador" class="form-control"  type="text" maxlength="13" value="{{$entregadors->cpf_entregador}}" >
                    </div>
                </div>

            </div>
            <!-- Prepended text-->
            <div class="form-group">
                <label class="col-md-2 control-label" for="prependedtext">Celular</label>
                <div class="col-md-2">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fab fa-whatsapp"></i></span>
                        <input id="prependedtext" name="celular_entregador" class="form-control"  type="text" maxlength="13" value="{{$entregadors->celular_entregador}}" >
                    </div>
                </div>
                <label class="col-md-1 control-label" for="prependedtext">Telefone</label>
                <div class="col-md-2">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-phone-volume"></i></span>
                        <input id="prependedtext" name="telefone_entregador" class="form-control"  type="text" maxlength="13" value="{{$entregadors->telefone_entregador}}" >
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
                        <input id="prependedtext" name="veiculo_entregador" class="form-control" type="text" value="{{$entregadors->veiculo_entregador}}" >
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
                        <input id="prependedtext" name="placa_veiculo_entregador" class="form-control" type="text"value="{{$entregadors->placa_veiculo_entregador}}" >
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
                        <input id="prependedtext" name="email_entregador" class="form-control" placeholder="email@email.com" type="text" value="{{$entregadors->email_entregador}}" >
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
                    <input id="cep" name="cep_endereco" onblur="pesquisacep(this.value)" placeholder="00000-000" class="form-control input-md" required="" value="{{ $endereco->cep_endereco}}"type="search" maxlength="8">
                </div>

            </div>

            <!-- Prepended text-->
            <div class="form-group">
                <label class="col-md-2 control-label" for="prependedtext"></label>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-addon">Lougradouro</span>
                        <input id="rua" name="rua_endereco" class="form-control" type="text" value="{{$endereco->rua_endereco}}" >
                    </div>

                </div>
                <div class="col-md-2">
                    <div class="input-group">
                        <span class="input-group-addon">Nº <h11>*</h11></span>
                        <input id="numero" name="numero_endereco" class="form-control" type="text" value="{{$endereco->numero_endereco}}" >
                    </div>

                </div>

                <div class="col-md-2">
                    <div class="input-group">
                        <span class="input-group-addon">Comp.</span>
                        <input id="complemento" name="complemento_endereco" class="form-control" type="text" value="{{$endereco->complemento_endereco}}" >
                    </div>
                </div>

            </div>

            <div class="form-group">
                <label class="col-md-2 control-label" for="prependedtext"></label>

                <div class="col-md-2">
                    <div class="input-group">
                        <span class="input-group-addon">Bairro</span>
                        <input id="bairro" name="bairro_endereco" class="form-control"  type="text" value="{{$endereco->bairro_endereco}}" >
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-addon">Cidade</span>
                        <input id="cidade" name="cidade_endereco" class="form-control"  type="text" value="{{$endereco->cidade_endereco}}" >
                    </div>

                </div>

                <div class="col-md-2">
                    <div class="input-group">
                        <span class="input-group-addon">Estado</span>
                        <input id="uf" name="uf_endereco" class="form-control"  type="text" value="{{$endereco->uf_endereco}}" >
                    </div>

                </div>
            </div>
            <fieldset>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-2 control-label" for="textinput">Observação:</label>
                        <div class="col-md-4">
                            <textarea name="obs_entregador" class="form-control" rows="5" id="comment ">{{$entregadors->obs_entregador}}</textarea>
                        </div>
                </div>
                <!-- Button (Double) -->
                <div class="form-group">
                    <label class="col-md-2 control-label" for="Cadastrar"></label>
                    <div class="col-md-8">

                        <a href="{{route('todosEntregadores')}}" class="btn btn-info"><i class="fas fa-arrow-circle-left"></i>
                            Voltar
                        </a>
                        <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit"><i class="fas fa-sync"></i>
                            Atualizar</button>
                    </div>
                </div>

                </div>
                </div>
                </div>
                </form>

                <!-- Adicionando Javascript -->
                <script type="text/javascript">
                    function limpa_formulário_cep() {
                        //Limpa valores do formulário de cep.
                        document.getElementById('rua').value = ("");
                        document.getElementById('bairro').value = ("");
                        document.getElementById('cidade').value = ("");
                        document.getElementById('uf').value = ("");
                    }

                    function meu_callback(conteudo) {
                        if (!("erro" in conteudo)) {
                            //Atualiza os campos com os valores.
                            document.getElementById('rua').value = (conteudo.logradouro);
                            document.getElementById('bairro').value = (conteudo.bairro);
                            document.getElementById('cidade').value = (conteudo.localidade);
                            document.getElementById('uf').value = (conteudo.uf);
                            document.getElementById('ibge').value = (conteudo.ibge);
                        } //end if.
                        else {
                            //CEP não Encontrado.
                            limpa_formulário_cep();
                            alert("CEP não encontrado.");
                        }
                    }

                    function pesquisacep(valor) {

                        //Nova variável "cep" somente com dígitos.
                        var cep = valor.replace(/\D/g, '');

                        //Verifica se campo cep possui valor informado.
                        if (cep != "") {

                            //Expressão regular para validar o CEP.
                            var validacep = /^[0-9]{8}$/;

                            //Valida o formato do CEP.
                            if (validacep.test(cep)) {

                                //Preenche os campos com "..." enquanto consulta webservice.
                                document.getElementById('rua').value = "...";
                                document.getElementById('bairro').value = "...";
                                document.getElementById('cidade').value = "...";
                                document.getElementById('uf').value = "...";

                                //Cria um elemento javascript.
                                var script = document.createElement('script');

                                //Sincroniza com o callback.
                                script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                                //Insere script no documento e carrega o conteúdo.
                                document.body.appendChild(script);

                            } //end if.
                            else {
                                //cep é inválido.
                                limpa_formulário_cep();
                                alert("Formato de CEP inválido.");
                            }
                        } //end if.
                        else {
                            //cep sem valor, limpa formulário.
                            limpa_formulário_cep();
                        }
                    }
                    ;
                </script>
                @stop
