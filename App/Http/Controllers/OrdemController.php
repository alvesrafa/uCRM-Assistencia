<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Cliente, Tecnico, MaoObra, Ordem, Aparelho, Peca};

class OrdemController extends Controller
{
    public function index(){
        return view('ordens.index');
    }

    public function create(){
        $clientes = Cliente::all();
        $tecnicos = Tecnico::all();
        $servicos = MaoObra::all();
        $pecas = Peca::all();
        return view('ordens.form', compact('clientes', 'tecnicos', 'servicos', 'pecas'));
    }

    public function store(Request $request){
        $dados = $request->all();
        return $dados;

        $aparelho = Aparelho::create($request->all());
        Ordem::create([
            'cliente_id' => $request['cliente_id'],
            'aparelho_id' => $aparelho->id, 
            'tecnico_id' => $request['tecnico_id'], 
            'numero' => $request['numero'], 
            'desconto' => $request['desconto'], 
            'valor' => $request['valor'], 
            'defeito' => $request['defeito'], 
            'observacoes' => $request['observacoes'] 
        ]);
        return redirect('/ordens')->with('success', 'Ordem de serviço iniciada!');

    }

    public function show($id){
        
    }

    public function edit($id){
        
    }

    public function update(Request $request, $id){
        
    }

    public function destroy($id){

    }

    public function table(Request $request){
        $ordens = new Ordem;
 
        if($request->status == 'ativos')
            $ordens = $ordens::paginate(8);
    
        if($request->status == 'inativos')
            $ordens = $ordens::onlyTrashed()->paginate(8);

        
        return view('ordens.table', compact('ordens'));
    }
}
