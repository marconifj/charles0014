<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cliente;
use App\Models\Endereco;
use App\Models\Entrega;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ClienteController extends Controller {

    private $clienteModel;
    private $enderecoModel;
    private $totalPagina = 8;

    public function __construct() {
        $this->middleware('auth');
        $this->clienteModel = new Cliente();
        $this->enderecoModel = new Endereco();
        $this->entregaModel = new Entrega();
    }

    public function index() {
        $clientes = DB::table('clientes')->orderBy('id', 'desc')->paginate($this->totalPagina);

        return view('admin.cliente.index', compact('clientes'));
    }

    public function create() {
        return view('admin.cliente.create');
    }

    public function store(Request $request) {
        $dados = $request->all();
        $cliente = $this->clienteModel->create($dados);

        $dados['id_cliente'] = $cliente->id;
        $cliente->endereco()->create($dados);

        return redirect()->route('todosClientes')->with('success', 'Cliente adicionado com sucesso');
    }

    public function show($id) {

        $clientes = DB::table('clientes')
                ->join('enderecos', 'clientes.id', '=', 'enderecos.id_cliente')
                ->where('clientes.id', '=', $id)
                ->select('clientes.id', 'clientes.nome_cliente', 'clientes.tel_cliente', 'clientes.cel_cliente', 'clientes.email_cliente', 'clientes.obs_cliente', 'enderecos.cep_endereco', 'enderecos.rua_endereco', 'enderecos.numero_endereco', 'enderecos.complemento_endereco', 'enderecos.cidade_endereco', 'enderecos.bairro_endereco', 'enderecos.uf_endereco')
                ->first();
                
        return view('admin.cliente.details', compact('clientes'));
    }

    public function update($id) {
        $clientes = DB::table('clientes')
                ->join('enderecos', 'clientes.id', '=', 'enderecos.id_cliente')
                ->where('clientes.id', '=', $id)
                ->select('clientes.id', 'clientes.nome_cliente', 'clientes.tel_cliente', 'clientes.cel_cliente', 'clientes.email_cliente', 'clientes.obs_cliente', 'enderecos.cep_endereco', 'enderecos.rua_endereco', 'enderecos.numero_endereco', 'enderecos.complemento_endereco', 'enderecos.cidade_endereco', 'enderecos.bairro_endereco', 'enderecos.uf_endereco')
                ->first();

        return view('admin.cliente.update', compact('clientes'));
    }

    public function updateCliente(Request $request) {
        $dataForm = $request->all();

        $cliente = $this->clienteModel->find($dataForm['id']);
        $endereco = $this->enderecoModel->where('id_cliente', $dataForm['id'])->first();

        $updateCliente = $cliente->update($dataForm);
        $updateEndereco = $endereco->update($dataForm);

        if ($updateCliente && $updateEndereco) {
            return redirect()->route('todosClientes')->with('success', 'Atualizado com sucesso');
        }
    }

    public function delete($id) {
        $clientes = DB::table('clientes')
                ->where('clientes.id', '=', $id)
                ->first();

        $enderecos = $this->enderecoModel->where('id_cliente', $id)->first();

        return view('admin.cliente.delete', compact('clientes', 'enderecos'));
    }

    public function deleteCliente(Request $request) {

        $data = DB::table('clientes')
                ->join('entregas', 'clientes.id', '=', 'entregas.id_cliente')
                ->where('clientes.id', '=', $request->id)
                ->count();


        if ($data > 0) {
            return redirect()->back()->with('error', 'Cliente possui entregas');
        }

        $clientes = $this->clienteModel;
        $dataForm = $request->all();
        $clientes->destroy($dataForm['id']);

        return redirect()->route('todosClientes')->with('success', 'Apagado com sucesso');
    }

    //Tentar buscar os dados do clientes
    public function buscarCliente($id) {
        //Cria arquivo de array com os dados dos clientes
        $cliente = $this->clienteModel->where('id', $id)->first()->toArray();
        $endereco = $this->enderecoModel->where('id_cliente', $id)->first()->toArray();
        $cliente = array_merge($cliente, $endereco);
        return json_encode($cliente);
    }

    public function searchCliente(Request $request) {
        $data = $request->all();
        $cliente = $this->clienteModel;
        $clientes = $cliente->search($data, $this->totalPagina);

        return view('admin.cliente.index', compact('clientes'));
    }

}
