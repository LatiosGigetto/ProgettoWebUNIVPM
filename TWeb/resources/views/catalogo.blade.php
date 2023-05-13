<!DOCTYPE html>

<html lang="it">

    @extends('header-footer')
    
<head>

    <meta charset="UTF-8">
    @section("title")
        Catlogo
    @endsection
    <link rel="stylesheet" href="css/style.css">

    <style>
        img{
            height: 100%;
            float: left;
            border: 1px solid red;
        }
        h3{
            text-align: center;
            border: 1px solid blue;
            align-self: start;
            float: left;
            margin-top: 0;
            width: 100%;
            margin-bottom: 0;
        }
        p{
            border: 1px solid violet;
            align-self: start;
            width: 100%;
            margin-top:0;
            height: 100%;
            margin-bottom: 0;
        }
    </style>

</head>

<body>
@section("content")

    <div class="spazio_header">
        <h1>*spazio per l'header*</h1>
    </div>

    <div style="display: flex">

        <div class="spazio_barra_laterale">
            *spazio per la barra laterale*
        </div>

        <div class="spazio_catologo">

            <!-- Questo è il blocco di una singola offerta -->
            <div class="blocco_offerta">

                <img src="images/xampp_logo.png" alt="questo è letteralmente il logo di Xampp">
                <div class="spazio_contenuto">
                    <h3>Azienda 1</h3>
                    <p>Testo dell'offerta 1</p>
                </div>

            </div>
            <!-- Fine del blocco -->

            <!-- Questo è il blocco di una singola offerta -->
            <div class="blocco_offerta">

                <img src="images/xampp_logo.png" alt="questo è letteralmente il logo di Xampp">
                <div class="spazio_contenuto">
                    <h3>Azienda 2</h3>
                    <p>
                        Testo dell'offerta 2
                    </p>
                </div>

            </div>
            <!-- Fine del blocco -->

            <!-- Questo è il blocco di una singola offerta -->
            <div class="blocco_offerta">

                <img src="images/xampp_logo.png" alt="questo è letteralmente il logo di Xampp">
                <div class="spazio_contenuto">
                    <h3>Azienda 3</h3>
                    <p>
                        Testo dell'offerta 3
                    </p>
                </div>

            </div>
            <!-- Fine del blocco -->

        </div>

    </div>

</body>

@endsection

</html>
