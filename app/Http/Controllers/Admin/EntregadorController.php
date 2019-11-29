<?php

namespace App\Http\Controllers\Admin;

use App\Models\Entregador;
use App\Models\Endereco;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class EntregadorController extends Controller {

    private $entregadorModel;
    private $enderecoModel;
    private $totalPagina = 8;

    public function __construct() {
        $this->middleware('auth');
        $this->entregadorModel = new Entregador();
        $this->enderecoModel = new Endereco();
    }

    public function index() {
        $entregadors = DB::table('entregadors')->orderBy('id', 'desc')->paginate($this->totalPagina);
        return view('admin.entregador.index', compact('entregadors'));
    }

    public function create() {
        return view('admin.entregador.create');
    }

    public function store(Request $request) {

        $dados = $request->all();
        $entregadors = $this->entregadorModel->create($dados);

        $dados['id_entregador'] = $entregadors->id;
        $entregadors->endereco()->create($dados);

        return redirect()->route('todosEntregadores')->with('success', 'Entregador adicionado com sucesso');
    }

    public function show($id) {

        $entregadors = $this->entregadorModel->find($id);
        $endereco = $this->enderecoModel->where('id_entregador', $id)->first();

        return view('admin.entregador.details', compact('entregadors', 'endereco'));
    }

    public function update($id) {
        $entregadors = $this->entregadorModel->find($id);
        $endereco = $this->enderecoModel->where('id_entregador', $id)->first();

        return view('admin.entregador.update', compact('entregadors', 'endereco'));
    }

    public function updateEntregador(Request $request) {
        $dataForm = $request->all();
        $entregadors = $this->entregadorModel->find($dataForm['id']);
        $endereco = $this->enderecoModel->where('id_entregador', $dataForm['id'])->first();

        $updateEntregador = $entregadors->update($dataForm);
        $updateEndereco = $endereco->update($dataForm);
        if ($updateEntregador && $updateEndereco) {
            return redirect()->route('todosEntregadores')->with('success', 'Entregador Atualizado com sucesso');
        }
    }

    public function delete($id) {
        $entregadors = $this->entregadorModel->find($id);
        $endereco = $this->enderecoModel->where('id_entregador', $id)->first();

        return view('admin.entregador.delete', compact('entregadors', 'endereco'));
    }

    public function deleteEntregador(Request $request) {

        $data = DB::table('entregadors')
                ->join('entregas', 'entregadors.id', '=', 'entregas.id_entregador')
                ->where('entregadors.id', '=', $request->id)
                ->count();
        if ($data > 0) {
            return redirect()->back()->with('error', 'Entregador possui entregas');
        }

        $entregadors = $this->entregadorModel;
        $dataForm = $request->all();
        $entregadors->destroy($dataForm['id']);

        return redirect()->route('todosEntregadores')->with('success', 'Registro apagado com sucesso');
    }

    //Buscar os dados do entregador
    public function buscarEntregador($id) {
        //Cria arquivo de array com os dados dos entregador
        $entregador = $this->entregadorModel->where('id', $id)->first()->toArray();
        $entregador = array_merge($entregador);
        return json_encode($entregador);
    }

    public function searchEntregador(Request $request) {
        $data = $request->all();
        $entregador = $this->entregadorModel;
        $entregadors = $entregador->search($data, $this->totalPagina);

        return view('admin.entregador.index', compact('entregadors'));
    }

}
