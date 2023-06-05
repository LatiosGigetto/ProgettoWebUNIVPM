@extends('layouts.header-footer')

@section("title")
Lista Aziende
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row">
            @foreach($aziende as $azienda)
                <div class="col-md-6 mb-4">
                    <div class="card h-100 pt-4">
                        <img src="data:image/png/jpeg;base64,{{ base64_encode($azienda->Logo)}}" class="card-img custom_card" alt="Icona dell'azienda">
                        <div class="card-body">
                            <h2 class="card-title">{{ $azienda->NomeAzienda }}</h2>
                            <p class="card-text">{{ $azienda->Descrizione }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div>
            @include("paginator.paginator", ['paginator' => $aziende])
        </div>
    </div>
@endsection

