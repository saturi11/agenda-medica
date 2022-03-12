@extends('templates.master')
@section('conteudo-view')
    {{Form::open(['route'=>'paciente.store','method' =>'post','id'=>'form-padrao']) }}

    @include('templates.formularios.input', ['input'=>'cpf', 'attributes'=>'cpf'])
    @include('templates.formularios.input', ['input'=>'name', 'attributes'=>'name'])
    @include('templates.formularios.input', ['input'=>'phone', 'attributes'=>'phone'])
    @include('templates.formularios.input', ['input'=>'email', 'attributes'=>'email'])
    @include('templates.formularios.submit', ['input'=>'Cadastrar'])
    {{ Form::close()}}
    <table id="tabela-user">
        <thead>
        <tr>
            <td>Nome</td>
            <td>CPF</td>
            <td>email</td>
            <td>Telefone</td>
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

@endsection
