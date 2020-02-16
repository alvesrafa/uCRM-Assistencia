<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdemPecas extends Model
{
    public $timestamps = false;
    protected $fillable = ['ordem_id', 'peca_id'];

}
