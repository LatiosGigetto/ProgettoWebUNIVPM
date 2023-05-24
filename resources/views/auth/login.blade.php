<!doctype html>

@extends('layouts.header-footer')

<html lang="it">
<head>
    @section("title")
        Login
    @endsection
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
@section('content')
    <!--TODO togliere lo stile inline-->
    <div
        style="text-align: center; border: 4px solid blue; margin-top: 5%; margin-left: 25%; margin-right: 25%; margin-bottom: 5%">
        <p>Inserisci le tue credenziali d'accesso</p>

        {{ Form::open(array('route' => 'login'))}}
        <div>
            <div style="margin: 2%">
                {{ Form::label('username', 'Nome Utente') }}
                {{ Form::text('username', '') }}
            </div>

            <div style="margin: 2%">
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password') }}
            </div>

            <div style="margin: 2%">
                {{ Form::submit('Accedi') }}
            </div>

            {{ Form::close() }}
        </div>

    </div>
@endsection

</body>
</html>
