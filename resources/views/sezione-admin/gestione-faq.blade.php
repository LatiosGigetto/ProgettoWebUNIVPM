@extends('layouts.header-footer')

@section('title')
FAQ
@endsection

@section("link-scripts")

<link rel="stylesheet" href="{{asset("css/tabelle.css")}}">
<script src="{{asset("js/gestione-faq.js")}}"></script>

@endsection

@section('content')
<div class="spazio_blocco">
        @switch($azione)

            @case('view')
    <h1>Gestione FAQ</h1>
    <table>
        <thead>
            <tr>
                <th>Domanda</th>
                <th>Modifica</th>
                <th>Elimina</th>
            </tr>
        </thead>

        <tbody>
                    @foreach($faq as $Faq)
            <tr>
                <td>{{ $Faq-> Domanda }}</td>
                <td>
                    <a href="{{ route('modifica-faq-view', ['id' => $Faq->Id_Domanda])}}">
                        <button id="mod faq">Modifica</button>
                    </a>
                </td>
                <td>

                    <button class="el-faq" name="{{$Faq->Id_Domanda}}">Elimina</button>

                </td>
            </tr>
                    @endforeach
        </tbody>
    </table>
            <td colspan="4">
                <a href="{{ route('crea-faq-view')}}">
                    <button id="mod-az">Crea Nuova FAQ</button>
                </a>
            </td>
        @if(session('success'))
            <strong style="color: green">{{ session('success') }}</strong>
        @endif

    </div>

</div>

                @break
            @case('mod')
<h1>Modifica Faq</h1>

<div id="mod-faq-sezione">
                    {{ Form::open(['route' => 'modifica-faq-conf']) }}
                    {{ Form::hidden('id_domanda', $faqSel->Id_Domanda) }}
    <div style="margin: 2%">
                        {{ Form::label('domanda', 'Domanda') }}
                        {{ Form::text('domanda', $faqSel->Domanda) }}
    </div>
    <br>
            @error('domanda')
    <span style="color: red">{{ $message }}</span>
                @enderror
    <div style="margin: 2%">
                        {{ Form::label('risposta', 'Risposta') }}
                        {{ Form::textarea('risposta', $faqSel->Risposta) }}
    </div>
    <br>
            @error('risposta')
    <span style="color: red">{{ $message }}</span>
                @enderror
                    {{ Form::submit('Modifica') }}
                    {{ Form::close() }}
    @include('layouts/tornaindietro')
</div>
                @break
             @case('create')
<h1>Crea nuova Faq</h1>

<div id="crea-faq-sezione">
                    {{ Form::open(['route' => 'crea-faq-conf']) }}
    <div style="margin: 2%">
                        {{ Form::label('domanda', 'Domanda') }}
                        {{ Form::text('domanda', '') }}
    </div>
    <br>
            @error('domanda')
    <span style="color: red">{{ $message }}</span>
                @enderror
    <div style="margin: 2%">
                        {{ Form::label('risposta', 'Risposta') }}
                        {{ Form::textarea('risposta', '') }}
    </div>
    <br>
            @error('risposta')
    <span style="color: red">{{ $message }}</span>
                @enderror
                    {{ Form::submit('Modifica') }}
                    {{ Form::close() }}
    @include('layouts/tornaindietro')
                 @break
    @endswitch

@endsection

