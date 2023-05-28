@extends('layouts.header-footer')


@section("title")
    Gestione aziende
@endsection

@section("content")

    <div class="spazio_blocco">
        @switch($azione)

            @case('view')
                <h1>Gestione Aziende</h1>
                <table>
                    <thead>
                    <tr>
                        <th>Nome Azienda</th>
                        <th>R.S.</th>
                        <th>Logo</th>
                        <th>Sede</th>
                        <th>Descrizione</th>
                        <th>Modifica</th>
                        <th>Elimina</th>
                    </tr>
                    </thead>
                    <tbody>

                    <!--popolo la tabella-->
                    @foreach($aziende as $azienda)
                        <tr>
                            <td>{{ $azienda-> NomeAzienda }}</td>
                            <td>{{ $azienda->Categoria }}</td>
                            <td>{{ $azienda-> Logo }}</td>
                            <td>{{ $azienda->Sede }}</td>
                            <td>{{ $azienda->Descrizione }}</td>
                            <td>
                                <a href="{{ route('modifica-azienda-view', ['id' => $azienda->Id_Azienda])}}">
                                    <button id="mod prom">Modifica</button>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('elimina-azienda-view', ['id' => $azienda->Id_Azienda])}}">
                                    <button id="elim prom">Elimina</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="6">
                            <a href="{{ route('crea-azienda-view')}}">
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
                    {{ Form::open(['route' => 'modifica-azienda']) }}
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
                    {{ Form::open(['route' => 'crea-azienda']) }}
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
