<!doctype html>

@extends('header-footer')

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
        <div style="text-align: center; border: 4px solid blue; margin-top: 5%; margin-left: 25%; margin-right: 25%; margin-bottom: 5%">
            <p>Inserisci le tue credenziali d'accesso</p>

            <div>
                <label>Nome utente:</label>

                <form name="username" style="margin: 2%">
                    <input>
                </form>

                <label>Password:</label>

                <form name="password" style="margin: 2%">
                    <input>
                </form>

                <button id="loginbutton" style="margin: 2%">
                    Accedi
                </button>


            </div>

        </div>
    @endsection

    </body>
</html>
