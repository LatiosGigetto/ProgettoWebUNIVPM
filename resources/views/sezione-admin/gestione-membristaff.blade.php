@extends('layouts.header-footer')

@section("title")
    Gestione Aziende
@endsection

@section("link-scripts")

    <link rel="stylesheet" href="{{asset("css/tabelle.css")}}">
    <script src="{{asset("js/gestione-staff.js")}}"></script>

@endsection

@section("content")

    <div class="container d-flex h-100 py-4">
        @switch($azione)

            @case('view')
                <div class="container text-center">
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
                                    <button class="btn btn-danger elim-staff" name="{{ $membro_staff->username }}">
                                        Elimina
                                    </button>
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

                    <div style="text-align: center">
                        @if(session('success'))
                            <strong style="color: green">{{ session('success') }}</strong>
                        @endif
                    </div>
                </div>
                @break

            @case('mod')
                <div class="container w-75 form_container my-2">
                    <h1 class="text-center">Modifica membro Staff</h1>

                    <div id="mod-staff-sezione">
                        {{ Form::open(['route' => 'modifica-staff-conf']) }}
                        {{ Form::hidden('username', $staffSel->username) }}

                        <div class="form-group my-2">
                            {{ Form::label('nome', 'Nome') }}
                            {{ Form::text('nome', $staffSel->Nome, ['class' => 'form-control']) }}
                            @error('nome')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group my-2">
                            {{ Form::label('cognome', 'Cognome') }}
                            {{ Form::text('cognome', $staffSel->Cognome, ['class' => 'form-control']) }}
                            @error('cognome')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group my-2">
                            {{ Form::label('età', 'Età') }}
                            {{ Form::text('età', $staffSel->Età, ['class' => 'form-control']) }}
                            @error('età')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group my-2">
                            {{ Form::label('telefono', 'Telefono') }}
                            {{ Form::text('telefono', $staffSel->Telefono, ['class' => 'form-control']) }}
                            @error('telefono')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group my-2">
                            {{ Form::label('email', 'Mail') }}
                            {{ Form::text('email', $staffSel->Mail, ['class' => 'form-control']) }}
                            @error('email')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group my-2">
                            {{ Form::label('genere', 'Genere') }}
                            {{ Form::select('genere', ['maschio' => 'Maschio', 'femmina' => 'Femmina'], $staffSel ->Genere, ['class' => 'form-select']) }}
                            @error('genere')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-4 mb-2">
                            {{ Form::submit('Modifica', ['class' => 'btn btn-primary']) }}
                            {{ Form::close() }}
                            <a href="{{ route('gestione-membristaff') }}" class="btn btn-primary">Torna indietro</a>
                        </div>
                    </div>
                </div>
                @break

            @case('create')
                <div class="container w-75 form_container my-2">
                    <h1 class="text-center">Crea membro Staff</h1>

                    <div id="crea-staff-sezione">
                        {{ Form::open(['route' => 'crea-staff-conf']) }}

                        <div class="form-group my-2">
                            {{ Form::label('username', 'Username') }}
                            {{ Form::text('username', '', ['class' => 'form-control']) }}
                            @error('username')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group my-2">
                            {{ Form::label('nome', 'Nome') }}
                            {{ Form::text('nome', '', ['class' => 'form-control']) }}
                            @error('nome')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group my-2">
                            {{ Form::label('cognome', 'Cognome') }}
                            {{ Form::text('cognome', '', ['class' => 'form-control']) }}
                            @error('cognome')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group my-2">
                            {{ Form::label('password', 'Password') }}
                            {{ Form::password('password', ['class' => 'form-control']) }}
                            @error('password')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group my-2">
                            {{ Form::label('età', 'Età') }}
                            {{ Form::text('età', '', ['class' => 'form-control']) }}
                            @error('età')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group my-2">
                            {{ Form::label('telefono', 'Telefono') }}
                            {{ Form::text('telefono', '', ['class' => 'form-control']) }}
                            @error('telefono')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group my-2">
                            {{ Form::label('email', 'Mail') }}
                            {{ Form::text('email', '', ['class' => 'form-control']) }}
                            @error('email')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group my-2">
                            {{ Form::label('genere', 'Genere') }}
                            {{ Form::select('genere', ['maschio' => 'Maschio', 'femmina' => 'Femmina'], '', ['class' => 'form-select']) }}
                            @error('genere')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group my-2">
                            {{ Form::label('azienda', 'Azienda') }}
                            {{ Form::select('azienda', $listaAziende, '', ['class' => 'form-select']) }}
                            @error('nome')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-4 mb-2">
                            {{ Form::submit('Crea', ['class' => 'btn btn-primary']) }}
                            {{ Form::close() }}
                            <a href="{{ route('gestione-membristaff') }}" class="btn btn-primary">Torna indietro</a>
                        </div>
                    </div>
                </div>
                @break
        @endswitch
    </div>

@endsection
