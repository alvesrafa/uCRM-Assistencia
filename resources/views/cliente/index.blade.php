@extends('template')
@section('content')
<div class="card">
    <div class="card-header">
        Lista de clientes
        <a class="btn btn-primary" href="{{url('clientes/create')}}">Novo</a>
    </div>
    <div class="card-body ">
        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="ativos" data-toggle="tab" href="#ativos" role="tab" aria-controls="ativos"
                aria-selected="true">Clientes Ativos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="inativos" data-toggle="tab" href="#inativos" role="tab" aria-controls="inativos"
                aria-selected="false">Clientes Inativos</a>
            </li>
        </ul>


    <div id="tab-content">
    
    </div>
        
        
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function(){
        var status = ''
        table('ativos')
        $(document).on('click', '#inativos' , function(){
            status = 'inativos'
            table(status)
        })
        $(document).on('click', '#ativos' , function(){
            status = 'ativos'
            table(status)
        })
    })
    function table(status) {
        $.get(main_url+'/cliente/table?status='+status, function(table){
            $('#tab-content').html(table);
        })
    }
</script>
@endsection