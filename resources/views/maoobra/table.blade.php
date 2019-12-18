<table class="table text-center">
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Valor</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($maoobras as $maoobra)
            <tr>
                <td>{{$maoobra->nome}}</td>
                <td>{{$maoobra->valor}}</td>
                <td class="d-flex justify-content-around align-items-center"> 
                    @if($maoobra->trashed())
                    <form  class="" action="{{url('/maoobra/'.$maoobra->id)}}" method="post">
                        @csrf
                        @method('delete')
                            <button class="btn btn-secondary px-2" type="submit">ativar</button>
                    </form>
                    @else
                        <a href="{{url('/maoobra/'.$maoobra->id)}}" class="btn btn-info px-2" >Ver Mais</a>
                        <a href="{{url('/maoobra/'.$maoobra->id.'/edit')}}" class="btn btn-warning px-2">Lápis</a>
                        <form  class="" action="{{url('/maoobra/'.$maoobra->id)}}" method="post">
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

                    Página {{$maoobras->currentPage()}} de {{$maoobras->lastPage()}} páginas

                </p>
            </td>
        </tr>
        @if($maoobras->lastPage() > 1)
        <tr>
            <td colspan="100%">
                {{ $maoobras->links() }}
            </td>
        </tr>
        @endif
    </tfoot>
</table>