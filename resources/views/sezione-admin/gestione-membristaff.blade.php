@extends('layouts.header-footer')

@section("title")
    Gestione aziende
@endsection

    @section("link-scripts")


<link rel="stylesheet" href="{{asset("css/tabelle.css")}}">
<script src="{{asset("js/gestione-staff.js")}}"></script>

@endsection

@section("content")

    <div>
        @switch($azione)

            @case('view')

<div class="container text-center mt-4">
    <h1>Gestione membri dello staff</h1>
    <table class="table mx-auto mt-4">
        <thead class="thead-dark">
            <tr>
                <th>Staff</th>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Telefono</th>
                <th>Mail</th>
                <th>Età</th>
                <th>Genere</th>
                <th>Modifica</th>
                <th>Elimina</th>
            </tr>
        </thead>
        <tbody>
            @foreach($staff as $membro_staff)
                <tr>
                    <td>{{ $membro_staff->username }}</td>
                    <td>{{ $membro_staff->Nome }}</td>
                    <td>{{ $membro_staff->Cognome }}</td>
                    <td>{{ $membro_staff->Telefono }}</td>
                    <td>{{ $membro_staff->Mail }}</td>
                    <td>{{ $membro_staff->Età }}</td>
                    <td>{{ $membro_staff->Genere }}</td>
                    <td>
                        <a href="{{ route('modifica-staff-view', ['username' => $membro_staff->username])}}">
                            <button class="btn btn-primary">Modifica</button>
                        </a>
                    </td>
                    <td>
                        <button class="btn btn-danger elim-staff" name="{{ $membro_staff->username }}">Elimina</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center mt-4">
        <a href="{{ route('crea-staff-view')}}">
            <button class="btn btn-primary">Crea nuovo membro staff</button>
        </a>
    </div>
</div>


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
                    <br>
                @error('nome')
                <span style="color: red">{{ $message }}</span>
                @enderror
                    <div style="margin: 2%">
                        {{ Form::label('cognome', 'Cognome') }}
                        {{ Form::text('cognome', $staffSel->Cognome) }}
                    </div>
                <br>
                @error('cognome')
                <span style="color: red">{{ $message }}</span>
                @enderror
                    <div style="margin: 2%">
                        {{ Form::label('età', 'Età') }}
                        {{ Form::text('età', $staffSel->Età) }}
                    </div>
                <br>
                @error('età')
                <span style="color: red">{{ $message }}</span>
                @enderror
                    <div style="margin: 2%">
                        {{ Form::label('telefono', 'Telefono') }}
                        {{ Form::text('telefono', $staffSel->Telefono) }}
                    </div>
                <br>
                @error('telefono')
                <span style="color: red">{{ $message }}</span>
                @enderror
                    <div style="margin: 2%">
                        {{ Form::label('email', 'Mail') }}
                        {{ Form::text('email', $staffSel->Mail) }}
                    </div>
                <br>
                @error('email')
                <span style="color: red">{{ $message }}</span>
                @enderror
                    <div style="margin: 2%">
                        {{ Form::label('genere', 'Genere') }}
                        {{ Form::select('genere',['maschio' => 'Maschio', 'femmina' => 'Femmina'], $staffSel ->Genere) }}
                    </div>              
                    {{ Form::submit('Modifica') }}
                    {{ Form::close() }}
                    <a href="{{ route('gestione-membristaff') }}" class="btn btn-primary">Torna indietro</a>
                </div>
                @break
            @case('create')

                <div id="crea-staff-sezione">
                    {{ Form::open(['route' => 'crea-staff-conf']) }}
                    <div style="margin: 2%">
                    {{ Form::label('username', 'Username') }}
                    {{ Form::text('username', '') }}
                    </div>
                    <br>
                @error('username')
                <span style="color: red">{{ $message }}</span>
                @enderror
                    <div style="margin: 2%">
                        {{ Form::label('password', 'Password') }}
                        {{ Form::password('password') }}
                    </div>
                <br>
                @error('password')
                <span style="color: red">{{ $message }}</span>
                @enderror
                    <div style="margin: 2%">
                        {{ Form::label('nome', 'Nome') }}
                        {{ Form::text('nome', '') }}
                    </div>
                <br>
                @error('nome')
                <span style="color: red">{{ $message }}</span>
                @enderror
                    <div style="margin: 2%">
                        {{ Form::label('cognome', 'Cognome') }}
                        {{ Form::text('cognome', '') }}
                    </div>
                <br>
                @error('cognome')
                <span style="color: red">{{ $message }}</span>
                @enderror
                    <div style="margin: 2%">
                        {{ Form::label('età', 'Età') }}
                        {{ Form::text('età', '') }}
                    </div>
                <br>
                @error('età')
                <span style="color: red">{{ $message }}</span>
                @enderror
                    <div style="margin: 2%">
                        {{ Form::label('telefono', 'Telefono') }}
                        {{ Form::text('telefono', '') }}
                    </div>
                <br>
                @error('telefono')
                <span style="color: red">{{ $message }}</span>
                @enderror
                    <div style="margin: 2%">
                        {{ Form::label('email', 'Mail') }}
                        {{ Form::text('email', '') }}
                    </div>
                <br>
                @error('email')
                <span style="color: red">{{ $message }}</span>
                @enderror
                    <div style="margin: 2%">
                        {{ Form::label('genere', 'Genere') }}
                        {{ Form::select('genere',['maschio' => 'Maschio', 'femmina' => 'Femmina'], '') }}
                    </div>
                    <div style="margin: 2%">
                        {{ Form::label('azienda', 'Azienda') }}
                        {{ Form::select('azienda', $listaAziende) }}
                    </div>
                <br>
                    {{ Form::submit('Crea') }}
                    {{ Form::close() }}
                    <a href="{{ route('gestione-membristaff') }}" class="btn btn-primary">Torna indietro</a>
                </div>
                @break
        @endswitch
    </div>

@endsection
