<?php

use Illuminate\Http\Request;
use App\Estado;

Route::get('cidades/{id}', function($id){
        
    $estado = Estado::findorFail($id);
    
    $cidades = $estado->cidades()->getQuery()->get(['id', 'nome']);
    
    return Response::json($cidades);
});