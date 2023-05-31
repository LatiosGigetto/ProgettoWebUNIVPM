@extends('layouts.contenitore')

@section("title")
    Le FAQ
@endsection

@section("contenuto")
    <h1>Domande frequenti</h1>

    <ul class="faqList">
        @foreach($faqs as $faq)
            <li>
                <h4 onclick="toggleAnswer(this)">Q: {{ $faq->Domanda }}</h4>
                <p class="hiddenContent" style="display: none;">A:{{ $faq->Risposta }}</p>
            </li>
        @endforeach
    </ul>

    <script>
        function toggleAnswer(question) {
            var answer = question.nextElementSibling;
            if (answer.style.display === 'none') {
                answer.style.display = 'block';
            } else {
                answer.style.display = 'none';
            }
        }
    </script>
@endsection
