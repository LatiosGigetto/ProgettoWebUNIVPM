@extends('layouts.contenitore')

@section("title")
    Coupon
@endsection

@section('contenuto')

    <!--TODO: come in dettagli offerta-->
    <h2>Acquisto Verificato</h2>
    <p>Il codice del tuo coupon è:
        <br>
        XXX_XXX_XXX
    </p>
    <img class=logosito src="images/logosito.png" alt="Descrizione dell'immagine">
    <a href="linkdaseguire">Coupon generato</a>
    <br>
    <strong>Descrizione offerta</strong>
    <br>
    <div>
        <button name="genera" id="genera">
            continua ad acquistare
        </button>
        <button name="indietro" id="indietro">
            riepilogo acquisti
        </button>
    </div>

@endsection
