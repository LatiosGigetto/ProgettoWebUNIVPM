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
                <th>Descrizione</th>
                <th>Modifica</th>
                <th>Elimina</th>
            </tr>
            </thead>

            <tbody>
            @foreach($aziende as $azienda)
                <tr>
                    <td>{{ $azienda-> NomeAzienda }}</td>
                    <td>{{ $azienda->Categoria }}</td>
                    <td>{{ $azienda-> Logo }}</td>
                    <td>{{ $azienda->Sede }}</td>
                    <td>{{ $azienda->Descrizione }}</td>
                    <td>
                        <button name="mod-azienda" onclick="route('modifiche-azienda')">Modifica</button>
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
@endsection
