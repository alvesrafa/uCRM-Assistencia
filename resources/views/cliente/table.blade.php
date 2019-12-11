<table class="table">
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
                <td>
                    <a href="{{url('/clientes/'.$cliente->id)}}" class="btn btn-info px-2" >Ver Mais</a>
                    <a href="{{url('/clientes/'.$cliente->id.'/edit')}}" class="btn btn-warning px-2">Lápis</a>
                    <form action="{{url('/clientes/'.$cliente->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger px-2" type="submit">lixo</button>
                    </form>

                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        
    </tfoot>
</table>