<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Entrega;
use PDF;
use DB;

class RelatorioController extends Controller {

    private $totalPagina = 12;

    public function __construct() {
        $this->middleware('auth');
        $this->entregaModel = new Entrega();
    }

    public function index() {

        return null;
    }

    public function produto() {
        $data = DB::table('entregas')
                ->join('produtos', 'entregas.id_produto', '=', 'produtos.id')
                ->select(
                        DB::raw('produtos.descricao_produto as produto'), DB::raw('count(*) total'))
                ->groupBy('produto')
                ->get();

        $array[] = ['Produto', 'Total'];
        foreach ($data as $key => $value) {
            $array[++$key] = [$value->produto, $value->total];
        }
        return view('admin.relatorio.produto')->with('produto', json_encode($array));
    }

    public function ClientesRelatorios() {
        $clientes = DB::table('clientes')->paginate($this->totalPagina);

        $total = DB::table('clientes')->count();

        return view('admin.relatorio.clientesRelatorio', compact('clientes', 'total'));
    }

    public function GeraClientePdf() {
        $clientes = Cliente::all();
        $total = DB::table('clientes')->count();

        $pdf = PDF::loadView('admin.relatorio.pdfCliente', compact('clientes', 'total'));

        return $pdf->setPaper('a4')->stream('Relatorio_Clientes.pdf');
    }

    public function ProdutosRelatorios() {
        $produtos = DB::table('produtos')->paginate($this->totalPagina);

        $total = DB::table('produtos')->count();

        return view('admin.relatorio.produtosRelatorio', compact('produtos', 'total'));
    }

    public function GeraProdutoPdf() {
        $produtos = Produto::all();
        $total = DB::table('produtos')->count();

        $pdf = PDF::loadView('admin.relatorio.pdfProduto', compact('produtos', 'total'));

        return $pdf->setPaper('a4')->stream('Relatorio_Produtos.pdf');
    }

    public function EntregasRelatorios() {

        $entregas = $this->entregaModel->getAllEntrega();

        $total = DB::table('entregas')->count();

        return view('admin.relatorio.entregasRelatorio', compact('entregas', 'total'));
    }

    public function GeraEntregaPdf() {

        $entregas = $this->entregaModel->getAllEntrega();

        $total = DB::table('entregas')->count();
        $pdf = PDF::loadView('admin.relatorio.pdfEntrega', compact('entregas', 'total'));

        return $pdf->setPaper('a4')->stream('Relatorio_Entregass.pdf');
    }

}
