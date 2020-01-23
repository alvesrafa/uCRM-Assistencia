<?php

namespace App\Http\Controllers;
use App\Tecnico;
use Illuminate\Http\Request;

class TecnicoController extends Controller{

    public function index(){

        return view('tecnico.index');
    }

    public function create(){

        return view('tecnico.form');
    }

    public function store(Request $request){
        

        $tecnico = Tecnico::create([
            'nome' => $request['nome'],
            'email' => $request['email'],
            'documento' => $request['documento'],
            'telefone' => $request['telefone']
        ]);
        
        return redirect('/tecnicos')->with('success', 'Técnico cadastrado com sucesso!');
    }

    public function show($id){
        //
    }

    public function edit($id)
    {
        $tecnico = Tecnico::findOrFail($id);

        return view('tecnico.form', compact('tecnico'));
    }

    public function update(Request $request, $id){
        $tecnico = Tecnico::findOrFail($id);
        $tecnico->update([
            'nome' => $request['nome'],
            'email' => $request['email'],
            'documento' => $request['documento'],
            'telefone' => $request['telefone'],
        ]);
        return redirect('/tecnicos')->with('success', 'Técnico Atualizado com sucesso.');
    }


    public function destroy($id){
        $tecnico = Tecnico::withTrashed()->findOrFail($id);
        if(!$tecnico->trashed()){
            $tecnico->delete();
            return redirect('/tecnicos')->with('success', 'Técnico deletado com sucesso.');
        } else {
            $tecnico->restore();
            return redirect('/tecnicos')->with('success', 'Técnico restaurado com sucesso.');
        }

        
    }
    public function table(Request $request){
        $tecnicos = new tecnico;
        if($request->status == 'ativos')
            $tecnicos = $tecnicos::paginate(8);
        
        if($request->status == 'inativos')
            $tecnicos = $tecnicos::onlyTrashed()->paginate(8);
            
        return view('tecnico.table', compact('tecnicos'));
    }
}