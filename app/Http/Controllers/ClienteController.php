<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function index(){
        return view('cliente.index');
    }

    public function create(){
        return view('cliente.form');
    }

    public function store(Request $request){
        Cliente::crerate($request->all());
        return view('cliente.index')->with('success', 'Cliente cadastrado com sucesso!');
    }

    public function show($id){
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id){
        //
    }


    public function destroy($id){
        //
    }
}
