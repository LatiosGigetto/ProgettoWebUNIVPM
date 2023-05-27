@extends('layouts.header-footer')

@section("title")
    Gestione aziende
@endsection
<link rel="stylesheet" href="{{asset("css/tabelle.css")}}">

@section("content")

    <div class="spazio_blocco">
        @switch($azione)

            @case('view')
        <h1>Gestione membri dello staff</h1>
        <table>
            <thead>
            <tr>
                <th>Staff</th>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Telefono</th>
                <th>Mail</th>
                <th>Età</th>
                <th>Genere</th>
            </tr>
            </thead>
            <tbody>
            @foreach($staff as $membro_staff)
                <tr>
                    <td>{{ $membro_staff-> username }}</td>
                    <td>{{ $membro_staff-> Nome }}</td>
                    <td>{{ $membro_staff-> Cognome }}</td>
                    <td>{{ $membro_staff-> Telefono }}</td>
                    <td>{{ $membro_staff-> Mail }}</td>
                    <td>{{ $membro_staff-> Età }}</td>
                    <td>{{ $membro_staff-> Genere }}</td>
                    <td>
                        <button name="mod-staff" id="mod-staff">Modifica</button>
                    </td>
                    <td>
                        <button name="elim-staff" id="elim-staff">Elimina</button>
                    </td>
                </tr>
            @endforeach
            <td colspan="4">
                <button name="aggiungimembrostaff" id=aggiungimembrostaff style="margin-left: 600px">Clicca per
                    aggiungere un membro dello staff
                </button>
            </td>
            </tbody>
        </table>
        @endswitch
    </div>

@endsection
