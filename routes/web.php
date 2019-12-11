<?php


Route::resources([
    'clientes' => 'ClienteController',
    
]);
Route::get('/cliente/table', 'ClienteController@table');

