<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peca;
class PecaController extends Controller
{
    public function index(){

        return view('pecas.index');
    }

    public function create(){

        return view('pecas.form');
    }

    public function store(Request $request){
        $request['valorCompra'] = str_replace('.', '', $request['valorCompra']);
        $request['valorCompra'] = str_replace(',', '.', $request['valorCompra']);
        $request['valorVenda'] = str_replace('.', '', $request['valorVenda']);
        $request['valorVenda'] = str_replace(',', '.', $request['valorVenda']);

        $peca = Peca::create($request->all());
        
        return redirect('/pecas')->with('success', 'Peça cadastrada com sucesso!');
    }

    public function show($id){
        //
    }

    public function edit($id)
    {
        $peca = Peca::findOrFail($id);

        return view('pecas.form', compact('peca'));
    }

    public function update(Request $request, $id){
        $request['valorCompra'] = str_replace('.', '', $request['valorCompra']);
        $request['valorCompra'] = str_replace(',', '.', $request['valorCompra']);
        $request['valorVenda'] = str_replace('.', '', $request['valorVenda']);
        $request['valorVenda'] = str_replace(',', '.', $request['valorVenda']);
        $peca = Peca::findOrFail($id);
        $peca->update($request->all());
        
        return redirect('/pecas')->with('success', 'Peça atualizada com sucesso.');
    }


    public function destroy($id){
        $peca = Peca::withTrashed()->findOrFail($id);
        if(!$peca->trashed()){
            $peca->delete();
            return redirect('/pecas')->with('success', 'Peça deletada com sucesso.');
        } else {
            $peca->restore();
            return redirect('/pecas')->with('success', 'Peça restaurada com sucesso.');
        }

        
    }

    public function table(Request $request){
        $pecas = new Peca;
        if($request->status == 'ativos')
            $pecas = $pecas::paginate(8);
        
        if($request->status == 'inativos')
            $pecas = $pecas::onlyTrashed()->paginate(8);
            
        return view('pecas.table', compact('pecas'));
    }
}
