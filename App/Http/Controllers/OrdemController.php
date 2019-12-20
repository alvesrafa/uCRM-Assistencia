<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Cliente, Tecnico, Ordem};

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
