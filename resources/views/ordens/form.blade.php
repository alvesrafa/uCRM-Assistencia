@extends('template')
@section('css')
    <link rel="stylesheet" href="{{asset('bibliotecas/css/select2.min.css')}}">
@endsection
@section('content')
<div class="card">
    <div class="card-header">Dados da nova ordem de serviço</div>
    <div class="card-body">
        <form action="{{url('ordens')}}" method="POST">
            @csrf
            <div class="row form-group d-flex justify-content-between">
                <div class="col-sm-3">
                    <input type="text" class="form-control" placeholder="numero" name="numero" value="{{old('numero', isset($ordem->numero) ? $ordem->numero : '')}}"> 
                </div>
                <div class="col-sm-3">
                    <input type="text" class="form-control" placeholder="valor" name="valor" value="{{old('valor', isset($ordem->valor) ? $ordem->valor : '')}}">
                </div>
                <div class="col-sm-3">
                    <input type="text" class="form-control" placeholder="desconto" name="desconto" value="{{old('desconto', isset($ordem->desconto) ? $ordem->desconto : '')}}">
                </div>
            </div>
            <hr>
            <div class="row form-group">
                <div class="col-sm-12">
                    <input type="text" name="status" class="form-control" placeholder="Status" value="{{old('status', isset($ordem->status) ? $ordem->status : '')}}">  
                </div>
            </div>
            <div class="form-group row d-flex align-items-center">
                <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="defeito" name="defeito">
                </div>
                <div class="col-sm-6">
                    <textarea class="form-control" name="observacoes" placeholder="observacoes" rows="3" value="{{old('observacoes', isset($ordem->observacoes) ? $ordem->observacoes : '')}}"></textarea>
                </div>
            </div>
            <hr>
            <nav>
                <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-cliente-tab" data-toggle="tab" href="#nav-cliente"  aria-selected="true">Cliente</a>
                    <a class="nav-item nav-link" id="nav-aparelho-tab" data-toggle="tab" href="#nav-aparelho" aria-selected="false">Aparelho</a>
                    <a class="nav-item nav-link" id="nav-peca-tab" data-toggle="tab" href="#nav-peca" aria-selected="false">Peças</a>
                    <a class="nav-item nav-link" id="nav-mao-tab" data-toggle="tab" href="#nav-mao" aria-selected="false">Mão-de-obra</a>
                    <a class="nav-item nav-link" id="nav-tecnico-tab" data-toggle="tab" href="#nav-tecnico" aria-selected="false">Técnico</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">

                <div class="tab-pane fade show active" id="nav-cliente">
                    <div class="row form-group">
                        <select name="cliente_id" class="basic-single col-12">
                            @foreach($clientes as $cliente)
                            <option value="{{$cliente->id}}">{{$cliente->nome}} | {{$cliente->documento}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-aparelho" >
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control" placeholder="modelo" name="modelo" value="{{old('modelo', isset($ordem->aparelho->modelo) ? $ordem->aparelho->modelo : '')}}">
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control" placeholder="marca" name="marca" value="{{old('marca', isset($ordem->aparelho->marca) ? $ordem->aparelho->marca : '')}}">
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control" placeholder="serial" name="serial" value="{{old('serial', isset($ordem->aparelho->serial) ? $ordem->aparelho->serial : '')}}">
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control" placeholder="imei" name="imei" value="{{old('imei', isset($ordem->aparelho->imei) ? $ordem->aparelho->imei : '')}}">
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-peca" >Peças</div>

                <div class="tab-pane fade" id="nav-mao" >Mão-de-obra</div>

                <div class="tab-pane fade" id="nav-tecnico" >
                    <div class="row form-group">
                        <select name="tecnico_id" class="col-12 basic-single">
                            @foreach($tecnicos as $tecnico)
                            <option value="{{$tecnico->id}}">{{$tecnico->nome}} | {{$tecnico->documento}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>
            <div class="row text-center">
                <div class="col-12">
                    <button class="btn btn-success ">Salvar OS</button>  
                </div>
            </div>
            
        </form>
    </div>
</div>
@endsection
@section('js')
<script src="{{asset('bibliotecas/js/select2.min.js')}}"></script>
<script>
$(document).ready(function() {
    $('.basic-single').select2();
});
</script>

@endsection