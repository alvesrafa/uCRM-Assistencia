@extends('template')
@section('content')
<div class="card">
    <div class="card-header">Cadastro de técnico</div>
    <div class="card-body">
    <form action="{{isset($maoobra) ? url('/maoobra/'.$maoobra->id) : url('/maoobra')}}" method="POST"> 
        @if(isset($maoobra))
            @method('PUT')
        @endif
        @csrf
        <div class="row">
            <div class="form-group col-md-8">
                <input type="text" name="nome" placeholder="Nome" class="form-control" value="{{old('nome' , isset($maoobra->nome) ? $maoobra->nome : '' )}}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <input type="text" name="valor" placeholder="Valor" class="form-control" value="{{old('valor', isset($maoobra->valor) ? $maoobra->valor : '')}}">
            </div>
        </div>
        
        <button type="submit" class="btn {{isset($maoobra) ? 'btn-primary' : 'btn-success'}}">{{isset($maoobra) ? 'Atualizar' : 'Cadastrar'}}</button>

    </form>
    </div>
</div>

@endsection
@section('js')
<script>
    //Mascaras
    $("[name='valor']").mask('#.##0,00', {reverse: true})
</script>
@endsection