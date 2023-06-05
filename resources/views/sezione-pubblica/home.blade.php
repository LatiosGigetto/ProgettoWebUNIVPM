@extends('layouts.contenitore')

@section('title')
    Home
@endsection

@section('link-scripts')
    @parent
    {{--TODO: questo tag andrebbe cancellato(???)
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">--}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset("js/carosello.js")}}"></script>
@endsection

@section('carosello')
    <!--Abbiamo fatto il carosello con l'aiuto di Bootstrap-->
    <div id="carouselWithCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/longe.png" class="image_carousel" alt="Doggo">
                <div>
                    <h5>Benvenuto!</h5>
                    <p>Scorri per vedere le aziende di cui offriamo sconti...</p>
                </div>
            </div>

            @foreach($aziende as $azienda)
            <div class="carousel-item">
                <img src="data:image/png/jpeg;base64,{{ base64_encode($azienda->Logo)}}" class="image_carousel" alt="Logo azienda {!! $azienda->NomeAzienda !!}">
                <div>
                    <h5>{{ $azienda->NomeAzienda }}</h5>
                    <p>{{ $azienda->Descrizione }}.</p>
                </div>
            </div>
            @endforeach
        </div>

        <a class="carousel-control-prev" href="#carouselWithCaptions" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>

        <a class="carousel-control-next" href="#carouselWithCaptions" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>
@endsection

@section('contenuto')
    <div style="margin: auto;">
        <h2>Benvenuti su Doggo Discount!</h2>
        <p>Doggo Discount è il sito che fa per voi quando cercate qualsiasi tipo di coupon sconto per le vostre catene preferite nella regione Marche!</p>
        <h3>Come funziona Doggo Discount?</h3>
        <p>Registrati utilizzando l'apposita sezione del sito, sfoglia il catalogo, scegli l'offerta che più t'interessa e ottieni il tuo coupon!</p>
        <h3>Come uso i coupon?</h3>
        <p>Le modalità di utilizzo variano da offerta a offerta. Consulta la descrizione dell'offerta per più dettagli. Ricordati che puoi sempre stampare
            il coupon con tutti i dettagli necessari dalla tua Area Privata del profilo utente!</p>
        <a href="{{ asset('files/tesina.pdf') }}" download>Scarica documentazione</a>
    </div>
@endsection
