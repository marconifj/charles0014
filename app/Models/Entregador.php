<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entregador extends Model {

    public $timestamps = false;
    protected $fillable = ['nome_entregador', 'cpf_entregador', 'identidade_entregador', 'veiculo_entregador', 'placa_veiculo_entregador', 'email_entregador', 'telefone_entregador', 'celular_entregador','obs_entregador'];

    public function endereco() {
        return $this->belongsTo('App\Models\Endereco');
    }

    public function search(Array $data, $totalPagina) {
        return $this->where(function($query) use ($data) {
                            if (isset($data['data'])) {
                                $query->orwhere('nome_entregador', 'like', '%' . $data['data'] . '%')
                                ->orwhere('cpf_entregador', 'like', '%' . $data['data'] . '%')
                                ->orwhere('celular_entregador', 'like', '%' . $data['data'] . '%');
                            }
                        })
                        ->paginate($totalPagina);
    }

}
