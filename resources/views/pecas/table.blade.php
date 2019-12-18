<table class="table text-center">
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Valor para venda</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pecas as $peca)
            <tr>
                <td>{{$peca->nome}}</td>
                <td>{{$peca->valorVenda}}</td>
                <td class="d-flex justify-content-around align-items-center">
                @if($peca->trashed())
                    <form  class="" action="{{url('/pecas/'.$peca->id)}}" method="post">
                        @csrf
                        @method('delete')
                            <button class="btn btn-secondary px-2" type="submit">ativar</button>
                    </form>
                @else
                    <a href="{{url('/pecas/'.$peca->id)}}" class="btn btn-info px-2" >Ver Mais</a>
                    <a href="{{url('/pecas/'.$peca->id.'/edit')}}" class="btn btn-warning px-2">Lápis</a>
                    <form  class="" action="{{url('/pecas/'.$peca->id)}}" method="post">
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

                    Página {{$pecas->currentPage()}} de {{$pecas->lastPage()}} páginas

                </p>
            </td>
        </tr>
        @if($pecas->lastPage() > 1)
        <tr>
            <td colspan="100%">
                {{ $pecas->links() }}
            </td>
        </tr>
        @endif
    </tfoot>
</table>