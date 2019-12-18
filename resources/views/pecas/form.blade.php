@extends('template')
@section('content')
<div class="card">
    <div class="card-header">Cadastrar peça</div>
    <div class="card-body">
    <form action="{{isset($peca) ? url('/pecas/'.$peca->id) : url('/pecas')}}" method="POST"> 
        @if(isset($peca))
            @method('PUT')
        @endif
        @csrf
        <div class="row">
            <div class="form-group col-md-8">
                <input type="text" name="nome" placeholder="Nome" class="form-control" value="{{old('nome' , isset($peca->nome) ? $peca->nome : '' )}}">
            </div>
            <div class="form-group col-md-3">
                <input type="text" name="quantidade" placeholder="Quantidade" class="form-control" value="{{old('quantidade' , isset($peca->quantidade) ? $peca->quantidade : '' )}}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <input type="text" name="valorCompra" placeholder="Valor da compra" class="form-control money" value="{{old('valorCompra', isset($peca->valorCompra) ? $peca->valorCompra : '')}}">
            </div>
            <div class="form-group col-md-6">
                <input type="text" name="valorVenda" placeholder="Valor da venda" class="form-control money" value="{{old('valorVenda', isset($peca->valorVenda) ? $peca->valorVenda : '')}}">
            </div>
        </div>
        
        <button type="submit" class="btn {{isset($peca) ? 'btn-primary' : 'btn-success'}}">{{isset($peca) ? 'Atualizar' : 'Cadastrar'}}</button>

    </form>
    </div>
</div>

@endsection
@section('js')
<script>
    //Mascaras
    $(".money").mask('#.##0,00', {reverse: true})
</script>
@endsection