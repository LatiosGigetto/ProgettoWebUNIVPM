@extends('layouts.contenitore')

@section('title')
    Contatti
@endsection

@section('contenuto')
    <h2 id="titolo_contatti">Contatti</h2>
    <h3>Informazioni utili per contattare l'amministratore</h3>
    <address id="contatti">
        <p>Amministratore: {{ $admin->Nome }} {{ $admin->Cognome}}</p>
        <p>Email: {{ $admin->Mail }}</p>
        <p>Telefono: {{ $admin->Telefono }}</p>
    </address>
@endsection

