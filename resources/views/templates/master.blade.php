<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>AGENDA MEDICA</title>
        @yield('css-view')
        <link rel="stylesheet" href="{{ asset('css/stylesheet.css')}}" >


    </head>
    <body>

        <section id="view-conteudo">
            @include('templates.menu-lateral')

            @yield('conteudo-view')
        </section>

        @yield('js-view')

    </body>
</html>
