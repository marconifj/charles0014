@extends('adminlte::page')

@section('content_header')
<h1>Entregador</h1>
<ol class="breadcrumb">
    <li><a href="/admin">Home</a></li>
    <li>Entregador</li>
    <li>Novo</li>
</ol>
@stop

@section('content')
<div class="container">
    <form class="form-horizontal" method="post" action="{{route('storeEntregador')}}">
        {!! csrf_field() !!}
        <fieldset>
            <legend><i class="fas fa-user-check"></i> Dados Pessoas</legend>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-2 control-label" for="Nome">Nome
                    <h11>*</h11>
                </label>
                <div class="col-md-5">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="far fa-user-circle"></i></span>
                        <input id="Nome" name="nome_entregador" placeholder="" class="form-control input-md" required="" type="text">
                    </div>
                </div>
            </div>
            <!-- Prepended text-->
            <div class="form-group">
                <label class="col-md-2 control-label" for="prependedtext">Identidade</label>
                <div class="col-md-2">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-fingerprint"></i></span>
                        <input id="identidade" name="identidade_entregador" class="form-control" placeholder="XX XXXXX-XXXX" type="text" maxlength="13">
                    </div>
                </div>
                <label class="col-md-1 control-label" for="prependedtext">CPF</label>
                <div class="col-md-2">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="far fa-id-badge"></i></span>
                        <input id="cpf" name="cpf_entregador" class="form-control" placeholder="000.000.000-00" type="text" maxlength="13">
                    </div>
                </div>

            </div>
            <!-- Prepended text-->
            <div class="form-group">
                <label class="col-md-2 control-label" for="prependedtext">Celular</label>
                <div class="col-md-2">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fab fa-whatsapp"></i></span>
                        <input id="cel" name="celular_entregador" class="form-control" placeholder="XX XXXXX-XXXX" type="text" maxlength="13">
                    </div>
                </div>
                <label class="col-md-1 control-label" for="prependedtext">Telefone</label>
                <div class="col-md-2">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-phone-volume"></i></span>
                        <input id="tel" name="telefone_entregador" class="form-control" placeholder="XX XXXXX-XXXX" type="text" maxlength="13">
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
                        <input id="prependedtext" name="veiculo_entregador" class="form-control" required="" type="text" maxlength="20" placeholder="Ex: Moto CG titan..">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="prependedtext">Placa
                    <h11>*</h11>
                </label>
                <div class="col-md-5">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-chess-board"></i></span>
                        <input id="prependedtext" name="placa_veiculo_entregador" class="form-control" required="" type="text" maxlength="8">
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
                        <input id="prependedtext" name="email_entregador" class="form-control" placeholder="email@email.com" required="" type="text" >
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
                    <input id="cep" name="cep_endereco" onblur="pesquisacep(this.value)" placeholder="00000-000" class="form-control input-md" required="" value="" type="search" maxlength="8">
                </div>

            </div>

            <!-- Prepended text-->
            <div class="form-group">
                <label class="col-md-2 control-label" for="prependedtext"></label>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-addon">Lougradouro</span>
                        <input id="rua" name="rua_endereco" class="form-control" placeholder="Rua,Av..." required="" type="text">
                    </div>

                </div>
                <div class="col-md-2">
                    <div class="input-group">
                        <span class="input-group-addon">Nº <h11>*</h11></span>
                        <input id="numero" name="numero_endereco" class="form-control" type="text">
                    </div>

                </div>

                <div class="col-md-2">
                    <div class="input-group">
                        <span class="input-group-addon">Comp.</span>
                        <input id="complemento" name="complemento_endereco" class="form-control" type="text">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label" for="prependedtext"></label>

                <div class="col-md-2">
                    <div class="input-group">
                        <span class="input-group-addon">Bairro</span>
                        <input id="bairro" name="bairro_endereco" class="form-control" placeholder="" required="" type="text">
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-addon">Cidade</span>
                        <input id="cidade" name="cidade_endereco" class="form-control" placeholder="" required="" type="text">
                    </div>

                </div>

                <div class="col-md-2">
                    <div class="input-group">
                        <span class="input-group-addon">Estado</span>
                        <select class="form-control" id="uf" name="uf_endereco">
                            <option value="0">Selecione</option>
                            <option value="MG" selected>MG</option>
                            <option value="SP">SP</option>
                            <option value="RJ">RJ</option>
                            <option value="RS">RS</option>
                        </select>
                    </div>

                </div>
            </div>
            <fieldset>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-2 control-label" for="textinput">Observação:</label>
                    <div class="col-md-4">
                        <textarea name="obs_entregador" class="form-control" rows="5" id="comment "></textarea>
                    </div>
                </div>
                <!-- Button (Double) -->
                <div class="form-group">
                    <label class="col-md-2 control-label" for="Cadastrar"></label>
                    <div class="col-md-8">
                        <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit">Cadastrar</button>
                        <a href="{{route('todosEntregadores')}}" class="btn btn-danger btn-sm mr-1">
                            Cancelar
                        </a>

                    </div>
                </div>

                </div>
                </div>
                </div>
                </form>
                <script  src="https://code.jquery.com/jquery-3.2.1.min.js"  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="  crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script>

                <script type="text/javascript">
                        $(document).ready(function ($) {
                            $("#cpf").mask('999.999.999-99');
                            $("#tel").mask('(00)0000-0000');
                            $("#cel").mask('(00)00000-0000');
                            $("#cel_2").mask('(00)00000-0000');
                            $("#cep").mask('00000-000');
                        });
                </script>

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
