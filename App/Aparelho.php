<?php

namespace App;

use Illuminate\Database\Eloquent\{Model,SoftDeletes};

class Aparelho extends Model
{
    use SoftDeletes;
    protected $fillable = ['modelo', 'marca', 'serial', 'imei'];

}
