<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordem extends Model {

    protected $fillable = ['cliente_id', 'aparelho_id', 'tecnico_id', 'numero', 'desconto', 'valor', 'defeito', 'observacoes'];

    public function cliente() {
        return $this->belongsTo('\App\Cliente');
    }
    public function tecnico() {
        return $this->belongsTo('\App\Tecnico');
    }
    public function aparelho() {
        return $this->hasOne('\App\Aparelho');
    }

}
