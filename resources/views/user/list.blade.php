
@section('css-view')
<div class="container">
    <table id="tabela-user">
        <thead>
        <tr>
            <td>Nome</td>
            <td>CPF</td>
            <td>email</td>
            <td>Telefone</td>
            <td>status</td>
            <td>Permição</td>
            <td>Nascimento</td>
            <td>menu</td>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->cpf}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->status}}</td>
                <td>{{$user->permission}}</td>
                <td>{{$user->birth}}</td>
                <td>
                    {{form::open (['route' =>['user.delete',$user->id],'method'=>'delete'])}}
                    {{form::submit('remover')}}
                    {{form::close()}}
                </td>
            </tr>
        @endforeach
        </tbody>
        </tbody>
    </table>
</div>
