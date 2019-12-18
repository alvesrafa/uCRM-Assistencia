<?php

namespace App;

use Illuminate\Database\Eloquent\{Model,SoftDeletes};

class Peca extends Model
{
    use SoftDeletes;

    protected $fillable = ['nome', 'valorCompra', 'valorVenda', 'quantidade'];
}
