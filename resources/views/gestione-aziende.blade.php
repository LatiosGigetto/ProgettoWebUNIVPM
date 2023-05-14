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



    <div style="display: flex">
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
                        <button name="modificaazienda1" id="modificaazienda1">Modifica</button>
                    </td>
                    <td>
                        <button  name="eliminaaazienda1" id="eliminaazienda1">Elimina</button>
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
                        <button name="modificaazienda2" id="modificaazienda2">Modifica</button>
                    </td>
                    <td>
                        <button name="eliminaazienda2" id="eliminaazienda2">Elimina</button>
                    </td>
                </tr>
                <td colspan="8" >
                    <button name="aggiungiazienda"  id=aggiungiazienda style="margin-left: 250px" >Clicca per aggiungere un azienda</button>
                </td>

                </tbody>

            </table>

        </div>

    </div>

</body>

@endsection

</html>
