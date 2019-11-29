<?php

namespace App\Http\Controllers\Admin;

use App\Models\Produto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ProdutoController extends Controller {

    private $produtoModel;
    private $totalPagina = 8;

    public function __construct() {
        $this->middleware('auth');
        $this->produtoModel = new Produto();
    }

    public function index() {
        $produtos = DB::table('produtos')->orderBy('id', 'desc')->paginate($this->totalPagina);

        $soma = DB::table('produtos')->sum('valor_produto');
        
        return view('admin.produto.index', compact('produtos','soma'));
    }

    public function create() {
        return view('admin.produto.create');
    }

    public function store(Request $request) {
        $dados = $request->all();
        $produtos = $this->produtoModel->create($dados);

        return redirect()->route('todosProdutos')->with('success', 'Produto adicionado com sucesso');
    }

    public function show($id) {

        $produtos = DB::table('produtos')
                ->where('produtos.id', '=', $id)
                ->first();

        return view('admin.produto.details', compact('produtos'));
    }

    public function update($id) {
        $produtos = DB::table('produtos')
                ->where('produtos.id', '=', $id)
                ->first();

        return view('admin.produto.update', compact('produtos'));
    }

    public function updateProduto(Request $request) {
        $dataForm = $request->all();

        $produto = $this->produtoModel->find($dataForm['id']);

        $updateProduto = $produto->update($dataForm);

        if ($updateProduto) {
            return redirect()->route('todosProdutos')->with('success', 'Produto atualizado com sucesso');
        }
    }

    public function delete($id) {
        $produto = DB::table('produtos')
                ->where('produtos.id', '=', $id)
                ->first();

        return view('admin.produto.delete', compact('produto'));
    }

    public function deleteProduto(Request $request) {
        $produto = $this->produtoModel;
        $dataForm = $request->all();
        if ($produto->destroy($dataForm['id'])) {

            return redirect()->route('todosProdutos')->with('success', 'Produto adicionado com sucesso');
        } else {
            return redirect()->route('todosProdutos')->with('error', 'Registro não pode ser apagado');
        }
    }

    public function buscarProduto($id) {
        //Cria arquivo de array com os dados dos clientes
        $produto = $this->produtoModel->find($id);
        return json_encode($produto);
    }

    public function searchProduto(Request $request) {
        $data = $request->all();
        $produtos = $this->produtoModel->search($data, $this->totalPagina);

        return view('admin.produto.index', compact('produtos'));
    }

}
