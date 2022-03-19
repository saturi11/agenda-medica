<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>LOGIN AGENDA</title>
        <link rel="stylesheet" href="{{ asset('css/stylesheet.css')}}" >
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
    </head>
    <body>
        <section id="conteudo-view" class="login">
            <h1>Agenda Médica</h1>

            {!! Form::open(['route' => 'user.login', 'method' =>'post',])  !!}
                <p>Acesse o Sistema</p>

                    <lable>
                        {!! Form::text('username',null,['class'=> 'input', 'placeholder' => "Usuário"]) !!}
                    </lable>

                    <lable>
                    {!! Form::password('password',['class'=> 'input', 'placeholder' => "Senha"]) !!}
                    </lable>

                    {!! Form::submit('Entrar')  !!}
            {!! Form::close()  !!}
        </section>

    </body>
</html>

