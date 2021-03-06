@extends('template')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        Lista de OS's
        <a class="btn btn-primary" href="{{url('ordens/create')}}">Nova OS</a>
    </div>
    <div class="card-body ">
        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="ativos" data-toggle="tab" href="#ativos" role="tab" aria-controls="ativos"
                aria-selected="true">OS's ativas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="inativos" data-toggle="tab" href="#inativos" role="tab" aria-controls="inativos"
                aria-selected="false">OS's inativas</a>
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
        var status = 'ativos'
        table(main_url+'/table/ordens?status='+status)
        $(document).on('click', '#inativos' , function(){
            status = 'inativos'
            table(main_url+'/table/ordens?status='+status)
        })
        $(document).on('click', '#ativos' , function(){
            status = 'ativos'
            table(main_url+'/table/ordens?status='+status)
        })
        $(document).on('click','.page-link', function(e){
            e.preventDefault();
            table($(this).attr('href')+'&status='+status)
        })
    })
    function table(url) {
        console.log(url)
        $.get(url, function(table){
            $('#tab-content').html(table);
        })
    }
</script>
@endsection