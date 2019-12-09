<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $table = 'cidades';
    protected $fillable = ['nome'];
    public $timestamps = false;
    public function estado(){
        return $this->belongsTo('App\Entities\Estado','estado_id');
    }
}
