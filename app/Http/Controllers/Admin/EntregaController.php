<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cliente;
use App\Models\Entregador;
use App\Models\Entrega;
use App\Models\Endereco;
use App\Models\Status;
use App\Models\Produto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EntregaController extends Controller {

    private $entregaModel;
    private $clienteModel;
    private $entregadorModel;
    private $produtoModel;
    private $totalPagina = 8;

    public function __construct() {
        $this->middleware('auth');
        $this->entregaModel = new Entrega();
        $this->clienteModel = new Cliente();
        $this->entregadorModel = new Entregador();
        $this->enderecoModel = new Endereco();
        $this->statusModel = new Status();
        $this->produtoModel = new Produto();
    }

    public function index() {
        $entregas = $this->entregaModel->getAllEntrega();

        return view('admin.entrega.index', compact('entregas'));
    }

    public function create() {
        $entregas = $this->entregaModel->all();
        $clientes = $this->clienteModel->all();
        $entregadors = $this->entregadorModel->all();
        $status = $this->statusModel->all();
        $produtos = $this->produtoModel->all();

        //gerar Max das intregas + 1 
        $convInt = Entrega::max('id') + 1;
        $entregas->codigo_entrega = "BH000" . strval($convInt);

        return view('admin.entrega.create', compact('clientes', 'entregadors', 'status', 'entregas', 'produtos'));
    }

    public function store(Request $request) {

        $dados = $request->all();
        $entregas = $this->entregaModel->create($dados);


        return redirect()->route('todasEntregas')->with('success', 'Entrega adicionada com sucesso');
    }

    public function show($id) {
        $entrega = $this->entregaModel->find($id);
        $cliente = $this->clienteModel->where('id', $entrega->id_cliente)->first();
        $endereco = $this->enderecoModel->where('id_cliente', $cliente->id_cliente)->first();
        $entregador = $this->entregadorModel->where('id', $entrega->id_entregador)->first();
        $status = $this->statusModel->where('id', $entrega->id_status)->first();

        return view('admin.entrega.details', compact('entrega', 'cliente', 'endereco', 'entregador', 'status'));
    }

    public function update($id) {
        $entrega = $this->entregaModel->find($id);
        $cliente = $this->clienteModel->where('id', $entrega->id_cliente)->first();
        $endereco = $this->enderecoModel->where('id_cliente', $cliente->id_cliente)->first();
        $entregador = $this->entregadorModel->where('id', $entrega->id_entregador)->first();
        $statuses = $this->statusModel->all();

        return view('admin.entrega.update', compact('entrega', 'cliente', 'endereco', 'entregador', 'statuses'));
    }

    public function updateEntrega(Request $request) {
        $dataForm = $request->all();
        $entrega = $this->entregaModel->find($dataForm['id']);

        $updateEntrega = $entrega->update($dataForm);
        return redirect()->route('todasEntregas')->with('success', 'Entrega atualizada com sucesso');
    }

    public function searchEntrega(Request $request) {
        $data = $request->all();
        $entrega = $this->entregaModel;
        $entregas = $entrega->search($data, $this->totalPagina);

        return view('admin.entrega.index', compact('entregas'));
    }

}
