<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Cliente, Tecnico, Ordem, Aparelho};

class OrdemController extends Controller
{
    public function index(){
        return view('ordens.index');
    }

    public function create(){
        $clientes = Cliente::all();
        $tecnicos = Tecnico::all();

        return view('ordens.form', compact('clientes', 'tecnicos'));
    }

    public function store(Request $request){
        
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
        return 'foi?';
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

        return view('ordens.table', compact('ordens'));
    }
}
