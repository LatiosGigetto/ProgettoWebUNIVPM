@extends('layouts.header-footer')


@section("title")
Gestione aziende
@endsection

@section("link-scripts")

<link rel="stylesheet" href="{{asset("css/tabelle.css")}}">
<script src="{{asset("js/gestione-aziende.js")}}"></script>

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
                <th>Tipologia</th>
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
                            <td><img src="data:image/png/jpeg;base64,{{ base64_encode($azienda->Logo)}}", style="width: 100px; height: 100px" }}></td>
                            <td>{{ $azienda->Sede }}</td>
                            <td>{{ $azienda->Descrizione }}</td>
                            <td>
                                <a href="{{ route('modifica-azienda-view', ['id' => $azienda->Id_Azienda])}}">
                                    <button id="mod-az">Modifica</button>
                                </a>
                            </td>
                            <td>
                                    <button class="elim-az" name="{{$azienda->Id_Azienda}}">Elimina</button>
                            </td>
                        </tr>
                    @endforeach
        </tbody>
    </table>
            <td colspan="4">
                <a href="{{ route('crea-azienda-view')}}">
                    <button id="mod-az">Crea Nuova Azienda</button>
                </a>
            </td>

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

    <div id ="mod-azienda-sezione">
                    {{ Form::open(['route' => 'modifica-azienda', 'files' => 'true']) }}
                    {{ Form::hidden('idAzienda', $aziendaSel->Id_Azienda) }}
        <div style="margin: 2%">
                        {{ Form::label('nomeazienda', 'NomeAzienda') }}
                        {{ Form::text('nomeazienda', $aziendaSel->NomeAzienda) }}
            <br>
                @error('nomeAzienda')
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
                        {{ Form::text('descrizione', $aziendaSel->Descrizione) }}
            <br>
                @error('descrizioneAzienda')
            <span style="color: red">{{ $message }}</span>
                @enderror
        </div>
                    {{ Form::submit('Modifica') }}
                    {{ Form::close() }}
        @include('layouts/tornaindietro')
    </div>
                @break
            @case('create')

    <h1>Crea Azienda</h1>
    <div id ="crea-azienda-sezione">
                    {{ Form::open(['route' => 'crea-azienda', 'files' => 'true']) }}
        <div style="margin: 2%">
                        {{ Form::label('nomeazienda', 'NomeAzienda') }}
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
                        {{ Form::text('descrizione', '') }}
            <br>
                @error('descrizione')
            <span style="color: red">{{ $message }}</span>
                @enderror
        </div>
                    {{ Form::submit('Crea') }}
                    {{ Form::close() }}
        @include('layouts/tornaindietro')
                @break
      @endswitch
@endsection
