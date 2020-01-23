<?php

namespace App;

use Illuminate\Database\Eloquent\{Model,SoftDeletes};

class Ordem extends Model {
    use SoftDeletes;
    protected $table = 'ordens';
    protected $fillable = ['cliente_id', 'aparelho_id', 'status', 'tecnico_id', 'numero', 'desconto', 'valor', 'defeito', 'observacoes'];

    public function cliente() {
        return $this->belongsTo('\App\Cliente');
    }
    public function tecnico() {
        return $this->belongsTo('\App\Tecnico');
    }
    public function aparelho() {
        return $this->belongsTo('\App\Aparelho');
    }
    public function pecas() {
        return $this->belongsToMany('App\Peca', 'ordem_pecas');
    }
    public function maoobras() {
        return $this->belongsToMany('App\MaoObra', 'ordem_mao_obras');
    }
}
