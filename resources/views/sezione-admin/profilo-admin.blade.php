@extends('layouts.header-footer')

@section('title')
Ciao, Capo!
@endsection

@section('content')
    <div class="container text-center h-100 py-4">
        <h2>Area riservata Amministratore ({{Auth::user()->username}})</h2>

        <div class="row m-auto" style="width: 65%;">
            <div class="col-md-6 col-lg-4 ">
                <a href="{{route('gestione-aziende')}}" class="btn btn-primary mt-4">Gestione aziende</a>
            </div>
            <div class="col-md-6 col-lg-4">
                <a href="{{route('gestione-membristaff')}}" class="btn btn-primary mt-4">Gestione staff</a>
            </div>
            <div class="col-md-6 col-lg-4">
                <a href="{{route('gestione-assegnamento')}}" class="btn btn-primary mt-4">Assegna aziende</a>
            </div>
            <div class="col-md-6 col-lg-4">
                <a href="{{route('gestione-faq')}}" class="btn btn-primary mt-4">Gestione FAQ</a>
            </div>
            <div class="col-md-6 col-lg-4">
                <a href="{{route('statistiche')}}" class="btn btn-primary mt-4">Genera statistiche</a>
            </div>
            <div class="col-md-6 col-lg-4">
                <a href="{{route('elimina-utenti')}}" class="btn btn-primary mt-4">Cancellazione utenti</a>
            </div>
        </div>
    </div>
@endsection

