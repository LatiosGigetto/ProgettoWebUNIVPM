<!doctype html>

@extends('header-footer')

<html lang="it">
    <head>
    @section("title")
        Registrazione
    @endsection
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    @section('content')
        <!--TODO passare lo style inline in un .css-->
        <!--<div style="text-align: center; border: 4px solid blue; margin-top: 5%; margin-left: 25%; margin-right: 25%; margin-bottom: 5%">
            <p>Inserisci i dati per la registrazione</p>

            <div>
                <label>Nome utente</label>

                <form name="username" style="margin: 2%">
                    <input required>
                </form>

                <label>Password</label>

                <form name="password" style="margin: 2%">
                    <input required>
                </form>

                <label>Nome</label>

                <form name="nome" style="margin: 2%">
                    <input required>
                </form>

                <label>Cognome</label>

                <form name="cognome" style="margin: 2%">
                    <input required>
                </form>

                <label>Genere</label>

                <select name="genere" style="margin: auto; margin-top: 2%; margin-bottom: 2%; display: block">
                    <option value="M">Maschio</option>
                    <option value="F">Femmina</option>
                </select>

                <label>Età</label>

                <form name="eta" style="margin: 2%">
                    <input type="number" min="1">
                </form>

                <label>Indirizzo email</label>

                <form name="email" style="margin: 2%">
                    <input type="email">
                </form>

                <div>

                </div>
            </div>
        </div>
        -->

        <div style="text-align: center; border: 4px solid blue; margin-top: 5%; margin-left: 25%; margin-right: 25%; margin-bottom: 5%">
            <p>Inserisci i dati per la registrazione</p>
            <div>
                {{ Form::open(array('route' => 'registrazione'))}}
                <div style="margin: 2%">
                    {{ Form::label('nome', 'Nome') }}
                    {{ Form::text('nome', '')}}
                </div>

                <div  style="margin: 2%">
                    {{ Form::label('cognome', 'Cognome') }}
                    {{ Form::text('cognome', '') }}
                </div>

                <div  style="margin: 2%">
                    {{ Form::label('email', 'Email') }}
                    {{ Form::text('email', '') }}
                </div>

                <div  style="margin: 2%">
                    {{ Form::label('username', 'Nome Utente') }}
                    {{ Form::text('username', '') }}
                </div>

                <div  style="margin: 2%">
                    {{ Form::label('password', 'Password') }}
                    {{ Form::password('password') }}
                </div>

                <div  style="margin: 2%">
                    {{ Form::label('età', 'Età') }}
                    {{ Form::text('età','') }}
                </div>

                <div  style="margin: 2%">
                    {{ Form::label('telefono', 'Telefono') }}
                    {{ Form::text('telefono','') }}
                </div>

                <div  style="margin: 2%">
                    {{ Form::label('genere', 'Genere') }}
                    {{ Form::select('genere',['Maschio'=>'Maschio', 'Femmina'=>'Femmina']) }}
                </div>

                <div style="margin: 2%">
                    {{ Form::submit('Registra') }}
                </div>

                {{ Form::close() }}
            </div>
        </div>

    </body>

    @endsection

</html>
