<?php


Route::resources([
    'clientes' => 'ClienteController',
    'tecnicos' => 'TecnicoController',

]);
Route::get('/cliente/table', 'ClienteController@table');
Route::get('/tecnico/table', 'TecnicoController@table');

