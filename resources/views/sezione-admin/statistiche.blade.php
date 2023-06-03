@extends('layouts.header-footer')

@section("title")
    Statistiche
@endsection

@section("link-scripts")

    <link rel="stylesheet" href="{{asset("css/tabelle.css")}}">
    <script src="{{asset("js/statistiche.js")}}"></script>

@endsection

@section("content")

    <div class="container text-center ">
        <h1 class="mb-4">Statistiche</h1>

        <h2>Numero totale coupon emessi</h2>
        <button class="mb-4" id="num-coupon">Vedi coupon totali</button>
        <strong id="coupon-tot"></strong>

        <h3>Coupon emessi per offerta</h3>

        <div class="container mb-4" style="margin-left: 0; padding-left: 0">
            {{ Form::open(['route' => 'stats-offerta', 'id' => 'coupon-off-form']) }}
            <div class="col">
                {{Form::label('offerta', "Scegli l'offerta") }}
                {{Form::select('sceltaOfferta', $offerte->pluck('Oggetto', 'Id_Offerta')) }}

                {{Form::submit('Vedi numero coupon')}}
                <strong id="coupon-off" style="display: none"></strong>
            </div>
            {{Form::close()}}
        </div>

        <h3>Coupon emessi per utente</h3>
        <div class="container mb-5" style="margin-left: 0; padding-left: 0">
            {{ Form::open(['route' => 'stats-utente', 'id' => 'coupon-user-form']) }}
            <div class="col">
                {{Form::label('utente', "Scegli l'utente") }}
                {{Form::select('sceltaUser', $utenti->pluck('username', 'username')) }}

                {{Form::submit('Vedi numero coupon')}}
                <strong id="coupon-user" style="display: none"></strong>
            </div>
            {{Form::close()}}
        </div>
    </div>
@endsection

