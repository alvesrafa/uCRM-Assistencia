<?php

namespace App;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};


class Cliente extends Model {
    use SoftDeletes;
    protected $fillable = ['nome', 'cpf', 'email', 'telefones'];

}
