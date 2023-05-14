<!DOCTYPE html>
<html lang="it">

<head>

    @extends('header-footer')

    <meta charset="UTF-8">
    @section("title")
        Statistiche
    @endsection
    <link rel="stylesheet" href="css/style.css">

    <style>


        .numerocoupon{
            margin-top: 80px;
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





            </div>

            <h1>Statistiche</h1>



        <div>
            <div class="numerocoupon" name="numerocoupon" id="numerocoupon">
                Numero totale coupo emessi:
            </div>
        </div>
        </div>
    </div>
    </body>

@endsection

</html>

