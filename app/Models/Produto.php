<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Produto extends Model {

    public $timestamps = false;
    protected $fillable = ['id', 'descricao_produto', 'valor_produto'];

    public function entrega() {
        return $this->belongsToMany('App\Models\Entrega');
    }

    public function search(Array $data, $totalPagina) {
        return $this->where(function($query) use ($data) {
                            if (isset($data['data'])) {
                                $query->orwhere('descricao_produto', 'like', '%' . $data['data'] . '%');
                            }
                        })
                        ->paginate($totalPagina);
    }

}
