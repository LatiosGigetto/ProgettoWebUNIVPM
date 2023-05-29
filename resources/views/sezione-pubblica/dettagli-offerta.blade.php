@extends('layouts.contenitore')

@section('title')
    Dettagli offerta
@endsection

@section("contenuto")
    <div class="d-flex  align-items-center flex-column">
        <h2>Dettagli</h2>
        <img id="logosito" src="data:image/png/jpeg;base64,{{ base64_encode($offerta->getLogoAzienda())}}" alt="Logo azienda offerta">

        <br>
        <strong>Nome Azienda</strong>

        <p>{{ $offerta->getNomeAzienda() }}</p>

        <br>
        <strong>Descrizione offerta</strong>

        <p>{{ $offerta->Descrizione }}</p>

        <br>

        <strong>Luogo di fruizione</strong>

        <p>{{ $offerta->Luogo }}</p>

        <div>
            <a href="{{ route('acquisto', ['id' => $offerta->Id_Offerta]) }}">
                <button name="generaofferta" id="generaofferta">
                    genera
                </button>
            </a>

            <button name="indietro" id="indietro">
                torna indietro
            </button>
        </div>

        @if(session('success'))
            <span style="color: green">{{ session('success') }}</span>
        @endif
        @error("error")
        <span style="color: red">{{ $message }}</span>
        @enderror

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
