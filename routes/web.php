<?php


Route::resources([
    'clientes' => 'ClienteController',
    'tecnicos' => 'TecnicoController',
    'maoobra'  => 'MaoObraController',
    'pecas'    => 'PecaController',
    'ordens'   => 'OrdemController',

]);

Route::prefix('table')->group(function () {
    Route::get('/clientes', 'ClienteController@table');
    Route::get('/tecnicos', 'TecnicoController@table');
    Route::get('/maoobra', 'MaoObraController@table');
    Route::get('/pecas', 'PecaController@table');
    Route::get('/ordens', 'OrdemController@table');
    
});