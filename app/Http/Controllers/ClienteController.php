<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Cliente, Estado, Endereco};

class ClienteController extends Controller
{

    public function index(){

        return view('cliente.index');
    }

    public function create(){
        $estados = Estado::all();
        return view('cliente.form', compact('estados'));
    }

    public function store(Request $request){
        
        $endereco = Endereco::create($request['endereco']);
        $cliente = Cliente::create([
            'nome' => $request['nome'],
            'email' => $request['email'],
            'documento' => $request['documento'],
            'telefone' => $request['telefone'],
            'endereco_id' => $endereco->id
        ]);
        
        return redirect('/clientes')->with('success', 'Cliente cadastrado com sucesso!');
    }

    public function show($id){
        //
    }

    public function edit($id)
    {

        $estados = Estado::all();
        $cliente = Cliente::findOrFail($id);

        return view('cliente.form', compact('cliente', 'estados'));
    }

    public function update(Request $request, $id){
        $cliente = Cliente::findOrFail($id);
        $cliente->endereco->update($request['endereco']);
        $cliente->update([
            'nome' => $request['nome'],
            'email' => $request['email'],
            'documento' => $request['documento'],
            'telefone' => $request['telefone'],
        ]);
        return redirect('/clientes')->with('success', 'Cliente Atualizado com sucesso.');
    }


    public function destroy($id){
        $cliente = Cliente::withTrashed()->findOrFail($id);
        if(!$cliente->trashed()){
            $cliente->delete();
            return redirect('/clientes')->with('success', 'Cliente deletado com sucesso.');
        } else {
            $cliente->restore();
            return redirect('/clientes')->with('success', 'Cliente restaurado com sucesso.');
        }

        
    }
    public function table(Request $request){
        $clientes = new Cliente;
        if($request->status == 'ativos')
            $clientes = $clientes::paginate(8);
        
        if($request->status == 'inativos')
            $clientes = $clientes::onlyTrashed()->paginate(8);
            
        return view('cliente.table', compact('clientes'));
    }
}
