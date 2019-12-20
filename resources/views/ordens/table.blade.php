<table class="table text-center">
    <thead>
        <tr>
            <th scope="col">Numero da ordem</th>
            <th scope="col">Valor</th>
            <th scope="col">Cliente</th>
            <th scope="col">Técnico</th>
            <th scope="col">Aparelho</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ordens as $ordem)
            <tr>
                <td>{{$ordem->numero}}</td>
                <td>{{$ordem->valor}}</td>
                <td>{{$ordem->cliente->nome}}</td>
                <td>{{$ordem->tecnico->nome}}</td>
                <td>{{$ordem->aparelho->modelo}}</td>
                <td class="d-flex justify-content-around align-items-center"> 
                    @if($ordem->trashed())
                    <form  class="" action="{{url('/ordens/'.$ordem->id)}}" method="post">
                        @csrf
                        @method('delete')
                            <button class="btn btn-secondary px-2" type="submit">ativar</button>
                    </form>
                    @else
                        <a href="{{url('/ordens/'.$ordem->id)}}" class="btn btn-info px-2" >Ver Mais</a>
                        <a href="{{url('/ordens/'.$ordem->id.'/edit')}}" class="btn btn-warning px-2">Lápis</a>
                        <form  class="" action="{{url('/ordens/'.$ordem->id)}}" method="post">
                            @csrf
                            @method('delete')
                                <button class="btn btn-danger px-2" type="submit">lixo</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="100%" class="text-center">
                <p class="text-center">

                    Página {{$ordens->currentPage()}} de {{$ordens->lastPage()}} páginas

                </p>
            </td>
        </tr>
        @if($ordens->lastPage() > 1)
        <tr>
            <td colspan="100%">
                {{ $ordens->links() }}
            </td>
        </tr>
        @endif
    </tfoot>
</table>