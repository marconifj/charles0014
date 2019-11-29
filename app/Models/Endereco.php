<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model {

    public $timestamps = false;
    protected $fillable = ['id_cliente', 'id_entregador', 'cep_endereco', 'rua_endereco', 'numero_endereco', 'complemento_endereco', 'bairro_endereco', 'cidade_endereco', 'uf_endereco'];

}
