@extends('layouts.header-footer')

@section("title")
    Statistiche
@endsection

@section("link-scripts")

<link rel="stylesheet" href="{{asset("css/tabelle.css")}}">
<script src="{{asset("js/statistiche.js")}}"></script>

@endsection

@section("content")

    <h1>Statistiche</h1>
    <h2>Numero totale coupon emessi:</h2> <span id="totCoupon"></span>
    <h3>Coupon emessi per offerta</h3>
    <div class="container" style="margin-left: 0; padding-left: 0">
        {{ Form::open(['route' => 'stats-coupon']) }}
            <div class="col">
                {{Form::label('offerta', "Scegli l'offerta") }}
                {{Form::select('sceltaOfferta', $offerte->pluck('Oggetto', 'IdOfferta') }}
                
                {{Form::submit('Vedi numero coupon')}}
                <strong style="display: none"></strong>
            </div>
        
        </div>
        
    </div>  
    <h3>Lista clienti</h3>
    <div class="container" style="margin-left: 0; padding-left: 0">
        <div class="row">
            <div class="col col-2">
                Cliente 1
            </div>
            <div class="col">
                <button name="vedicli1" id="vedicli1">vedi numero coupon</button>
            </div>
        </div>
        <div class="row">
            <div class="col col-2">
                Cliente 2
            </div>
            <div class="col">
                <button name="vedicli2" id="vedicli2">vedi numero coupon</button>
            </div>
        </div>
        <div class="row">
            <div class="col col-2">
                Cliente 3
            </div>
            <div class="col">
                <button name="vedicli3" id="vedicli3">vedi numero coupon</button>
            </div>
        </div>
    </div>

@endsection

