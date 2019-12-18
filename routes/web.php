<?php


Route::resources([
    'clientes' => 'ClienteController',
    'tecnicos' => 'TecnicoController',
    'maoobra'  => 'MaoObraController',
    'pecas'    => 'PecaController',
    

]);
Route::get('/cliente/table', 'ClienteController@table');
Route::get('/tecnico/table', 'TecnicoController@table');
Route::get('/table/maoobra', 'MaoObraController@table');

