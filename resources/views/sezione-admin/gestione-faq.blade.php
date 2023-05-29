@extends('layouts.header-footer')

@section('title')
    FAQ
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
                                <a href="{{ route('elimina-faq-view', ['id' => $Faq->Id_Domanda])}}">
                                    <button id="elim faq">Elimina</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <td colspan="6">
                    <a href="{{ route('crea-faq-view')}}">
                        <button id="crea faq">Crea Nuova Domanda</button>
                    </a>
                </td>
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
                    <div style="margin: 2%">
                        {{ Form::label('risposta', 'Risposta') }}
                        {{ Form::textarea('risposta', $faqSel->Risposta) }}
                    </div>
                    {{ Form::submit('Modifica') }}
                    {{ Form::close() }}
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
                    <div style="margin: 2%">
                        {{ Form::label('risposta', 'Risposta') }}
                        {{ Form::textarea('risposta', '') }}
                    </div>
                    {{ Form::submit('Modifica') }}
                    {{ Form::close() }}
                 @break
    @endswitch
@endsection

