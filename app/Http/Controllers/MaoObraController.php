<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MaoObra;

class MaoObraController extends Controller{
    public function index(){

        return view('maoobra.index');
    }

    public function create(){

        return view('maoobra.form');
    }

    public function store(Request $request){
        $request['valor'] = str_replace('.', '', $request['valor']);
        $request['valor'] = str_replace(',', '.', $request['valor']);

        $maoobra = MaoObra::create([
            'nome' => $request['nome'],
            'valor' => $request['valor'],
        ]);
        
        return redirect('/maoobra')->with('success', 'Técnico cadastrado com sucesso!');
    }

    public function show($id){
        //
    }

    public function edit($id)
    {
        $maoobra = MaoObra::findOrFail($id);

        return view('maoobra.form', compact('maoobra'));
    }

    public function update(Request $request, $id){
        $request['valor'] = str_replace('.', '', $request['valor']);
        $request['valor'] = str_replace(',', '.', $request['valor']);
        $maoobra = MaoObra::findOrFail($id);
        $maoobra->update([
            'nome' => $request['nome'],
            'valor' => $request['valor'],
        ]);
        return redirect('/maoobra')->with('success', 'Técnico Atualizado com sucesso.');
    }


    public function destroy($id){
        $maoobra = MaoObra::withTrashed()->findOrFail($id);
        if(!$maoobra->trashed()){
            $maoobra->delete();
            return redirect('/maoobra')->with('success', 'Técnico deletado com sucesso.');
        } else {
            $maoobra->restore();
            return redirect('/maoobra')->with('success', 'Técnico restaurado com sucesso.');
        }

        
    }

    public function table(Request $request){
        $maoobras = new MaoObra;
        if($request->status == 'ativos')
            $maoobras = $maoobras::paginate(1);
        
        if($request->status == 'inativos')
            $maoobras = $maoobras::onlyTrashed()->paginate(1);
            
        return view('maoobra.table', compact('maoobras'));
    }
}
