@extends('layouts.header-footer')

@section("title")
    Lista aziende
@endsection

@section('content')

    <div class="container mt-5">
        <div class="row">
            @foreach($aziende as $azienda)
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src="data:image/png/jpeg;base64,{{ base64_encode($azienda->Logo)}}" class="card-img-top" alt="Icona dell'azienda">
                        <div class="card-body">
                            <h3 class="card-title">{{ $azienda->NomeAzienda }}</h3>
                            <p class="card-text">{{ $azienda->Descrizione }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection

