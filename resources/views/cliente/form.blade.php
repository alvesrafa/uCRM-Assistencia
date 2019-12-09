@extends('template')
@section('content')
<div class="card">
    <div class="card-header">Cadastro de cliente</div>
    <div class="card-body">
    <form action="{{url('/clientes')}}" method="POST">
        @csrf
        <div class="row">
            <div class="form-group col-md-8">
                <input type="text" name="nome" placeholder="Nome" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <input type="text" name="email" placeholder="E-mail" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <input type="text" name="cpf" placeholder="CPF" class="form-control">
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="form-group col-md-4">
                <input type="text" name="telefones[]" class="form-control">
            </div>
        </div>
        

        <button type="submit" class="btn btn-success">Cadastrar</button>
    </form>
    </div>
</div>

@endsection