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
                                <a href="{{ route('modifica-staff-view', ['username' => $membro_staff->username])}}">
                                    <button id="mod staff">Modifica</button>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('elimina-staff-view', ['username' => $membro_staff->username])}}">
                                    <button id="elim staff">Elimina</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <td colspan="4">
                    <a href="{{ route('crea-staff-view')}}">
                        <button id="crea staff">Crea nuovo membro staff</button>
                    </a>
                </td>
                @break
            @case('mod')
                <h1>Modifica membro Staff</h1>

                <div id="mod-staff-sezione">
                    {{ Form::open(['route' => 'modifica-staff-conf']) }}
                    {{ Form::hidden('username', $staffSel->username) }}
                    <div style="margin: 2%">
                        {{ Form::label('nome', 'Nome') }}
                        {{ Form::text('nome', $staffSel->Nome) }}
                    </div>
                    <div style="margin: 2%">
                        {{ Form::label('cognome', 'Cognome') }}
                        {{ Form::text('cognome', $staffSel->Cognome) }}
                    </div>
                    <div style="margin: 2%">
                        {{ Form::label('età', 'Età') }}
                        {{ Form::text('età', $staffSel->Età) }}
                    </div>
                    <div style="margin: 2%">
                        {{ Form::label('telefono', 'Telefono') }}
                        {{ Form::text('telefono', $staffSel->Telefono) }}
                    </div>
                    <div style="margin: 2%">
                        {{ Form::label('mail', 'Mail') }}
                        {{ Form::text('mail', $staffSel->Mail) }}
                    </div>
                    <div style="margin: 2%">
                        {{ Form::label('genere', 'Genere') }}
                        {{ Form::select('genere',['maschio' => 'Maschio', 'femmina' => 'Femmina'], $staffSel ->Genere) }}
                    </div>
                    {{ Form::submit('Modifica') }}
                    {{ Form::close() }}
                </div>
                @break
            @case('create')

                <div id="crea-staff-sezione">
                    {{ Form::open(['route' => 'crea-staff-conf']) }}
                    <div style="margin: 2%">
                    {{ Form::label('username', 'Username') }}
                    {{ Form::text('username', '') }}
                    </div>
                    <div style="margin: 2%">
                        {{ Form::label('password', 'Password') }}
                        {{ Form::password('password') }}
                    </div>
                    <div style="margin: 2%">
                        {{ Form::label('nome', 'Nome') }}
                        {{ Form::text('nome', '') }}
                    </div>
                    <div style="margin: 2%">
                        {{ Form::label('cognome', 'Cognome') }}
                        {{ Form::text('cognome', '') }}
                    </div>
                    <div style="margin: 2%">
                        {{ Form::label('età', 'Età') }}
                        {{ Form::text('età', '') }}
                    </div>
                    <div style="margin: 2%">
                        {{ Form::label('telefono', 'Telefono') }}
                        {{ Form::text('telefono', '') }}
                    </div>
                    <div style="margin: 2%">
                        {{ Form::label('mail', 'Mail') }}
                        {{ Form::text('mail', '') }}
                    </div>
                    <div style="margin: 2%">
                        {{ Form::label('genere', 'Genere') }}
                        {{ Form::select('genere',['maschio' => 'Maschio', 'femmina' => 'Femmina'], '') }}
                    </div>
                    {{ Form::submit('Crea') }}
                    {{ Form::close() }}
                </div>
                @break
        @endswitch
    </div>

@endsection
