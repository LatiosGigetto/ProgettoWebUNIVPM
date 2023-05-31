@extends('layouts.header-footer')

@section("title")
Elimina sti Utenti
@endsection

    @section("link-scripts")

<link rel="stylesheet" href="{{asset("css/tabelle.css")}}">
<script src="{{asset("js/gestione-utenti.js")}}"></script>

@endsection

@section('content')

    <div class="container text-center mt-4">
        <h1>Eliminazione Utenti</h1>
        <table class="table table-bordered mt-4">
            <thead class="thead-dark">
            <tr>
                <th>Username</th>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Telefono</th>
                <th>Mail</th>
                <th>Età</th>
                <th>Genere</th>
                <th>Elimina</th>
            </tr>
            </thead>
            <tbody>
            @foreach($utenti as $utente)
                <tr>
                    <td>{{ $utente->username }}</td>
                    <td>{{ $utente->Nome }}</td>
                    <td>{{ $utente->Cognome }}</td>
                    <td>{{ $utente->Telefono }}</td>
                    <td>{{ $utente->Mail }}</td>
                    <td>{{ $utente->Età }}</td>
                    <td>{{ $utente->Genere }}</td>
                    <td>
                        <button class="btn btn-danger elim-utente" name="{{ $utente->username }}">Elimina</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection

