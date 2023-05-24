@extends('layouts.header-footer')

@section('title')
    Ciao, Cliente!
@endsection

@section('content')
    <div class="profilo">
        <h2>Area riservata Utente (cliente)</h2>
        <a href="{{route('password')}}">Cambia password</a>
        <br>
        <a href="{{route('riepilogo')}}">Coupon generati</a>
        <br>
        <a href="{{route('modifica-info')}}">Modifica informazioni personali</a>
    </div>

@endsection
