@section('css-view')
    <div class="container">
        <table id="tabela-user">
            <thead>
            <tr>
                <td>Nome</td>
                <td>CPF</td>
                <td>email</td>
                <td>Telefone</td>
                <td>Nascimento</td>
                <td>menu</td>
            </tr>
            </thead>
            <tbody>
            @foreach($pacientes as $paciente)
                <tr>
                    <td>{{$paciente->name}}</td>
                    <td>{{$paciente->cpf}}</td>
                    <td>{{$paciente->email}}</td>
                    <td>{{$paciente->phone}}</td>
                    <td>{{$paciente->birth}}</td>
                    <td>
                        {{form::open (['route' =>['paciente.delete',$paciente->id],'method'=>'delete'])}}
                        {{form::submit('remover')}}
                        {{form::close()}}
                    </td>
                </tr>
            @endforeach
            </tbody>


        </table>
        </div>
