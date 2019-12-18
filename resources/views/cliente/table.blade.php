<table class="table text-center">
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Documento</th>
            <th scope="col">E-mail</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clientes as $cliente)
            <tr>
                <td>{{$cliente->nome}}</td>
                <td>{{$cliente->documento}}</td>
                <td>{{$cliente->email}}</td>
                <td class="d-flex justify-content-around align-items-center">
                    
                    @if($cliente->trashed())
                        <form  class="" action="{{url('/clientes/'.$cliente->id)}}" method="post">
                            @csrf
                            @method('delete')
                                <button class="btn btn-secondary px-2" type="submit">ativar</button>
                        </form>
                    @else
                        <a href="{{url('/clientes/'.$cliente->id)}}" class="btn btn-info px-2" >Ver Mais</a>
                        <a href="{{url('/clientes/'.$cliente->id.'/edit')}}" class="btn btn-warning px-2">Lápis</a>
                        <form  class="" action="{{url('/clientes/'.$cliente->id)}}" method="post">
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

                    Página {{$clientes->currentPage()}} de {{$clientes->lastPage()}} páginas

                </p>
            </td>
        </tr>
        @if($clientes->lastPage() > 1)
        <tr>
            <td colspan="100%">
                {{ $clientes->links() }}
            </td>
        </tr>
        @endif
    </tfoot>
</table>