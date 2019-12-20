<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aparelho extends Model
{

    protected $fillable = ['modelo', 'marca', 'serial', 'imei'];

}
