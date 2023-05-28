@extends('layouts.header-footer')


@section("title")
    Gestione Assegnamento
@endsection

@section("content")

    <div class="spazio_blocco">
        @switch($azione)

            @case('view')
                <h1>Gestione Assegnamento Azienda</h1>
                <table>
                    <thead>
                    <tr>
                        <th>Azienda</th>
                        <th>Staff</th>
                        <th>Modifica</th>
                        <th>Elimina</th>
                    </tr>
                    </thead>
                    <tbody>

                    <!--popolo la tabella-->
                    @foreach($azienda_assegnata as $assegnamento)
                        <tr>
                            {<td>{{ $assegnamento-> NomeAzienda }}</td>
                            <td>{{ $assegnamento->UsernameUtente }}</td>
                            <td>
                                <a href="{{ route('modifica-assegnamento-view', ['id' => $assegnamento->Id_Azienda])}}">
                                    <button id="mod assegnamento">Modifica</button>
                                </a>
                            </td>
                            <td>
                                {{--<a href="{{ route('elimina-assegnamento-view', ['id' => $assegnamento->Id_Azienda])}}">--}}
                                    <button id="elim prom">Elimina</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="6">
                            {{--<a href="{{ route('crea-asssegnamento-view')}}">--}}
                                <button id="mod prom">Crea Nuova Azienda</button>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
                @break

            @case('mod')
                <h1>Modifica Azienda</h1>

                <div id ="mod-azienda-sezione">
                    {{ Form::open(['route' => 'modifica-assegnamento']) }}
                    {{ Form::hidden('idAzienda', $aziendaSel->Id_Azienda) }}
                    <div style="margin: 2%">
                        {{ Form::label('nomeazienda', 'NomeAzienda') }}
                        {{ Form::text('nomeazienda', $aziendaSel->NomeAzienda) }}
                    </div>
                    <div style="margin: 2%">
                        {{ Form::label('categoria', 'Categoria') }}
                        {{ Form::text('categoria', $aziendaSel->Categoria) }}
                    </div>
                    <div style="margin: 2%">
                        {{ Form::label('logo', 'Logo') }}
                        {{ Form::file('logo') }}
                    </div>
                    <div style="margin: 2%">
                        {{ Form::label('sede', 'Sede') }}
                        {{ Form::text('sede', $aziendaSel->Sede) }}
                    </div>
                    <div style="margin: 2%">
                        {{ Form::label('descrizione', 'Descrizione') }}
                        {{ Form::text('descrizione', $aziendaSel->Descrizione) }}
                    </div>
                    {{ Form::submit('Modifica') }}
                    {{ Form::close() }}
                </div>
                @break
            @case('create')

                <h1>Crea Azienda</h1>
                <div id ="crea-azienda-sezione">
                    {{ Form::open(['route' => 'crea-assegnamento']) }}
                    <div style="margin: 2%">
                        {{ Form::label('nomeazienda', 'NomeAzienda') }}
                        {{ Form::text('nomeazienda', '') }}
                    </div>
                    <div style="margin: 2%">
                        {{ Form::label('categoria', 'Categoria') }}
                        {{ Form::text('categoria', '') }}
                    </div>
                    <div style="margin: 2%">
                        {{ Form::label('logo', 'Logo') }}
                        {{ Form::file('logo') }}
                    </div>
                    <div style="margin: 2%">
                        {{ Form::label('sede', 'Sede') }}
                        {{ Form::text('sede', '') }}
                    </div>
                    <div style="margin: 2%">
                        {{ Form::label('descrizione', 'Descrizione') }}
                        {{ Form::text('descrizione', '') }}
                    </div>
                    {{ Form::submit('Crea') }}
                    {{ Form::close() }}
                </div>
    @break
    @endswitch
@endsection
