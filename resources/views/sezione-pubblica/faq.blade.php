@extends('layouts.contenitore')

@section("title")
    Le FAQ
@endsection

@section("contenuto")
    <h1>Domande frequenti</h1>

    <ul style="list-style-type: none; margin-top: 10%; text-align: left;">
        @foreach($faqs as $faq)
            <li>
                <h2>Q: {{ $faq->Domanda }}</h2>
                <p>A: {{ $faq->Risposta }}</p>
            </li>
        @endforeach
    </ul>
@endsection
