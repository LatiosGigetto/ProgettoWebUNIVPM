@extends('layouts.header-footer')

@section('title')
    Ciao, Capo!
@endsection

@section('content')
    <div class="profilo">
        <h2>Area riservata Amministratore ({{Auth::user()->username}})</h2>
        <a href="{{route('gestione-aziende')}}">Gestione aziende</a>
        <br>
        <a href="">{{route('gestione-membristaff')}}</a>
        <br>
        <a href="">{{route('gestione-faq')}}</a>
        <br>
        <a href="">{{route('statistiche')}}</a>
        <br>
        <a href="">{{route('eliminazione-utenti')}}</a>
    </div>

@endsection

