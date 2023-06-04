@extends('layouts.header-footer')

@section("title")
    Catalogo
@endsection

@section("link-scripts")

<link rel="stylesheet" href="{{asset("css/style.css")}}">
<script  src="{{asset("js/catalogo.js")}}"></script>

@endsection

@section("content")
    <div class="container">
        <div class="d-flex justify-content-center mt-5">
            <button type="submit" id="mostrabarradiricerca" class="btn btn-primary">Vai alla barra di ricerca</button>
        </div>

        {{ Form::open(['route' => 'ricerca-offerte', 'method' => 'GET'])}}
        <nav id="barradiricerca" class="mt-4" style="display: none;">
            <div class="form-group mx-1">
                {{ Form::label('azienda', 'Cerca per azienda') }}
                {{ Form::text('azienda', old('azienda'), ['class' => 'form-control']) }}
            </div>

            <div class="form-group mx-1">
                {{ Form::label('descrizione', 'Cerca per contenuto') }}
                {{ Form::text('descrizione', old('descrizione'), ['class' => 'form-control']) }}
            </div>
            <div class="form-group mx-1">
                <br>
                {{ Form::submit('Cerca', ['class' => 'btn btn-primary']) }}
            </div>

        </nav>
        {{ Form::close() }}

        @switch($offerte)
            @case ('inizio')
                <div class="text-center mt-5">
                    <h1>Sfoglia le offerte per azienda</h1>
                </div>
                <div class="row justify-content-center mt-4">
                    @foreach($aziende as $azienda)

                            <div class="col-md-4 mb-4">
                                <div class="card pt-3">
                                    <img src="data:image/png/jpeg;base64,{{ base64_encode($azienda->Logo)}}" class="card-img-top custom_card" alt="Logo Azienda">
                                    <div class="card-body">
                                        <strong class="card-title">{{$azienda->NomeAzienda}}</strong>
                                        <div class="d-flex justify-content-between align-items-end">
                                            <a href="{{ route('ricerca-offerte', ['azienda' => $azienda->NomeAzienda])}}" class="btn btn-primary">Vai alle offerte</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                    @endforeach
                </div>
                @break

            @case (false)
                <div class="text-center mt-5">
                    <h1>Nessuna offerta corrisponde ai parametri di ricerca.</h1>
                </div>
                @break

            @default
                <div class="container mt-4">
                    <h1 class="text-center">Catalogo Offerte</h1>
                    <div class="row justify-content-center mt-4">
                        @foreach($offerte as $offerta)
                            <div class="col-md-4 mb-4">
                                <div class="card pt-4" style="height: 100%">
                                    <img src="data:image/png/jpeg;base64,{{ base64_encode($offerta->getLogoAzienda())}}" class="card-img-top custom_card" alt="Logo Azienda">
                                    <div class="card-body">
                                        <h4 class="card-title">{{$offerta->getNomeAzienda()}}</h4>
                                        <h5 class="card-title">{{$offerta->Luogo}}</h5>
                                        <p class="card-text">{{$offerta->Oggetto}}</p>
                                        <a href="{{ route('dettagli-offerta', ['id' => $offerta->Id_Offerta])}}" class="btn btn-primary">Vai all'acquisto</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @include('paginator.paginator', ['paginator' => $offerte->withQueryString()])
                </div>
        @endswitch
    </div>
@endsection



