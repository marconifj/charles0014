<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model {

    public $timestamps = false;
    private $totalPagina = 8;
    protected $fillable = ['nome_cliente', 'email_cliente', 'tel_cliente', 'cel_cliente', 'obs_cliente'];

    public function endereco() {
        return $this->belongsTo('App\Models\Endereco');
    }

    public function search(Array $data, $totalPagina) {
        return $this->where(function($query) use ($data) {
                            if (isset($data['data'])) {
                                $query->orwhere('nome_cliente', 'like', '%' . $data['data'] . '%')
                                ->orwhere('cel_cliente', 'like', '%' . $data['data'] . '%')
                                ->orwhere('tel_cliente', 'like', '%' . $data['data'] . '%')
                                ->orwhere('email_cliente', 'like', '%' . $data['data'] . '%')
                                ->orderBy('id', 'desc');
                            }
                        })
                        ->paginate($totalPagina);
    }

}
