@extends('adminlte::page')

@section('content_header')
<ol class="breadcrumb">
    <li><a href="/admin">Home</a></li>
    <li>Entrega</li>
    <li>Listar</li>
</ol>
@stop
@section('content')
@include('admin.includes.alerts')
<div class="container">
    <form class="form-horizontal" id="formEntrega" method="post" action="{{route('storeEntrega')}}">
        {!! csrf_field() !!}
        <input type="hidden" id="id_status" name="id_status" value="1">
        <fieldset>
            <legend>
                <i class="fas fa-user-check"></i> Entrega
            </legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-2 control-label" for="Nome">Codigo/Produto
                    <h11>*</h11>
                </label>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-barcode"></i></span>
                        <input id="Nome" name="codigo_entrega" class="form-control input-md" type="text" value="{{$entregas->codigo_entrega}}" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-hamburger"></i></span>
                        <select class="form-control" name="id_produto" id="id_produto">
                            <option value="0">Selecione</option>
                            @foreach($produtos as $produto)
                            <option value="{{$produto->id}}">{{$produto->descricao_produto}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group ">
                <label class="col-md-2 control-label" for="prependedtext">Cliente</label>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="far fa-user"></i></span>
                        <select class="form-control" name="id_cliente" id="selectIdCliente">
                            <option value="0">Selecione</option>
                            @foreach($clientes as $cliente)
                            <option value="{{$cliente->id}}">{{$cliente->nome_cliente}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fab fa-whatsapp"></i></span>
                        <input id="cel" name="cel_cliente" class="form-control" placeholder="(31) 9XXXX-XXXX" >
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
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-addon">Cidade</span>
                        <input id="cidade" name="cidade_endereco" class="form-control" placeholder="" required="" type="text">
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-addon">Bairro</span>
                        <input id="bairro" name="bairro_endereco" class="form-control" placeholder="" required="" type="text">
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
                            <select class="form-control"  name="id_entregador" id="selectIdEntregador">
                                <option value="0">Selecione</option>
                                @foreach($entregadors as $entregador)
                                <option value="{{$entregador->id}}">{{$entregador->nome_entregador}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fab fa-whatsapp"></i></span>
                            <input id="cel_2" name="celular_entregador" class="form-control" placeholder="Telefone">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label" for="prependedtext"></label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-traffic-light"></i></span>
                            <input id="cidade" name="veiculo_entregador" class="form-control" placeholder="Veiculo" required="" type="text">
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-chess-board"></i></span>
                            <input id="bairro" name="placa_veiculo_entregador" class="form-control" placeholder="Placa" required="" type="text">
                        </div>
                    </div>
                </div>

                <legend><i class="fas fa-shopping-cart"></i> Pagamento</legend>
                <!-- Text input-->
                <div class="form-group">

                    <label class="col-md-2 control-label" for="textinput">Taxa entrega:</label>
                    <div class="col-md-2">
                        <input id="taxa_pedido" name="taxa_pedido" class="form-control" placeholder="R$" required="" value="4,00" type="text" readonly>
                    </div>

                </div>
                <div class="form-group">

                    <label class="col-md-2 control-label" for="textinput">Pedido:</label>
                    <div class="col-md-2">
                        <input id="pedido" name="pedido" class="form-control" placeholder="R$" required="" type="text" readonly="">
                    </div>

                </div>
                <div class="form-group">

                    <label class="col-md-2 control-label" for="textinput">Total Pedido:</label>
                    <div class="col-md-2">
                        <input id="total_entrega" name="total_entrega" class="form-control" placeholder="R$" required="" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="prependedtext"></label>
                    <div class="col-md-2">
                        <select class="form-control" onchange="pagamentoCardOrCash(this);">
                            <option value="0">Selecione</option>
                            <option value="card"> Cartão </option>
                            <option value="cash">Dinheiro</option>
                        </select>
                    </div>
                </div>

                <div class="form-group" id="inputCash" style="display: none;">
                    <label class="col-md-2 control-label" for="prependedtext"></label>
                    <div class="col-md-2">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="far fa-money-bill-alt"></i></span>
                            <input id="total_dinheiro" name="total_dinheiro" class="form-control" placeholder="R$ Dinheiro" type="text" oninput="moeda(this);" onblur="calcularPagamento()" maxlength="6">
                        </div>
                    </div>    
                    <div class="col-md-2">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-hand-holding-usd"></i></span>
                            <input id="total_troco" name="total_troco" class="form-control" placeholder="R$ Troco" type="text" readonly="" oninput="moeda(this);" >
                        </div>
                    </div>
                </div>

                <div class="form-group" id="inputCard" style="display: none;">
                    <label class="col-md-2 control-label" for="prependedtext"></label>
                    <div class="col-md-2">
                        <i class="fab fa-cc-visa" style="font-size: 2em;"></i> 
                        <i class="fas fa-credit-card" style="font-size: 2em;"></i>
                        <i class="fab fa-cc-mastercard" style="font-size: 2em;"></i>
                        <div class="input-group">
                            <input type="radio" name="card" value="debito" checked=""> Débito<br>
                            <input type="radio" name="card" value="credito"> Crédito<br>
                        </div>
                    </div>
                </div>
            </fieldset>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-2 control-label" for="textinput">Observação:</label>
                <div class="col-md-4">
                    <textarea name="obs_entrega" class="form-control" rows="3" id="comment "></textarea>
                </div>

            </div>

            <!-- Button (Double) -->
            <div class="form-group">
                <label class="col-md-2 control-label" for="Cadastrar"></label>
                <div class="col-md-8">
                    <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit"><i class="fas fa-save"></i> Cadastrar</button>
                    <a href="/admin/entregas" class="btn btn-danger"><i class="far fa-window-close"></i>
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
    <!-- Ajax para buscar dados dos clientes *** -->
    <script type="text/javascript">


//Obs esse campo valida se existe produto selecionado, além desabilitar o campo de cadastro para evitar erros. 
                                function calcularPagamento() {
                                    var totalproduto = document.getElementById('total_entrega').value.replace(/[^0-9,.]*/, '');
                                    var totaldinheiro = document.getElementById('total_dinheiro').value.replace(/[^0-9,.]*/, '');
                                    totalproduto = parseFloat(totalproduto.split('.').join('').split(',').join('.'));
                                    totaldinheiro = parseFloat(totaldinheiro.split('.').join('').split(',').join('.'));

                                    var troco;

                                    if (!(isNaN(totalproduto))) {
                                        document.getElementById("Cadastrar").disabled = false;
                                        if (totaldinheiro >= totalproduto) {
                                            troco = totaldinheiro - totalproduto;

                                            document.getElementById("total_troco").value = troco.toFixed(2);
                                        } else {
                                            alert('Valor em Dinheiro menor');
                                            document.getElementById("Cadastrar").disabled = true;
                                        }
                                    } else {
                                        alert('Selecione um produto.');
                                        document.getElementById("Cadastrar").disabled = true;
                                        document.getElementById("total_dinheiro").value = '';
                                    }
                                }



                                function pagamentoCardOrCash(that) {
                                    if (that.value == "cash") {
                                        document.getElementById("inputCash").style.display = "block";
                                        document.getElementById("inputCard").style.display = "none";
                                        document.getElementById("total_dinheiro").required = true;
                                        document.getElementById("total_troco").required = true;

                                    } else if (that.value == "card") {
                                        document.getElementById("inputCash").style.display = "none";
                                        document.getElementById("inputCard").style.display = "block";
                                        document.getElementById("total_dinheiro").required = false;
                                        document.getElementById("total_troco").required = false;
                                    } else {
                                        document.getElementById("inputCash").style.display = "none";
                                        document.getElementById("inputCard").style.display = "none";
                                    }
                                }

                                function moeda(i) {
                                    var v = i.value.replace(/\D/g, '');
                                    v = (v / 100).toFixed(2) + '';
                                    v = v.replace(".", ",");
                                    v = v.replace(/(\d)(\d{3})(\d{3}),/g, "$1.$2.$3,");
                                    v = v.replace(/(\d)(\d{3}),/g, "$1.$2,");
                                    i.value = v;
                                }


                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
//Carrega dados Cliente
                                $(document).ready(function () {
                                    $("#selectIdCliente").change(function () {
                                        var url = "/admin/clientes/buscar/" + $(this).val();
                                        $.ajax({
                                            type: "GET",
                                            url: url,
                                            success: function (response) {
                                                var dados = JSON.parse(response);
                                                $('#formEntrega').find('input[name="cel_cliente"]').val(dados.cel_cliente);
                                                $('#formEntrega').find('input[name="rua_endereco"]').val(dados.rua_endereco);
                                                $('#formEntrega').find('input[name="numero_endereco"]').val(dados.numero_endereco);
                                                $('#formEntrega').find('input[name="complemento_endereco"]').val(dados.complemento_endereco);
                                                $('#formEntrega').find('input[name="cidade_endereco"]').val(dados.cidade_endereco);
                                                $('#formEntrega').find('input[name="bairro_endereco"]').val(dados.bairro_endereco);
                                            }
                                        });
                                    });

                                    //Carrega dados Entregadores
                                    $("#selectIdEntregador").change(function () {
                                        var url = "/admin/entregadores/buscar/" + $(this).val();
                                        $.ajax({
                                            type: "GET",
                                            url: url,
                                            success: function (response) {
                                                var dados = JSON.parse(response);
                                                $('#formEntrega').find('input[name="celular_entregador"]').val(dados.celular_entregador);
                                                $('#formEntrega').find('input[name="veiculo_entregador"]').val(dados.veiculo_entregador);
                                                $('#formEntrega').find('input[name="placa_veiculo_entregador"]').val(dados.placa_veiculo_entregador);
                                            }
                                        });
                                    });

                                    //Carrega dados Produto
                                    $("#id_produto").change(function () {
                                        var url = "/admin/produtos/buscar/" + $(this).val();
                                        $.ajax({
                                            type: "GET",
                                            url: url,
                                            success: function (response) {
                                                var dados = JSON.parse(response);
                                                var valor_entrega = 4.00;

                                                let valor_produto = parseFloat(dados.valor_produto);

                                                let t_pedido = parseFloat(valor_entrega) + parseFloat(valor_produto);

                                                t_pedido = t_pedido.toFixed(2).replace(".", ",");

                                                $('#formEntrega').find('input[name="pedido"]').val(dados.valor_produto);
                                                $('#formEntrega').find('input[name="total_entrega"]').val(t_pedido);
                                            }
                                        });
                                    });

                                });
    </script>
    @stop