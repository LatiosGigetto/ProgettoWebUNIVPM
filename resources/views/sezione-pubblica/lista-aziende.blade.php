@extends('layouts.header-footer')

@section("title")
    Lista aziende
@endsection


@section('content')

    @foreach($aziende as $azienda)
        <div class="container" style="margin-left: 0; min-width: 100%; border: 1px solid">
            <div class="row">
                <div class="col col-2">

                </div>
                <div class="col">
                    <h3>{{ $azienda->NomeAzienda }}</h3>
                </div>
            </div>
            <div class="row">
                <div class="col col-2">
                    <img src="data:image/png/jpeg;base64,{{ base64_encode($azienda->Logo)}}" alt="Icona dell'azienda"
                         style="max-width: 100%">
                </div>
                <div class="col">
                    <p>{{ $azienda->Descrizione }}</p>
                </div>
            </div>
        </div>
    @endforeach
    
@endsection
