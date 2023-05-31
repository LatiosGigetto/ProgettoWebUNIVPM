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
    <!--TODO: la larghezza della form è ancora da fissare (è da decidere in base alla grandezza del font)-->
    <div class="container align-items-center d-flex h-100">
        <div class="container text-center" style="border: 4px solid blue; width: 500px;">
            <p>Inserisci le tue credenziali d'accesso</p>

            {{ Form::open(array('route' => 'login'))}}
            <div class="container" style="width: 400px;">
                <div class="row align-items-center">
                    <div class="col-4" style="text-align: left;">
                        {{ Form::label('username', 'Nome Utente') }}
                    </div>
                    <div class="col-8">
                        {{ Form::text('username', '') }}
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        @error('username')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-4" style="text-align: left;">
                        {{ Form::label('password', 'Password') }}
                    </div>
                    <div class="col-8">
                        {{ Form::password('password') }}
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        @error('password')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
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
