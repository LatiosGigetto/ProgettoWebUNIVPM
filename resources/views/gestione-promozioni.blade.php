
    @extends('header-footer')

    @section('title')
        Gestione Promozioni
    @endsection
    <link rel="stylesheet" href="{{asset("css/tabelle.css")}}">
    
    
    <!-- <style>
     /*   .image_logo{
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


*/


    </style> -->

@section('content')


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
                <th>Eliminaa</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Promozione 1</td>
                <td>Azienda 1</td>
                <td>02-02-2024</td>
                <td>Fano</td>
                <td>
                    <button name="mod prom1" id="mod prom1">Modifica</button>
                </td>
                <td>
                    <button name="el prom1" id="el prom1">Elimina</button>
                </td>
            </tr>
            <tr>
                <td>Promozione 2</td>
                <td>Azienda 2</td>
                <td>04-04-2024</td>
                <td>Ancona</td>
                <td>
                    <button name="mod prom2" id="mod prom2">Modifica</button>
                </td>
                <td>
                    <button name="el prom2" id="el prom2">Elimina</button>
                </td>
            </tr>
            <tr>
                <td colspan="6" >
                    <button style="margin-left: 600px" >Clicca per aggiungere una promozione</button>
                </td>

            </tr>

            </tbody>
        </table>

    </div>
</div>

@endsection

