   @extends('header-footer')

    @section("title")
        Home
    @endsection
   

@section('content')
    <div id="riquadro1">
        <h2 id="contenuto_introduttivo">*contenuto introduttivo*</h2>
        <img src="images/logosito.png" alt="questo è il logo del nostro sito" class="image_logo_2">
    </div>

    <div id="titolo">
        <strong>testo introduttivo del nostro sito</strong>
    </div>

    <div id="riquadro2">
        <h3 id="testo">Offerte del giorno</h3>
        <img src="images/logosito.png" alt="queste sono le offerte del giorno" class="image_logo_2">
    </div>

@endsection

