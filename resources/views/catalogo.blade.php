
@extends('header-footer')

    @section("title")
Catalogo
    @endsection
<link rel="stylesheet" href="css/style.css">

@section("content")

<div style='display: flex'>

{{ Form::open(['route' => 'ricerca-offerte', 'method' => 'POST'])}}
<nav style="text-align: left; display: flex; flex-direction: column">
    {{ Form::label('azienda', 'Cerca per azienda') }}
    {{ Form::text('azienda', '')  }}

    {{ Form::label('descrizione', 'Cerca per contenuto') }}
    {{ Form::text('descrizione', '')  }}

    {{ Form::submit('Cerca') }}
</nav>
    {{ Form::close() }}

    @if($offerte)
<div class="container mt-1" style="justify-content: start">
    <h1 class="text-center">Catalogo Offerte</h1>

    <div class="container text-center">
        <div class="row">
                @foreach($offerte as $offerta)
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset("images/xampp_logo.png")}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class='card-title'> {{$offerta->getNomeAzienda()}}</h4>
                        <h5 class="card-title">{{$offerta->Luogo}}</h5>
                        <p class="card-text">{{$offerta->Descrizione}}</p>
                        <a href="{{ route('dettagli-offerta', ['id' => $offerta-> Id_Offerta])}}" class="btn btn-primary">Vai all'aquisto</a>
                    </div>
                </div>
            </div>
                @endforeach
        </div>
        @endif
    </div>
</div>
</div>

@endsection

