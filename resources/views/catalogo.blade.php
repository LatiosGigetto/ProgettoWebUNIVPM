<!DOCTYPE html>

<html lang="it">
@extends('header-footer')
<head>

    <meta charset="UTF-8">
    @section("title")
        Catlogo
    @endsection
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
@section("content")
    <div style="display: flex">

        <div class="spazio_barra_laterale">
            *spazio per la barra laterale*
        </div>

        <div class="spazio_blocco">
            <!-- Questo è il blocco di una singola offerta -->
            <div class="blocco_offerta">

                <img src="images/xampp_logo.png" alt="questo è letteralmente il logo di Xampp" class="image_logo">
                <div class="spazio_contenuto">
                    <h3 class="nome_azienda">Azienda 1</h3>
                    <p class="descrizione_offerta">Testo dell'offerta 1</p>
                </div>

            </div>
            <!-- Fine del blocco -->

            <!-- Questo è il blocco di una singola offerta -->
            <div class="blocco_offerta">

                <img src="images/xampp_logo.png" alt="questo è letteralmente il logo di Xampp" id="image_logo">
                <div class="spazio_contenuto">
                    <h3 class="nome_azienda">Azienda 2</h3>
                    <p class="descrizione_offerta">
                        Testo dell'offerta 2
                    </p>
                </div>

            </div>
            <!-- Fine del blocco -->

            <!-- Questo è il blocco di una singola offerta -->
            <div class="blocco_offerta">

                <img src="images/xampp_logo.png" alt="questo è letteralmente il logo di Xampp" id="image_logo">
                <div class="spazio_contenuto">
                    <h3 class="nome_azienda">Azienda 3</h3>
                    <p class="descrizione_offerta">
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
