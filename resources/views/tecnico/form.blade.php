@extends('template')
@section('content')
<div class="card">
    <div class="card-header">Cadastro de técnico</div>
    <div class="card-body">
    <form action="{{isset($tecnico) ? url('/tecnicos/'.$tecnico->id) : url('/tecnicos')}}" method="POST"> 
        @if(isset($tecnico))
            @method('PUT')
        @endif
        @csrf
        <div class="row">
            <div class="form-group col-md-8">
                <input type="text" name="nome" placeholder="Nome" class="form-control" value="{{old('nome' , isset($tecnico->nome) ? $tecnico->nome : '' )}}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <input type="email" name="email" placeholder="E-mail" class="form-control" value="{{old('email', isset($tecnico->email) ? $tecnico->email : '')}}">
            </div>
            <div class="form-group col-md-6">
                <input type="text" name="documento" placeholder="CPF" class="form-control" value="{{old('documento', isset($tecnico->documento) ? $tecnico->documento : '')}}">
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="form-group col-md-4">
                <input type="text" name="telefone" class="form-control" placeholder="Telefone" value="{{ old('telefone', isset($tecnico->telefone) ? $tecnico->telefone : '')}}">
            </div>
        </div>
        
        <button type="submit" class="btn {{isset($tecnico) ? 'btn-primary' : 'btn-success'}}">{{isset($tecnico) ? 'Atualizar' : 'Cadastrar'}}</button>

    </form>
    </div>
</div>

@endsection
@section('js')
<script>
    //Mascaras
    var SPMaskBehavior = function(val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    spOptions = {
        onKeyPress: function(val, e, field, options) {
            field.mask(SPMaskBehavior.apply({}, arguments), options);
        }
    };
    $("[name='telefone']").mask(SPMaskBehavior, spOptions);
    //Mascaras

</script>
@endsection