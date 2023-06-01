@extends('layouts.contenitore')

@section('title')
    Dettagli offerta
@endsection

    @section("link-scripts")
    
    <script src="{{asset("js/generazione-coupon.js")}}"></script>
    
    @endsection
    
@section("contenuto")
    <div class="d-flex  align-items-center flex-column">
        <h2>Dettagli</h2>
        <img id="logosito" class="custom_card" src="data:image/png/jpeg;base64,{{ base64_encode($offerta->getLogoAzienda())}}" alt="Logo azienda offerta">
        <br>
        <strong>Nome Azienda</strong>

        <p>{{ $offerta->getNomeAzienda() }}</p>

        <br>
        <strong>Oggetto offerta</strong>

        <p>{{ $offerta->Oggetto }}</p>

        <br>
        <strong>Descrizione offerta</strong>

        <p>{{ $offerta->Descrizione }}</p>

        <br>

        <strong>Luogo di fruizione</strong>

        <p>{{ $offerta->Luogo }}</p>

        <div>        
                <button name="{{$offerta->Id_Offerta}}" id="generacoupon">
                    Genera Coupon
                </button>
            @include('layouts/tornaindietro')
        </div>
     
        <span id="risultato", style="color: red; display: none"></span>
        
        <a href="" id="link-stampa" style="display: none" class="btn btn-primary ">Vai alla stampa</a>
        

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
    </div>
