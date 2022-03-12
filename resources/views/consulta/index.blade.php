@extends('templates.master')
@section('conteudo-view')
    @if(session('success'))
        <h3> {{session('success')['message']}}</h3>
    @endif
    {{Form::open(['route'=>'consulta.store','method' =>'post','id'=>'form-padrao']) }}

    @include('templates.formularios.select', ['select'=>'paciente','data' =>$paciente_list ,'attributes'=>'id_paciente'])
    @include('templates.formularios.select', ['select'=>'medico',  'data' =>$user_list ,'attributes'=>'id_medico'])
    @include('templates.formularios.date', ['input'=>'data', 'attributes'=>'date'])

    @include('templates.formularios.submit', ['input'=>'Cadastrar'])
    {{ Form::close()}}
    <table id="tabela-user">
        <thead>
        <tr>
            <td>paciente</td>
            <td>medico</td>
            <td>data</td>
            <td>menu</td>
        </tr>
        </thead>
        <tbody>
        @foreach($consultas as $consulta)
            <tr>
                <td>{{$consulta->id_paciente}}</td>
                <td>{{$consulta->id_medico}}</td>
                <td>{{$consulta->date}}</td>
                <td>
                    {{form::open (['route' =>['consuslta.delete',$consulta->id],'method'=>'delete'])}}
                    {{form::submit('remover')}}
                    {{form::close()}}
                </td>
            </tr>
        @endforeach
        </tbody>


    </table>
@endsection
