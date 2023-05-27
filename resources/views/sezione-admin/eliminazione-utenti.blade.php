@extends('layouts.header-footer')

@section("title")
    Registrazione
@endsection

@section('content')

    <div class="spazio_blocco">
        <h1>Eliminazione Utenti</h1>
        <table>
            <thead>
            <tr>
                <th>Username</th>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Telefono</th>
                <th>Mail</th>
                <th>Età</th>
                <th>Genere</th>
            </tr>
            </thead>
            <tbody>
            @foreach($utenti as $utente)
                <tr>
                    <td>{{ $utente-> username }}</td>
                    <td>{{ $utente-> Nome }}</td>
                    <td>{{ $utente-> Cognome }}</td>
                    <td>{{ $utente-> Telefono }}</td>
                    <td>{{ $utente-> Mail }}</td>
                    <td>{{ $utente-> Età }}</td>
                    <td>{{ $utente-> Genere }}</td>
                    <td>
                        <button name="elim-staff" id="elim-staff">Elimina</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

