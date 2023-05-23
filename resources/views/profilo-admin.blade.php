
@extends('header-footer')

    @section('title')
        Ciao, Capo!
    @endsection

@section('content')
<div class="profilo">
    <h2>Area riservata Amministratore ({{Auth::user()->username}})</h2>
    <a href="">Gestione aziende</a>
    <br>
    <a href="">Cancellazione utenti</a>
    <br>
    <a href="">Gestione staff</a>
    <br>
    <a href="">Genera statistiche</a>
    <br>
    <a href="">Aggiornamento FAQ</a>
</div>

@endsection

