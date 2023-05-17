<!doctype html>

@extends('header-footer')

<html lang="it">
<head>
    @section("title")
        Registrazione
    @endsection
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tabelle.css">

</head>

<body>
@section('content')

    <div class="container" style="justify-content: start">
      <h1>Eliminazione Utente</h1>
      <table>
          <thead>
            <th>Nome Utente</th>
            <th>Eliminazione Utente</th>
           </thead>
          <tbody>
            <tr>
                <td>Utente 1</td>
                <td>
                    <button name="eliminautente1" id="eliminautente1">Elimina Utente</button>
                </td>
            </tr>
            <tr>
                <td>Utente 2</td>
                <td>
                    <button name="eliminautente2" id="eliminautente2">Elimina Utente</button>
                </td>

            </tr>
          </tbody>

      </table>
    </div>
</body>
@endsection
</html>
