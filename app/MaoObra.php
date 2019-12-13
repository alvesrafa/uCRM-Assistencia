<?php

namespace App;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class MaoObra extends Model
{
    use SoftDeletes;
    protected $table = 'mao_obra';
    protected $fillable = ['nome', 'valor'];

}
