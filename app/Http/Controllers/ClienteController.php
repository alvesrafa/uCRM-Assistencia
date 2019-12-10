<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Cliente, Estado, Endereco};
class ClienteController extends Controller
{

    public function index(){
        $clientes = Cliente::paginate(10);

        return view('cliente.index', compact('clientes'));
    }

    public function create(){
        $estados = Estado::all();
        return view('cliente.form', compact('estados'));
    }

    public function store(Request $request){
        $dados = $request->all();
        $endereco = Endereco::create($dados['endereco']);
        $cliente = Cliente::create([
            'nome' => $dados['nome'],
            'email' => $dados['email'],
            'cpf' => $dados['cpf'],
            'telefone' => $dados['telefone'],
            'endereco_id' => $endereco->id
        ]);
        
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
