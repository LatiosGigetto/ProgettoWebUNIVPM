
@extends('header-footer')

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
                <img src="images/xampp_logo.png" alt="questo è letteralmente il logo di Xampp" style="max-width: 100%">
            </div>
            <div class="col">
                <p>{{ $azienda->Descrizione }}</p>
            </div>
        </div>
    </div>
    @endforeach

    <div class="container" style="margin-left: 0; min-width: 100%; border: 1px solid">
        <div class="row">
            <div class="col col-2">

            </div>
            <div class="col">
                <h3>Azienda 3</h3>
            </div>
        </div>
        <div class="row">
            <div class="col col-2">
                <img src="images/xampp_logo.png" alt="questo è letteralmente il logo di Xampp" style="max-width: 100%">
            </div>
            <div class="col">
                <p>Dati azienda</p>
            </div>
        </div>
    </div>
@endsection
