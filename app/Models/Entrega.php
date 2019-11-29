<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Entrega extends Model {

    public $timestamps = false;
    private $totalPage = 8;
    protected $fillable = ['id_status', 'codigo_entrega', 'total_entrega', 'troco_entrega', 'id_produto', 'obs_entrega', 'id_cliente', 'id_entregador'];

    public function getAllEntrega() {
        $entregas = DB::table('entregas')
                        ->join('clientes', 'entregas.id_cliente', '=', 'clientes.id')
                        ->join('enderecos', 'clientes.id', '=', 'enderecos.id_cliente')
                        ->join('entregadors', 'entregadors.id', '=', 'entregas.id_entregador')
                        ->join('statuses', 'entregas.id_status', '=', 'statuses.id')
                        ->join('produtos', 'entregas.id_produto', '=', 'produtos.id')
                        ->select('entregas.codigo_entrega', 'entregas.id', 'produtos.descricao_produto', 'entregas.total_entrega', 'statuses.descricao_status', 'clientes.nome_cliente', 'entregadors.nome_entregador', 'enderecos.bairro_endereco')->orderBy('id', 'desc')->paginate($this->totalPage);

        return $entregas;
    }

    public function search(Array $data, $totalPagina) {
        return $this->join('clientes', 'entregas.id_cliente', '=', 'clientes.id')
                        ->join('enderecos', 'clientes.id', '=', 'enderecos.id_cliente')
                        ->join('entregadors', 'entregadors.id', '=', 'entregas.id_entregador')
                        ->join('statuses', 'entregas.id_status', '=', 'statuses.id')
                        ->join('produtos', 'entregas.id_produto', '=', 'produtos.id')
                        ->select('entregas.codigo_entrega', 'entregas.id', 'produtos.descricao_produto', 'entregas.total_entrega', 'statuses.descricao_status', 'clientes.nome_cliente', 'entregadors.nome_entregador', 'enderecos.bairro_endereco')
                        ->where(function($query) use ($data) {
                            if (isset($data['data'])) {
                                $query->orwhere('codigo_entrega', 'like', '%' . $data['data'] . '%')
                                ->orwhere('nome_cliente', 'like', '%' . $data['data'] . '%')
                                ->orwhere('nome_entregador', 'like', '%' . $data['data'] . '%')
                                ->orwhere('bairro_endereco', 'like', '%' . $data['data'] . '%')
                                ->orwhere('descricao_produto', 'like', '%' . $data['data'] . '%')
                                ->orwhere('descricao_status', 'like', '%' . $data['data'] . '%');
                            }
                        })
                        ->paginate($this->totalPage);
    }

}
