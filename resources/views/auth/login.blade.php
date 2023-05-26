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
    <!--TODO: i messaggi d'errore sono temporanei-->
    <div
        style="text-align: center; border: 4px solid blue; margin-top: 5%; margin-left: 25%; margin-right: 25%; margin-bottom: 5%">
        <p>Inserisci le tue credenziali d'accesso</p>

        {{ Form::open(array('route' => 'login'))}}
        <div>
            <div style="margin: 2%">
                {{ Form::label('username', 'Nome Utente') }}
                {{ Form::text('username', '') }}
                <br>
                @error('username')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>

            <div style="margin: 2%">
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password') }}
                <br>
                @error('password')
                <span style="color: red">{{ $message }}</span>
                @enderror
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
