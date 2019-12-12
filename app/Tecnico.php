<?php

namespace App;

use Illuminate\Database\Eloquent\{Model,SoftDeletes};

class Tecnico extends Model
{
    use SoftDeletes;
    protected $fillable = ['nome', 'documento', 'email', 'telefone'];
}
