<?php

namespace App;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};


class Cliente extends Model {
    use SoftDeletes;
    protected $fillable = ['nome', 'cpf', 'email', 'telefone', 'endereco_id'];

    public function endereco(){ //relacionamento ao endereço (função que retorna o mesmo)
        return $this->belongsTo('App\Entities\Endereco');
    }
}
