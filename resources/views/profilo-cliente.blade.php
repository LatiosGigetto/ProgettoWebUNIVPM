
@extends('header-footer')

    @section('title')
        Ciao, Cliente!
    @endsection

@section('content')
    <div class="profilo">
        <h2>Area riservata Utente (cliente)</h2>
        <a href="/cambia-pass">Cambia password</a>
        <br>
        <a href="">Coupon generati</a>
        <br>
        <a href="/auth.modifica-info">Modifica informazioni personali</a>
    </div>

@endsection
