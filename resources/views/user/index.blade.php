@extends('templates.master')
@extends('templates.master')
@section('css-view')

@endsection

@section('conteudo-view')
    @if(session('success'))
        <h3> {{session('success')['message']}}</h3>
    @endif
    {{Form::open(['route'=>'user.store','method' =>'post','id'=>'form-padrao']) }}

        @include('templates.formularios.input', ['input'=>'cpf', 'attributes'=>'cpf','required'])
        @include('templates.formularios.input', ['input'=>'name', 'attributes'=>'name','required'])
        @include('templates.formularios.input', ['input'=>'phone', 'attributes'=>'phone','required'])
        @include('templates.formularios.input', ['input'=>'email', 'attributes'=>'email','required'])
        @include('templates.formularios.password', ['input'=>'password', 'attributes'=>'password','required'])
        @include('templates.formularios.submit', ['input'=>'Cadastrar'])
    {{ Form::close()}}
    @extends('user.list')
@endsection

@section('js-view')
@endsection
