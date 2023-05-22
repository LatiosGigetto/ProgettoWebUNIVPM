    @extends('contenitore')


    @section('title')
        Dettagli offerta
    @endsection

    @section("contenuto")
                <!--TODO padding-->
                <!--TODO: sarebbe carino dargli la stessa grafica delle cards del catologo-->
                <h2>Dettagli</h2>
                <img id = "logosito" src="{{asset("images/logosito.png")}}" alt="Descrizione dell'immagine">
                
                <a href="linkdaseguire">Nome azienda</a>
                <br>

                <strong>Descrizione offerta</strong>
                
                <p> {{ $offerta->Descrizione}} </p>
                
                <br>
                
                <strong>Luogo di fruizione</strong>
                
                <p> {{ $offerta->Luogo}}</p>
                
                <div>
                <button name="generaofferta" id="generaofferta" >
                    genera
                </button>
                <button name="indietro" id="indietro">
                    torna indietro
                </button>
                </div>


    @endsection 

<!-- TODO FUNZIONE JAVASCRIPT DA CORREEGGERE PER METTERE VALORI DEL DATABASE
                <script>
                    // Recupera il valore dell'ID dal parametro dell'URL
                    var urlParams = new URLSearchParams(window.location.search);
                    var id = urlParams.get('id');
                    if(id){
                        document.write("Offerta3")
                    }

                </script> -->