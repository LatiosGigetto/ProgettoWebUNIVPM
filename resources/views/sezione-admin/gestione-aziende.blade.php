@extends('layouts.header-footer')


@section("title")
    Gestione aziende
@endsection

@section("link-scripts")

    <link rel="stylesheet" href="{{asset("css/tabelle.css")}}">
    <script src="{{asset("js/gestione-aziende.js")}}"></script>

@endsection

@section("content")

    <div>
        @switch($azione)

            @case('view')
                <div class="container">
                    <h2 class="text-center">Gestione Aziende</h2>
                    <table class="table mt-4">
                        <thead class="thead-dark">
                        <tr>
                            <th>Nome Azienda</th>
                            <th>Tipologia</th>
                            <th>Logo</th>
                            <th>Sede</th>
                            <th>Descrizione</th>
                            <th>Modifica</th>
                            <th>Elimina</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($aziende as $azienda)
                            <tr>
                                <td>{{ $azienda->NomeAzienda }}</td>
                                <td>{{ $azienda->Categoria }}</td>
                                <td><img src="data:image/png/jpeg;base64,{{ base64_encode($azienda->Logo) }}"
                                         style="width: 100px; height: 100px;"></td>
                                <td>{{ $azienda->Sede }}</td>
                                <td>{{ $azienda->Descrizione }}</td>
                                <td>
                                    <a href="{{ route('modifica-azienda-view', ['id' => $azienda->Id_Azienda]) }}">
                                        <button class="btn btn-primary">Modifica</button>
                                    </a>
                                </td>
                                <td>
                                    <button class="btn btn-danger elim-az" name="{{ $azienda->Id_Azienda }}">Elimina
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="text-center mt-4">
                        <td colspan="4">
                            <a href="{{ route('crea-azienda-view') }}">
                                <button class="btn btn-primary">Crea Nuova Azienda</button>
                            </a>
                        </td>
                    </div>
                </div>
                <div style="text-align: center">
                    @if(session('success'))
                        <strong style="color: green">{{ session('success') }}</strong>
                    @endif
                    @error('azienda-non-trovata')
                    <span style="color: red">{{ $message }}</span>
                    @enderror

                    @include('paginator.paginator', ['paginator' => $aziende])
                </div>
                @break

            @case('mod')
                <h1>Modifica Azienda</h1>

                <div id="mod-azienda-sezione">
                    {{ Form::open(['route' => 'modifica-azienda', 'files' => 'true']) }}
                    {{ Form::hidden('idAzienda', $aziendaSel->Id_Azienda) }}
                    <div style="margin: 2%">
                        {{ Form::label('nomeazienda', 'Nome') }}
                        {{ Form::text('nomeazienda', $aziendaSel->NomeAzienda) }}
                        <br>
                        @error('nomeazienda')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div style="margin: 2%">
                        {{ Form::label('categoria', 'Categoria') }}
                        {{ Form::text('categoria', $aziendaSel->Categoria) }}
                        <br>
                        @error('categoria')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div style="margin: 2%">
                        {{ Form::label('logo', 'Logo') }}
                        {{ Form::file('logo') }}
                        <br>
                        @error('logo')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div style="margin: 2%">
                        {{ Form::label('sede', 'Sede') }}
                        {{ Form::text('sede', $aziendaSel->Sede) }}
                        <br>
                        @error('sede')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div style="margin: 2%">
                        {{ Form::label('descrizione', 'Descrizione') }}
                        {{ Form::textarea('descrizione', $aziendaSel->Descrizione) }}
                        <br>
                        @error('descrizione')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    {{ Form::submit('Modifica') }}
                    {{ Form::close() }}
                    <a href="{{ route('gestione-aziende') }}" class="btn btn-primary">Torna indietro</a>
                </div>
                @break
            @case('create')

                <h1>Crea Azienda</h1>
                <div id="crea-azienda-sezione">
                    {{ Form::open(['route' => 'crea-azienda', 'files' => 'true']) }}
                    <div style="margin: 2%">
                        {{ Form::label('nomeazienda', 'Nome') }}
                        {{ Form::text('nomeazienda', '') }}
                        <br>
                        @error('nomeazienda')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div style="margin: 2%">
                        {{ Form::label('categoria', 'Categoria') }}
                        {{ Form::text('categoria', '') }}
                        <br>
                        @error('categoria')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div style="margin: 2%">
                        {{ Form::label('logo', 'Logo') }}
                        {{ Form::file('logo') }}
                        <br>
                        @error('logo')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div style="margin: 2%">
                        {{ Form::label('sede', 'Sede') }}
                        {{ Form::text('sede', '') }}
                        <br>
                        @error('sede')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div style="margin: 2%">
                        {{ Form::label('descrizione', 'Descrizione') }}
                        {{ Form::textarea('descrizione', '') }}
                        <br>
                        @error('descrizione')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    {{ Form::submit('Crea') }}
                    {{ Form::close() }}
                    <a href="{{ route('gestione-aziende') }}" class="btn btn-primary">Torna indietro</a>
    @break
    @endswitch
@endsection
