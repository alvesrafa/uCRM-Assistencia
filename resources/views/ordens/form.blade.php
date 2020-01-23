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
                    <div class="card ">
                        <div class="card-body">
                            <div  class="pecas">
                            @foreach ($pecasOrdem as $key => $peca)
                                <div class="row peca">
                                    <div class="col-sm-5">
                                        <select style="width:100%;" data-max="10" class="form-control" name="peca[{{$key}}][id]" id="">
                                            @foreach($pecas as $peca)
                                                <option value="{{$peca->id}}" data-quantidade="{{$peca->quantidade}}">{{$peca->nome}} | {{$peca->valorVenda}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <div class="input-group-btn">
                                                <button type="button" class="input-group-text menos">-</button>
                                            </div>
                                            <input type="text" class="form-control text-center quantidade" name="peca[{{$key}}][quantidade]" value="1" readonly>
                                            <div class="input-group-btn">
                                                <button type="button"class="input-group-text mais">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <button class="deletar" type="button">X</button>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                            <div class="col-12 mt-3">
                                <button class="mais-peca col-12 btn btn-success" type="button">+</button>
                            </div>
                        </div>
                    </div>
                    
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
                                        <option selected disabled value="">Selecione a mão-de-obra</option>
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
    $("[name='peca[][id]']").change(function(){
        $(this).attr('data-max', $('option:selected', this).attr('data-quantidade'))
        $(this).parents(".peca").find('.quantidade').val(1)
    })
    $('.mais').click(function(){
        var max = $(this).parents(".peca").find('select').attr('data-max')
        if(parseInt($(this).parents(".peca").find('.quantidade').val()) < max){
            valor = parseInt($(this).parents(".peca").find('.quantidade').val()) + 1
            $(this).parents(".peca").find('.quantidade').val(valor)
        }
    })
    $('.menos').click(function(){
        if(parseInt($(this).parents(".peca").find('.quantidade').val()) > 1){
            valor = parseInt($(this).parents(".peca").find('.quantidade').val()) - 1
            $(this).parents(".peca").find('.quantidade').val(valor)
        }
    })
    $('.deletar').click(function(){
        console.log(this)
        $(this).closest('.produto').remove();

     })
    $('.mais-peca').click(function(){
        var peca = $('.peca').last().clone()
        
        peca.find('select').val("");
        peca.find('input').val(1);
      

        peca.appendTo($(".pecas"));
     })

</script>

@endsection