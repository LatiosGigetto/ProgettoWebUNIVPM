@extends('layouts.header-footer')

@section("title")
    Statistiche
@endsection

@section("link-scripts")
    <script src="{{asset("js/statistiche.js")}}"></script>
@endsection

@section("content")
    <div class="container text-center h-100 w-50 py-4">
        <h1 class="mb-3">Statistiche</h1>

        <div class="row">
            <h2>Numero totale coupon emessi</h2>

            <div class="text-center">
                <button class=" btn btn-primary" id="num-coupon">Vedi coupon totali</button>
                <br>
                <strong id="coupon-tot"></strong>
            </div>
        </div>

        <div class="row px-5 mt-4">
            <h3>Coupon emessi per offerta</h3>

            {{ Form::open(['route' => 'stats-offerta', 'id' => 'coupon-off-form']) }}

                {{Form::label('offerta', "Scegli l'offerta") }}
                {{Form::select('sceltaOfferta', $offerte->pluck('Oggetto', 'Id_Offerta'), '', ['class' => 'form-select']) }}
                {{Form::submit('Vedi numero coupon', ['class' => 'btn btn-primary mt-1'])}}
                <strong id="coupon-off" style="display: none"></strong>

            {{Form::close()}}
        </div>

        <div class="row px-5 mt-4">
            <h3>Coupon emessi per utente</h3>

            {{ Form::open(['route' => 'stats-utente', 'id' => 'coupon-user-form']) }}

                {{Form::label('utente', "Scegli l'utente") }}
                {{Form::select('sceltaUser', $utenti->pluck('username', 'username'), '', ['class' => 'form-select']) }}
                {{Form::submit('Vedi numero coupon', ['class' =>'btn btn-primary mt-1'])}}
                <strong id="coupon-user" style="display: none"></strong>

            {{Form::close()}}
        </div>
    </div>
@endsection

