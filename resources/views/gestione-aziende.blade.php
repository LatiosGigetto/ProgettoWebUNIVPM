<!DOCTYPE html>
<html lang="it">

<head>

    @extends('header-footer')

    <meta charset="UTF-8">
    @section("title")
    Gestione aziende
    @endsection
    <link rel="stylesheet" href="css/style.css">

    <style>

        .imgage_logo{
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

@section("content")

<body>

    <div class="spazio_header">
        <h1>*spazio per l'header*</h1>
    </div>

    <div style="display: flex">
        <div class="spazio_barra_laterale">
            *spazio per la barra laterale*
        </div>

        <div class="spazio_blocco">

            <h1>gestione aziende</h1>

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
                        <button>Clicca qui</button>
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

    </div>

</body>

@endsection

</html>