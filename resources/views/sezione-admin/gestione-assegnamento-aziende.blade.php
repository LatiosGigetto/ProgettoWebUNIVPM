@extends('layouts.header-footer')

@section("title")
    Gestione Assegnamento
@endsection

@section("link-scripts")
    <script src="{{asset("js/gestione-assegnamento.js")}}"></script>
@endsection

@section("content")

    <div class="container d-flex h-100 py-4">
        @switch($azione)

            @case('view')
                <div class="container text-center">
                    <h2>Gestione Assegnamento Azienda</h2>
                    <table class="table mt-4">
                        <thead class="thead-dark">
                        <tr>
                            <th>Azienda</th>
                            <th>Staff</th>
                            <th>Modifica</th>
                            <th>Elimina</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!--popolo la tabella-->
                        @foreach($aziendeAssegnate as $assegnamento)
                            <tr>
                                <td>{{ $assegnamento->getNomeById() }}</td>
                                <td class="nome-staff">{{ $assegnamento->UsernameUtente }}</td>
                                <td>
                                    <a href="{{ route('modifica-assegnamento-view', ['id' => $assegnamento->id])}}">
                                        <button class="btn btn-primary">Modifica</button>
                                    </a>
                                </td>
                                <td>
                                    <button class="elim-ass btn btn-danger" name="{{$assegnamento->id}}">Elimina
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('crea-assegnamento-view')}}">
                        <button class="btn btn-primary">Crea nuovo assegnamento</button>
                    </a>
                    <div style="text-align: center">
                        @if(session('success'))
                            <strong style="color: green">{{ session('success') }}</strong>
                        @endif
                    </div>
                </div>
            @break

            @case('mod')
                <div class="container w-75 form_container my-2">
                    <h2 class="text-center">Modifica assegnamento</h2>

                    <div id="mod-assegnamento-sezione">
                        {{ Form::open(['route' => 'modifica-assegnamento-conf']) }}
                        {{ Form::hidden('id', $assegnamentoSel->id) }}

                        <div class="form-group my-2">
                            {{ Form::label('nomeazienda', 'Nome azienda') }}
                            {{ Form::select('nomeAzienda', $listaAziende, $assegnamentoSel->Id_Azienda, ['class' => 'form-select']) }}
                        </div>

                        <div class="form-group my-2">
                            {{ Form::label('usernameStaff', 'Staff') }}
                            {{ Form::select('usernameStaff',$listastaff, $assegnamentoSel->UsernameUtente, ['class' => 'form-select']) }}
                        </div>

                        <div class="mt-4 mb-2">
                            {{ Form::submit('Modifica', ['class' => 'btn btn-primary']) }}
                            {{ Form::close() }}
                            <a href="{{ route('gestione-assegnamento') }}" class="btn btn-primary">Torna indietro</a>
                            <br>
                            @error('erroreAss')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            @break

            @case('create')
                <div class="container w-75 form_container my-2">
                    <h2 class="text-center">Crea assegnamento</h2>

                    <div id="crea-assegnamento-sezione">
                        {{ Form::open(['route' => 'crea-assegnamento-conf']) }}

                        <div class="form-group my-2">
                            {{ Form::label('nomeazienda', 'nomeAzienda') }}
                            {{ Form::select('nomeAzienda', $listaAziende, '', ['class' => 'form-select']) }}
                        </div>

                        <div class="form-group my-2">
                            {{ Form::label('nomestaff', 'Staff') }}
                            {{ Form::select('nomestaff',$listastaff, '', ['class' => 'form-select']) }}
                        </div>

                        <div class="mt-4 mb-2">
                            {{ Form::submit('Crea', ['class' => 'btn btn-primary']) }}
                            {{ Form::close() }}
                            <a href="{{ route('gestione-assegnamento') }}" class="btn btn-primary">Torna indietro</a>
                            <br>
                            @error('erroreAss')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            @break
        @endswitch
    </div>
@endsection
