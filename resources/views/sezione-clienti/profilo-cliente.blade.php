@extends('layouts.header-footer')

@section('title')
    Ciao, Cliente!
@endsection

@section('content')
<div class="container text-center">
        <h2 class="mb-4">Area riservata Utente (cliente)</h2>
        <a href="{{route('cambia-password')}}" class="btn btn-primary">Cambia password</a>
        <br>
        <a href="{{route('riepilogo')}}" class="btn btn-primary">Coupon generati</a>
        <br>
        <a href="{{route('modifica-info')}}" class="btn btn-primary">Modifica informazioni personali</a>

        <h3 class="mt-4">Dettagli utente</h3>
        <ul class="list-group mt-2">
            <li class="list-group-item"><strong>Nome:</strong> {{ $user->Nome }}</li>
            <li class="list-group-item"><strong>Cognome:</strong> {{ $user->Cognome }}</li>
            <li class="list-group-item"><strong>Email:</strong> {{ $user->Mail }}</li>
            <li class="list-group-item"><strong>Nome utente:</strong> {{ $user->username }}</li>
            <li class="list-group-item"><strong>Età:</strong> {{ $user->Età }}</li>
            <li class="list-group-item"><strong>Telefono:</strong> {{ $user->Telefono }}</li>
            <li class="list-group-item"><strong>Genere:</strong> {{ $user->Genere }}</li>
        </ul>
</div>
@endsection
