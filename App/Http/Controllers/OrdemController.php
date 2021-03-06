<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Cliente, Tecnico, MaoObra, Ordem, Aparelho, Peca, OrdemMaoObra, OrdemPecas};

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
        $aparelho = Aparelho::create($request->all());
        $pecas = $request['pecas'];
        $servicos = $request['servicos'];
        
        

        $ordem = Ordem::create([
            'cliente_id' => $request['cliente_id'],
            'aparelho_id' => $aparelho->id, 
            'tecnico_id' => $request['tecnico_id'], 
            'numero' => $request['numero'],
            'status' => $request['status'],
            'desconto' => $request['desconto'], 
            'valor' => $request['valor'], 
            'defeito' => $request['defeito'], 
            'observacoes' => $request['observacoes'] 
        ]);

        foreach($servicos as $idServico){
            OrdemMaoObra::create([
                'ordem_id' => $ordem->id,
                'maoobra_id' => intval($idServico)
            ]);
        }
        foreach($pecas as $idPeca){
            OrdemPecas::create([
                'ordem_id' => $ordem->id,
                'peca_id' => intval($idPeca)
            ]);
        }

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
