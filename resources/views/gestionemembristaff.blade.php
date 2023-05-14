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
        <div class="spazio_barra_laterale">
            *spazio per la barra laterale*
        </div>

        <div class="spazio_blocco">

            <table>
                <thead>
                <tr>
                    <th>Membro dello Staff</th>
                    <th>Azienda</th>
                    <th>Rimuovi Azienda</th>
                    <th>Elimina membro dello Staff</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td rowspan="3"> Membro dello staff 1</td>
                    <td>Azienda 1</td>
                    <td>
                        <button name="rimuovi azuno da mem1" id="rimuovi azuno da mem1">elimina azienda assocciata</button>
                    </td>
                    <td rowspan="3">
                        <button name="rimuovi membro dello staff 1" id="rimuovi membro dello staff 1">elimina membro dello staff</button>
                    </td>
                </tr>
                <tr>
                    <td> Azienda 2</td>
                    <td>
                        <button name="rimuovi azdue da mem1" id="rimuovi azdue da mem1">elimina azienda assocciata</button>
                    </td>
                </tr>
                <tr>
                    <td>Azienda 3</td>
                    <td>
                        <button name="rimuovi aztre da mem1" id="rimuovi aztre da mem1">elimina azienda assocciata</button>
                    </td>

                </tr>
                <tr>
                    <td rowspan="2">membro dello staff 2</td>
                    <td>Azienda 4</td>
                    <td>
                        <button name="rimuovi azquat da mem2" id="rimuovi azquat da mem2">elimina azienda assocciata</button>
                    </td>
                    <td rowspan="2">
                        <button name="rimuovi membro dello staff 2" id="rimuovi membro dello staff 2">elimina membro dello staff</button>
                    </td>
                </tr>
                <tr>
                    <td>Azienda 5.</td>
                    <td>
                        <button name="rimuovi azcin da mem2" id="rimuovi azcin da mem2">elimina azienda assocciata</button>
                    </td>
                </tr>
                <td colspan="4" >
                    <button name="aggiungimembrostaff"  id=aggiungimembrostaff style="margin-left: 250px" >Clicca per aggiungere un membro dello staff</button>
                </td>

                </tbody>
            </table>








        </div>

    </div>

    </body>

@endsection

</html>
