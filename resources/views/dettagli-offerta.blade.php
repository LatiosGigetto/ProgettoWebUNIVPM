<!DOCTYPE html>
<html lang="it">

    @extends('contenitore')

<head>
    @section('title')
        dettagli offerta
    @endsection
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
    @section("contenuto")
        <div>
                <img id = "logosito" src="images/logosito.png" alt="Descrizione dell'immagine">
                <div>
                    <a href="linkdaseguire">Nome azienda</a>

                </div>
                <br>
                <div>
                <strong>Descrizione offerta</strong>
                    <br>
                </div>
                <br>
                <div>
                <button name="generaofferta" id="generaofferta" >
                    genera
                </button>
                <button name="indietro" id="indietro">
                    torna indietro
                </button>
                </div>
        </div>
    @endsection
</html>
