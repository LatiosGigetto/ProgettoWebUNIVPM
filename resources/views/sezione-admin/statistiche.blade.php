@extends('layouts.header-footer')

@section("title")
    Statistiche
@endsection

<link rel="stylesheet" href="{{asset("css/tabelle.css")}}">

@section("content")

    <h1>Statistiche</h1>
    <h3>Numero totale coupon emessi:</h3>
    <h5>Lista coupon</h5>
    <div class="container" style="margin-left: 0; padding-left: 0">
        <div class="row">
            <div class="col col-2">
                <p>Promozione 1</p>
            </div>
            <div class="col">
                <button name="vediprom1" id="vediprom1">vedi numero coupon</button>
            </div>
        </div>
        <div class="row">
            <div class="col col-2">
                <p>Promozione 2</p>
            </div>
            <div class="col">
                <button name="vediprom2" id="vediprom2">vedi numero coupon</button>
            </div>
        </div>
        <div class="row">
            <div class="col col-2">
                <p>Promozione 3</p>
            </div>
            <div class="col">
                <button name="vediprom3" id="vediprom3">vedi numero coupon</button>
            </div>
        </div>
    </div>
    <h5>Lista clienti</h5>
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

