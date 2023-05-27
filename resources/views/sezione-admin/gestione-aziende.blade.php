@extends('layouts.header-footer')


@section("title")
    Gestione aziende
@endsection

@section("content")

    <div class="spazio_blocco">
        <h1>Gestione Aziende</h1>
        <table>
            <thead>
            <tr>
                <th>Nome Azienda</th>
                <th>R.S.</th>
                <th>Logo</th>
                <th>Sede</th>
                <th>Tipo</th>
                <th>Descrizione</th>
                <th>Modifica</th>
                <th>Elimina</th>
            </tr>
            </thead>

            <tbody>
            @foreach($aziende as $azienda)
                <tr>
                    <td>Nome Azienda: {{ $azienda-> NomeAzienda }}</td>
                    <td>Logo: {{ $azienda-> Logo }}</td>
                    <td>Sede: {{ $azienda->Sede }}</td>
                    <td>Descrizione: {{ $azienda->Descrizione }}</td>
                    <td>Categoria: {{ $azienda->Categoria }}</td>
                    <td>
                        <button name="mod-azienda" id="mod-azienda">Modifica</button>
                    </td>
                    <td>
                        <button name="elim-azienda" id="elim-azienda">Elimina</button>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="6">
                    <button style="margin-left: 600px">Clicca per aggiungere una promozione</button>
                </td>
            </tr>
            </tbody>
        </table>

{{--        <div id ="mod-azienda-sezione">--}}
{{--            {{ Form::open('route' => 'modifica-azienda') }}--}}
{{--            <div style="margin: 2%">--}}
{{--                {{ Form::label('nomeazienda', 'Nome Azienda') }}--}}
{{--                {{ Form::text('nomeazienda', '') }}--}}
{{--            </div>--}}
{{--            <div style="margin: 2%">--}}
{{--                {{ Form::label('logo', 'Logo') }}--}}
{{--                {{ Form::file('logo', '') }} //TODO verificare il metodo della facade per le immagini--}}
{{--            </div>--}}
{{--            <div style="margin: 2%">--}}
{{--                {{ Form::label('sede', 'Sede') }}--}}
{{--                {{ Form::select('sede','') }}--}}
{{--            </div>--}}
{{--            <div style="margin: 2%">--}}
{{--                {{ Form::label('descrizione', 'Descrizione') }}--}}
{{--                {{ Form::text('descrizione', '') }}--}}
{{--            </div>--}}
{{--            <div style="margin: 2%">--}}
{{--                {{ Form::label('categoria', 'Categoria') }}--}}
{{--                {{ Form::text('categoria', '') }}--}}
{{--            </div>--}}
{{--        </div>--}}

    </div>
@endsection
