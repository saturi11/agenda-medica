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


    </table>


@endsection

@section('js-view')
@endsection
