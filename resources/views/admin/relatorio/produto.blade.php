@extends('adminlte::page')

@section('title','Relatório')

@section('content_header')
<h1>Produtos</h1>
<h4>Gráfico demonstrativo de produtos vendidos</h4>
<ol class="breadcrumb">
    <li><a href="/admin">Home</a></li>
    <li>Relatório</li>
</ol>
@stop

@section('content')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    var analytics = <?php echo $produto; ?>

    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable(analytics);

        var options = {
            title: 'Produtos vendidos'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>
</head>

<div id="piechart" style="width: 900px; height: 500px;"></div>

@endsection
