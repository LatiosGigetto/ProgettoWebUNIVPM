<!doctype html>

@extends('header-footer')

<html lang="it">
<head>
    @section("title")
        Registrazione
    @endsection
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- TODO sistemare gli stili-->
    <style>
        .imgage_logo{
            width: 20px;
            float: left;
            border: 1px solid red;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

    </style>
</head>

<body>
@section('content')
    <div style="display: flex; margin: auto; width: 80%">
        <table>

            <thead>
            <tr>
                <th>Nome Azienda</th>
                <th>R.S.</th>
                <th>Logo</th>
                <th>Sede</th>
                <th>Tipo</th>
                <th>Descrizione</th>
                <th>Modifica</th>
                <th>Elimina</th>
            </tr>
            </thead>

            <tbody>

            <tr>
                <td>Azienda 1</td>
                <td>A1</td>
                <td>
                    <img src ="images/xampp_logo.png" alt="logo azienda" class="imgage_logo">
                </td>
                <td>Fano</td>
                <td>Utensili da cucina</td>
                <td>l'azienda si occupa di...</td>
                <td>
                    <button>Clicca qui</button>
                </td>
                <td>
                    <button>Clicca</button>
                </td>
            </tr>

            <tr>
                <td>Azienda1</td>
                <td>A2</td>
                <td>
                    <img src ="images/xampp_logo.png" alt="logo azienda" class="imgage_logo">
                </td>
                <td>Ascoli Piceno</td>
                <td>Utensili da bagno</td>
                <td>L'azienda fa</td>
                <td>
                    <button>Clicca qui</button>
                </td>
                <td>
                    <button>Clicca qui</button>
                </td>
            </tr>

            </tbody>

        </table>
    </div>

</body>
@endsection
</html>
