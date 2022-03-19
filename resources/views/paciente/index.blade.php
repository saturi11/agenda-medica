@extends('templates.master')
@section('conteudo-view')
    {{Form::open(['route'=>'paciente.store','method' =>'post','id'=>'form-padrao']) }}

    @include('templates.formularios.input', ['input'=>'cpf', 'attributes'=>'cpf','required'])
    @include('templates.formularios.input', ['input'=>'name', 'attributes'=>'name','required'])
    @include('templates.formularios.input', ['input'=>'phone', 'attributes'=>'phone','required'])
    @include('templates.formularios.input', ['input'=>'email', 'attributes'=>'email','required'])
    @include('templates.formularios.submit', ['input'=>'Cadastrar'])
    {{ Form::close()}}
    @extends('paciente.list')
@endsection
