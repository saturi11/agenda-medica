@extends('templates.master')
@extends('templates.master')
@section('css-view')

@endsection

@section('conteudo-view')
    @if(session('success'))
        <h3> {{session('success')['message']}}</h3>
    @endif
    {{Form::open(['route'=>'user.store','method' =>'post','id'=>'form-padrao']) }}

        @include('templates.formularios.input', ['input'=>'cpf', 'attributes'=>'cpf'])
        @include('templates.formularios.input', ['input'=>'name', 'attributes'=>'name'])
        @include('templates.formularios.input', ['input'=>'phone', 'attributes'=>'phone'])
        @include('templates.formularios.input', ['input'=>'email', 'attributes'=>'email'])
        @include('templates.formularios.password', ['input'=>'password', 'attributes'=>'password'])
        @include('templates.formularios.submit', ['input'=>'Cadastrar'])
    {{ Form::close()}}
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
            @foreach($users as $users)
                <tr>
                    <td>{{$users->name}}</td>
                    <td>{{$users->cpf}}</td>
                    <td>{{$users->email}}</td>
                    <td>{{$users->phone}}</td>
                    <td>{{$users->status}}</td>
                    <td>{{$users->permission}}</td>
                    <td>{{$users->birth}}</td>
                    <td>
                        {{form::open (['route' =>['user.delete',$users->id],'method'=>'delete'])}}
                        {{form::submit('remover')}}
                        {{form::close()}}
                    </td>
                    <td>
                        {{form::open (['route' =>['user.edit',$users->id],'method'=>'put'])}}
                        {{form::submit('editar')}}
                        {{form::close()}}
                    </td>
                </tr>
            @endforeach
        </tbody>


    </table>


@endsection

@section('js-view')
@endsection
