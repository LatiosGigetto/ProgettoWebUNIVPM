<!doctype html>

@extends('header-footer')

<html lang="it">
<head>
    @section("title")
        cambio password
    @endsection
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<!--TODO togliere style inline-->
<body>
@section('content')
    <div style="text-align: center; border: 4px solid blue; margin-top: 5%; margin-left: 25%; margin-right: 25%; margin-bottom: 5%">

        <p>Cambio Password</p>

        <div>
            <label>Vecchia Password</label>

            <form name="vecchia_password" style="margin: 2%">
                <input type="password" required>
            </form>

            <label>Nuova Password</label>

            <form name="nuova_password" style="margin: 2%">
                <input type="password" required>
            </form>

            <button id="modifiedbutton" style="margin: 2%">
                Modifica
            </button>
        </div>

    </div>
</body>

@endsection

</html>
