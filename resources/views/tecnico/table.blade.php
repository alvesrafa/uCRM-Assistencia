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
        @foreach($tecnicos as $tecnico)
            <tr>
                <td>{{$tecnico->nome}}</td>
                <td>{{$tecnico->documento}}</td>
                <td>{{$tecnico->email}}</td>
                <td class="d-flex justify-content-around align-items-center">
                @if($tecnico->trashed())
                    <form  class="" action="{{url('/tecnicos/'.$tecnico->id)}}" method="post">
                        @csrf
                        @method('delete')
                            <button class="btn btn-secondary px-2" type="submit">ativar</button>
                    </form>
                @else
                    <a href="{{url('/tecnicos/'.$tecnico->id)}}" class="btn btn-info px-2" >Ver Mais</a>
                    <a href="{{url('/tecnicos/'.$tecnico->id.'/edit')}}" class="btn btn-warning px-2">Lápis</a>
                    <form  class="" action="{{url('/tecnicos/'.$tecnico->id)}}" method="post">
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

                    Página {{$tecnicos->currentPage()}} de {{$tecnicos->lastPage()}} páginas

                </p>
            </td>
        </tr>
        @if($tecnicos->lastPage() > 1)
        <tr>
            <td colspan="100%">
                {{ $tecnicos->links() }}
            </td>
        </tr>
        @endif
    </tfoot>
</table>