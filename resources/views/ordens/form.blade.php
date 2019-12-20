@extends('template')
@section('content')
<div class="card">
    <div class="card-header">Dados da nova ordem de serviço</div>
    <div class="card-body">
        <form action="{{url('ordens')}}" method="POST">
        @csrf
            <div class="form-group">
                <input type="text" class="form-control" placeholder="numero" name="numero">
                <input type="text" class="form-control" placeholder="valor" name="valor">
                <input type="text" class="form-control" placeholder="desconto" name="desconto">
                <input type="text" class="form-control" placeholder="defeito" name="defeito">
                <input type="text" class="form-control" placeholder="observacoes" name="observacoes">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="modelo" name="modelo">
                <input type="text" class="form-control" placeholder="marca" name="marca">
                <input type="text" class="form-control" placeholder="serial" name="serial">
                <input type="text" class="form-control" placeholder="imei" name="imei">
            </div>
            <input type="text" name="cliente_id" value="1">
            <input type="text" name="tecnico_id" value="1">
            <button class="btn btn-success">Salvar OS</button>
        </form>
    </div>
</div>
@endsection