<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
class ClienteController extends Controller
{

    public function index(){
        $clientes = Cliente::paginate(10);

        return view('cliente.index', compact('clientes'));
    }

    public function create(){
        return view('cliente.form');
    }

    public function store(Request $request){

        Cliente::create($request->all());

        return redirect('/clientes')->with('success', 'Cliente cadastrado com sucesso!');
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
        $cliente = Cliente::findOrFail($id);
        if(!$cliente->trashed()){
            $cliente->delete();
        } else {
            $cliente->restore();
        }
    }
}
