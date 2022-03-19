@extends('templates.master')
@section('conteudo-view')
    @if(session('success'))
        <h3> {{session('success')['message']}}</h3>
    @endif
    {{Form::open(['route'=>'consulta.store','method' =>'post','id'=>'form-padrao']) }}

    @include('templates.formularios.select', ['select'=>'paciente','data' =>$paciente_list ,'attributes'=>'id_paciente'])
    @include('templates.formularios.select', ['select'=>'medico',  'data' =>$user_list ,'attributes'=>'id_medico'])
    @include('templates.formularios.date', ['input'=>'data', 'attributes'=>'date','required'])

    @include('templates.formularios.submit', ['input'=>'Cadastrar'])
    {{ Form::close()}}
    @extends('consulta.list')
@endsection
