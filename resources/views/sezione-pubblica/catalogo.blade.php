@extends('layouts.header-footer')

@section("title")
Catalogo

@endsection
<link rel="stylesheet" href="{{asset("css/style.css")}}">


@section("content")

<div style='display: flex; justify-content: space-evenly'>
    <div>
        <button type="submit" id="mostrabarradiricerca">Vai alla barra di ricerca</button>
    </div>

        {{ Form::open(['route' => 'ricerca-offerte', 'method' => 'GET'])}}
    <nav id="barradiricerca" style="text-align: left; display: flex; flex-direction: column; display: none;" >
            {{ Form::label('azienda', 'Cerca per azienda') }}
            {{ Form::text('azienda', old('azienda') )}}

            {{ Form::label('descrizione', 'Cerca per contenuto') }}
            {{ Form::text('descrizione', old('descrizione') )  }}

            {{ Form::submit('Cerca') }}
    </nav>
        {{ Form::close() }}

        @switch($offerte)

            @case ('inizio')

    <div style="text-align: center; width: 50%">

        <h1> Sfoglia le offerte per azienda</h1>

                    @foreach($aziende as $azienda)

        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="data:image/png/jpeg;base64,{{ base64_encode($azienda->Logo)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <strong class='card-title'> {{$azienda->NomeAzienda}}</strong>
                    <a href="{{ route('ricerca-offerte', ['azienda' => $azienda->NomeAzienda])}}"
                       class="btn btn-primary">Vai alle offerte</a>
                </div>
            </div>
        </div>
                    @endforeach
                    @break
    </div>

            @case (false)

    <div style="text-align: center; width: 50%">

        <h1> Nessuna offerta corrisponde ai parametri di ricerca.</h1>
                    @break
    </div>

            @default
    <div class="container mt-1" style="justify-content: start">
        <h1 class="text-center">Catalogo Offerte</h1>

        <div class="container text-center">
            <div class="row">

                            @foreach($offerte as $offerta)
                

                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="data:image/png/jpeg;base64,{{ base64_encode($offerta->getLogoAzienda())}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class='card-title'> {{$offerta->getNomeAzienda()}}</h4>
                            <h5 class="card-title">{{$offerta->Luogo}}</h5>
                            <p class="card-text">{{$offerta->Descrizione}}</p>
                            <a href="{{ route('dettagli-offerta', ['id' => $offerta-> Id_Offerta])}}"
                               class="btn btn-primary">Vai all'aquisto</a>
                        </div>
                    </div>
                </div>
                                
                            @endforeach

                            @include('paginator.paginator', ['paginator' => $offerte])
            </div>
        </div>
    </div>

        @endswitch

</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var barradiricerca = document.getElementById("barradiricerca");
        var bottone = document.getElementById("mostrabarradiricerca");
        bottone.addEventListener("click", function() {
            if (barradiricerca.style.display === "none") {
                barradiricerca.style.display = "flex";
            } else {
                barradiricerca.style.display = "none";
            }
        });
    });
</script>
@endsection

