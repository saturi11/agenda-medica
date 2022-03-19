@section('css-view')
<div class="container">
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
    </div>
