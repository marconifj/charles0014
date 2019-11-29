<!-- Ajax para buscar dados dos clientes *** -->
<script>
    $("#selectIdCliente").change(function () {
        var url = "/clientes/buscar/" + $(this).val();
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

    //Ajax entregador
    $("#selectIdEntregador").change(function () {
        alert('Entrou');
        var url = "/entregadores/buscar/" + $(this).val();
        console.log(url);
        $.ajax({
            type: "GET",
            url: url,
            success: function (response) {
                console.log(response);
                var dados = JSON.parse(response);
                $('#formEntrega').find('input[name="celular_entregador"]').val(dados.celular_entregador);
                $('#formEntrega').find('input[name="veiculo_entregador"]').val(dados.veiculo_entregador);
                $('#formEntrega').find('input[name="placa_veiculo_entregador"]').val(dados.placa_veiculo_entregador);
            }
        });
    });
</script>