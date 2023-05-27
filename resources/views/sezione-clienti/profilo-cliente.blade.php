@extends('layouts.header-footer')

@section('title')
    Ciao, Cliente!
@endsection

@section('content')
    <div class="profilo">
        <h2>Area riservata Utente (cliente)</h2>
        <a href="{{route('cambia-password')}}">Cambia password</a>
        <br>
        <a href="{{route('riepilogo')}}">Coupon generati</a>
        <br>
        <a href="{{route('modifica-info')}}">Modifica informazioni personali</a>

        <h3>Dettagli utente</h3>
        <ul>
            <li><strong>Nome:</strong> {{ $user->Nome }}</li>
            <li><strong>Cognome:</strong> {{ $user->Cognome }}</li>
            <li><strong>Email:</strong> {{ $user->Mail }}</li>
            <li><strong>Nome utente:</strong> {{ $user->username }}</li>
            <li><strong>Età:</strong> {{ $user->Età }}</li>
            <li><strong>Telefono:</strong> {{ $user->Telefono }}</li>
            <li><strong>Genere:</strong> {{ $user->Genere }}</li>
        </ul>


    </div>

@endsection
