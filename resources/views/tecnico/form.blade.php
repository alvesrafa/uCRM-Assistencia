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
    $("[name='endereco[cep]']").mask('99999-999')
    $("[name='endereco[numero]']").mask('99999')
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
    $(document).ready(function() {
        if($('[name="endereco[estado_id]"]').val()){
            getCidades($('[name="endereco[estado_id]"]').val(), $('[name="endereco[estado_id]"]').attr('cidade'))
        } //quando vem do edit
    });

    $('#estado').change(function() {

        var idEstado = $(this).val();
        if (idEstado) {
            getCidades(idEstado);
        } else {
            $('#cidade').empty()
            $('#cidade').append("<option selected disabled value=''>Selecione</option>")
        }

    });
    function getCidades(estado_id,nome_cidade=null){
        $.get(main_url+'/api/cidades/' + estado_id, function(cidades) {
                $('#cidade').empty()
                $('#cidade').append("<option selected disabled value=''>Selecione a cidade</option>")
                $.each(cidades, function(key, value) {
                
                    if(nome_cidade == value.nome || nome_cidade == value.id){
                        $('#cidade').append('<option selected value=' + value.id + '>' + value.nome + '</option>')
                    }else{
                        $('#cidade').append('<option  value=' + value.id + '>' + value.nome + '</option>')
                    }
                })
        })

    }
    //Quando o campo cep perde o foco.
    $("[name='endereco[cep]']").blur(function() {
        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');
        //Verifica se campo cep possui valor informado.
        if (cep != "") {
            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if (validacep.test(cep)) {
                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("[name='endereco[logradouro]']").val(dados.logradouro);
                        $("[name='endereco[bairro]']").val(dados.bairro);

                        var estado = $(`select[name='endereco[estado_id]'] option[uf='${dados.uf}']`);
                        estado.attr('selected', 'selected');
                        
                        getCidades(estado.val(),dados.localidade);
                        $("[name='endereco[numero]']").focus();
                        
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                    }
                });
            } //end if.
            else {
                //cep é inválido.
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.   
        }
    });
</script>
@endsection