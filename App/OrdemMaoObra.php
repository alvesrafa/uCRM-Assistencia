<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdemMaoObra extends Model
{
    public $timestamps = false;
    protected $fillable = ['ordem_id', 'maoobra_id'];

    
}
