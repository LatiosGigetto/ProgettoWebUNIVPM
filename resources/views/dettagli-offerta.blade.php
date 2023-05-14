<!DOCTYPE html>
<html lang="it">

    @extends('header-footer')

<head>
    <meta charset="UTF-8">
    @section('title')
        Dettagli offerta
    @endsection
    <link rel="stylesheet" href="css/style.css">
    <style>
        logosito {
            width: 150px;
            height: 150px;

        }
        .row {
            display: flex;
            justify-content: center;
        }

        .center {
            text-align: center;
            font-size: 20px;
        }

        .testoconlink  {
            margin-top: 40px;
        }

        .testosenzalink {
            margin-top: 40px;
        }
        .bottoni {
            margin-top: 40px;
        }






    </style>
</head>

@section('content')
<body>

<div style="display: flex">
    <div class="spazio_barra_laterale">
        *spazio per la barra laterale*
    </div>




    <div class="spazio_blocco">
        <!-- i seguenti due div servono per allineare i contenuti al centro esclusivamente in orizzontale -->
        <div class="row">
            <div class="center">
               <img id = logosito src="images/logosito.png" alt="Descrizione dell'immagine">

               <div class="testoconlink">
                   <a href="linkdaseguire">Nome azienda</a>
               </div>
               <div class="testosenzalink">
                   <strong>Descrizione offerta</strong>
               </div>
               <div class="bottoni">
                   <button name="generaofferta" id="generaofferta">
                       genera
                   </button>
                   <button name="indietro" id="indietro">
                       torna indietr
                   </button>
               </div>
            </div>
        </div>

    </div>







</div>
</body>

@endsection
</html>
