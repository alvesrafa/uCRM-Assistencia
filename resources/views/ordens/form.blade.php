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

            <div class="tab-content " id="nav-tabContent">

                <div class="tab-pane fade show active" id="nav-cliente">
                    <div class="card ">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-12">
                                    <label for="">Selecione o cliente:</label>
                                </div>
                                <div class="col-12 form-group">
                                    <select style="width:100%;" name="cliente_id" class="basic-single">
                                        <option selected disabled value="">Selecione o cliente</option>
                                        @foreach($clientes as $cliente)
                                            <option value="{{$cliente->id}}" >{{$cliente->nome}} | {{$cliente->documento}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>

                <div class="tab-pane fade" id="nav-aparelho" >
                    <div class="card ">
                        <div class="card-body">
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
                    </div>
                    
                </div>
                <?php
                    $pecasOrdem = old('pecas', isset($ordem) ? $ordem->pecas : [[]]);      
                ?>
                <div class="tab-pane fade" id="nav-peca" >
                    @include('ordens._pecas')
                </div>

                <div class="tab-pane fade" id="nav-mao" >
                    <div class="card ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <label for="">Selecione os serviços:</label>
                                </div>
                                <div class="col-12 form-group">
                                    <select style="width:100%;" name="servicos[]" id="valor_servico" class="form-control basic-single"
                        multiple="true">
                                        <option disabled value="">Selecione a mão-de-obra</option>
                                        @foreach($servicos as $maoobra)
                                            <option value="{{$maoobra->id}}">{{$maoobra->nome}} | R${{$maoobra->valor}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                </div>

                <div class="tab-pane fade" id="nav-tecnico" >
                    <div class="card ">
                        <div class="card-body ">
                            <div class="row form-group">
                                <select style="width:100%;" name="tecnico_id" class="basic-single">
                                    <option selected disabled value="">Selecione o técnico</option>
                                    @foreach($tecnicos as $tecnico)
                                        <option value="{{$tecnico->id}}">{{$tecnico->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
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
    $('.basic-single').select2();

    $(document).on('change', '.select', function(){
        $(this).attr('data-max', $('option:selected', this).attr('data-quantidade'))
        $(this).parents(".peca").find('.quantidade').val(1)
    })
    $(document).on('click', '.mais', function (){
        var max = $(this).parents(".peca").find('select').attr('data-max')
        if(parseInt($(this).parents(".peca").find('.quantidade').val()) < max){
            valor = parseInt($(this).parents(".peca").find('.quantidade').val()) + 1
            $(this).parents(".peca").find('.quantidade').val(valor)
        }
    })
    $(document).on('click', '.menos', function (){
        if(parseInt($(this).parents(".peca").find('.quantidade').val()) > 1){
            valor = parseInt($(this).parents(".peca").find('.quantidade').val()) - 1
            $(this).parents(".peca").find('.quantidade').val(valor)
        }
    })
    $(document).on('click', '#adicionar-peca', function () {

        $('.excluir-peca').parent().removeClass('d-none');
        var pedido = $(".peca").last().clone();

        pedido.find('.error').remove();
        pedido.find('.has-error').removeClass('has-error')

        var inputs = pedido.find('select, input');
        inputs.val("");
        inputs.map((i, input) => {
            var match = $(input).attr('name').match(/\[(\d+)]/g)[0]
            var contador = parseInt(match.replace('[', '').replace(']', '')) + 1
            var newName = $(input).attr('name').replace(match, `[${contador}]`)

            $(input).attr('name', newName)
        })
        pedido.appendTo($(".pecas"));
    });
    $(document).on('click', '.excluir-peca', function () {
    if ($('.peca').length == 2) {
        $(this).closest('.peca').remove();
        $('.excluir-peca').parent().addClass('d-none');
    } else if ($('.peca').length >= 2) {
        $(this).closest('.peca').remove();
    }
    });

$(document).ready(function () {
if ($('.peca').length >= 2) { //quando for edição e tiver mais de um peca ele mostra o boão de exclusão da peca
    $('.peca').children('.d-none').removeClass('d-none')
}

});
</script>

@endsection