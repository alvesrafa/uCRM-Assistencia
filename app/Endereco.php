<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = 'enderecos';
    protected $fillable = ['logradouro', 'numero', 'bairro', 'cidade_id','cep','complemento'];
    public $timestamps = false;
    public function cidade(){
        return $this->belongsTo('App\Cidade','cidade_id');
    }
    public function setCepAttribute($val) {
        $this->attributes['cep'] = str_replace('-', '', $val);
    }
    public function getCepAttribute($val) {
        return $val ? substr($val,0,5).'-'.substr($val,5,8) : $val;
    }
}
