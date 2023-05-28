@extends('layouts.contenitore')

@section('title')
    Contatti
@endsection

@section('contenuto')
    <div class="d-flex justify-content-center align-items-center flex-column">
    <h1 id="titolo_sezione">Contatti</h1>
    <h3>Informazioni utili per contattare l'amministratore</h3>
    <address id="contatti">
        <p>Amministratore: {{ $admin->Nome }} {{ $admin->Cognome}}</p>
        <p>Email: {{ $admin->Mail }}</p>
        <p>Telefono: {{ $admin->Telefono }}</p>
    </address>
    </div>
@endsection

