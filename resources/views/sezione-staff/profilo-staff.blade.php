@extends('layouts.header-footer')

@section('title')
    Ciao, Staff!
@endsection

@section('content')
    <div class="container text-center py-4">
        <h2 class="mb-4">Area riservata Utente (staff)</h2>
        <div class="d-flex justify-content-center">
            <a href="{{route('cambia-password')}}" class="btn btn-primary mx-4">Cambia password</a>
            <a href="{{route('modifica-info')}}" class="btn btn-primary mx-4">Modifica informazioni personali</a>
            <a href="{{route("gestione-promozioni")}}" class="btn btn-primary mx-4">Gestione promozioni</a>
        </div>

        <h3 class="mt-4">Dettagli staff</h3>

        <ul class="list-group mt-2">
            <li class="list-group-item"><strong>Nome:</strong> {{ $currentStaff->Nome }}</li>
            <li class="list-group-item"><strong>Cognome:</strong> {{ $currentStaff->Cognome }}</li>
            <li class="list-group-item"><strong>Email:</strong> {{ $currentStaff->Mail }}</li>
            <li class="list-group-item"><strong>Nome utente:</strong> {{ $currentStaff->username }}</li>
            <li class="list-group-item"><strong>Età:</strong> {{ $currentStaff->Età }}</li>
            <li class="list-group-item"><strong>Telefono:</strong> {{ $currentStaff->Telefono }}</li>
            <li class="list-group-item "><strong>Genere:</strong> {{ $currentStaff->Genere }}</li>
        </ul>
    </div>
@endsection
