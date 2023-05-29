@extends('layouts.contenitore')

@section("title")
    Le FAQ
@endsection

@section("contenuto")

    <h1>Domande frequenti</h1>

    @foreach($faqs as $faq)

    <h4>Q: {{ $faq->Domanda }}</h4>
    <p id="risposta">A:{{ $faq->Risposta }}</p>

    @endforeach

@endsection
