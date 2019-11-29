@extends('adminlte::page')

@section('content_header')
<h1>Produtos</h1>
<ol class="breadcrumb">
    <li><a href="/admin">Home</a></li>
    <li><a href="">Produto</a></li>
    <li><a href="">Novo</a></li>
</ol>
@stop
@section('content')
<div class="container">
    <form class="form-horizontal" method="post" action="{{route('storeProdutos')}}">
        {!! csrf_field() !!}
        <fieldset>
            <legend><i class="fas fa-boxes"></i> Cadastro de produtos</legend>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-2 control-label" for="Nome">Descrição Produto
                </label>
                <div class="col-md-5">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-cart-plus"></i></span>
                        <input id="Nome" name="descricao_produto" placeholder="" class="form-control input-md" required="" type="text">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label" for="Nome">Preço
                </label>
                <div class="col-md-2">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-dollar-sign"></i></span>
                        <input id="valor_produto" name="valor_produto" placeholder="0,00" class="form-control input-md" type="text"  onKeyPress="return(moeda(this, '.', '.', event))">
                    </div>
                </div>
            </div>
            <br>
            <br/>
            <div class="form-group">
                <label class="col-md-2 control-label" for="Cadastrar"></label>
                <div class="col-md-8">
                    <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit"><i class="fas fa-save"></i> Cadastrar</button>
                    <a href="{{route('todosProdutos')}}" class="btn btn-danger"><i class="far fa-window-close"></i>
                        Cancelar
                    </a>
                </div>
            </div>
            </div>
    </form>

    <script language="javascript">
        function moeda(a, e, r, t) {
            let n = ""
                    , h = j = 0
                    , u = tamanho2 = 0
                    , l = ajd2 = ""
                    , o = window.Event ? t.which : t.keyCode;
            if (13 == o || 8 == o)
                return !0;
            if (n = String.fromCharCode(o),
                    -1 == "0123456789".indexOf(n))
                return !1;
            for (u = a.value.length,
                    h = 0; h < u && ("0" == a.value.charAt(h) || a.value.charAt(h) == r); h++)
                ;
            for (l = ""; h < u; h++)
                -1 != "0123456789".indexOf(a.value.charAt(h)) && (l += a.value.charAt(h));
            if (l += n,
                    0 == (u = l.length) && (a.value = ""),
                    1 == u && (a.value = "0" + r + "0" + l),
                    2 == u && (a.value = "0" + r + l),
                    u > 2) {
                for (ajd2 = "",
                        j = 0,
                        h = u - 3; h >= 0; h--)
                    3 == j && (ajd2 += e,
                            j = 0),
                            ajd2 += l.charAt(h),
                            j++;
                for (a.value = "",
                        tamanho2 = ajd2.length,
                        h = tamanho2 - 1; h >= 0; h--)
                    a.value += ajd2.charAt(h);
                a.value += r + l.substr(u - 2, u)
            }
            return !1
        }
    </script>  
    @stop
