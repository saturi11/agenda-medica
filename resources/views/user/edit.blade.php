@extends('templates.master')
@extends('templates.master')
@section('css-view')

@endsection

@section('conteudo-view')
    @if(session('success'))
        <h3> {{session('success')['message']}}</h3>
    @endif

    {{Form::model($user, ['route'=>['user.edit',$user->id],'method' =>'put','id'=>'form-padrao']) }}

    @include('templates.formularios.input', ['input'=>'cpf', 'attributes'=>'cpf'])
    @include('templates.formularios.input', ['input'=>'name', 'attributes'=>'name'])
    @include('templates.formularios.input', ['input'=>'phone', 'attributes'=>'phone'])
    @include('templates.formularios.input', ['input'=>'email', 'attributes'=>'email'])
    @include('templates.formularios.password', ['input'=>'password', 'attributes'=>'password'])
    @include('templates.formularios.submit', ['input'=>'atualizar'])
    {{ Form::close()}}


@endsection

@section('js-view')
@endsection
