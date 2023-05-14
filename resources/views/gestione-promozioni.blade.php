<!DOCTYPE html>
<html lang="it">
<head>
@extends('header-footer')
    <meta charset="UTF-8">
    @section('Gestione Promozioni')
        Gestione Promozioni
    @endsection
    <link rel="stylesheet" href="css/style.css">
    <style>
        .image_logo{
            width: 20px;
            float: left;
            border: 1px solid red;
        }
        h1{
            text-align: center;
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

<div style="display: flex">


    <div class="spazio_blocco">
        <h1>Gestione Promozioni</h1>
        <table>
            <thead>
            <tr>
                <th>Nome promozione</th>
                <th>Azienda</th>
                <th>Scadenza</th>
                <th>Luogo</th>
                <th>Modifica</th>
                <th>Elimina</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Promozione 1</td>
                <td>Azienda 1</td>
                <td>02-02-2024</td>
                <td>Fano</td>
                <td>
                    <button>Clicca qui</button>
                </td>
                <td>
                    <button>Clicca qui</button>
                </td>
            </tr>
            <tr>
                <td>Promozione 2</td>
                <td>Azienda 2</td>
                <td>04-04-2024</td>
                <td>Ancona</td>
                <td>
                    <button>Clicca qui</button>
                </td>
                <td>
                    <button>Clicca qui</button>
                </td>
            </tr>
            <tr>
                <td colspan="6" >
                    <button style="margin-left: 530px" >Clicca per aggiungere una promozione</button>
                </td>

            </tr>

            </tbody>
        </table>
    </div>
</div>
</body>
@endsection
</html>
