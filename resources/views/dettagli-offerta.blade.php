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
                <!--TODO padding-->
                <!--TODO: sarebbe carino dargli la stessa grafica delle cards del catologo-->
                <h2>Dettagli</h2>
                <img id = "logosito" src="images/logosito.png" alt="Descrizione dell'immagine">
                <!-- TODO FUNZIONE JAVASCRIPT DA CORREEGGERE PER METTERE VALORI DEL DATABASE -->
                <script>
                    // Recupera il valore dell'ID dal parametro dell'URL
                    var urlParams = new URLSearchParams(window.location.search);
                    var id = urlParams.get('id');
                    if(id){
                        document.write("Offerta3")
                    }

                </script>
                <a href="linkdaseguire">Nome azienda</a>
                <br>

                <strong>Descrizione offerta</strong>
                <br>
                <div>
                <button name="generaofferta" id="generaofferta" >
                    genera
                </button>
                <button name="indietro" id="indietro">
                    torna indietro
                </button>
                </div>


    @endsection
</html>
