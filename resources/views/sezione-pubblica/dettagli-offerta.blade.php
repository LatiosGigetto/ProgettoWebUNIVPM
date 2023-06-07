@extends('layouts.contenitore')

@section('title')
Dettagli Offerta
@endsection

@section("link-scripts")
    <script src="{{asset("js/generazione-coupon.js")}}"></script>
    <script src="{{asset('js/stampa.js')}}"></script>
@endsection

@section("contenuto")
    <div class="d-flex align-items-center flex-column">
        <h2>Dettagli</h2>
        <img id="logosito" class="custom_card"
             src="data:image/png/jpeg;base64,{{ base64_encode($offerta->getLogoAzienda())}}" alt="Logo azienda offerta">
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

        <!--Attenzione: abbiamo definito due volte lo stesso bottone perché attiva una funzione JavaScript,
            normalmente basterebbe una volta sola perché il middleware gestisce in automatico gli indirizzamenti
            in base alla sessione-->
        <div>
            @auth
            <button class="btn btn-primary mb-4 " name="{{$offerta->Id_Offerta}}" id="generacoupon">
                Genera Coupon
            </button>
            @endauth
            @guest
            <a href="{{route("login")}}">
            <button class="btn btn-primary mb-4 " name="{{$offerta->Id_Offerta}}">
                Genera Coupon
            </button>
            </a>
            @endguest
            @include('layouts/tornaindietro')
        </div>

        <span id="risultato" style="color: red; display: none"></span>

        <button id="link-stampa" onclick="stampaPaginaCatalogo(this.name)" style="display: none"
                class="btn btn-primary ">Vai alla stampa
        </button>
    </div>
@endsection
