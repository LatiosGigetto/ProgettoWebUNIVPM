@extends('layouts.header-footer')


@section("title")
    Gestione Assegnamento
@endsection

@section("link-scripts")
    <link rel="stylesheet" href="{{asset("css/tabelle.css")}}">
    <script src="{{asset("js/gestione-assegnamento.js")}}"></script>
@endsection

@section("content")

    <div class="container text-center mt-3">
        @switch($azione)

            @case('view')
                <h1>Gestione Assegnamento Azienda</h1>
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
                                <a href="{{ route('modifica-assegnamento-view',[
                                    'id' => $assegnamento->id])
                                    }}">
                                    <button class="btn btn-primary">Modifica</button>
                                </a>
                            </td>
                            <td>
                                <button class="elim-ass btn btn-danger" name="{{$assegnamento->id}}">Elimina</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <td colspan="4">
                    <a href="{{ route('crea-assegnamento-view')}}">
                        <button class="btn btn-primary">Crea Nuova assegnamento</button>
                    </a>
                </td>
    </div>
    @break

    @case('mod')
        <h1>Modifica Assegnamento</h1>

        <div id="mod-assegnamento-sezione">
            {{ Form::open(['route' => 'modifica-assegnamento-conf']) }}
            {{ Form::hidden('id', $assegnamentoSel->id) }}

            <div style="margin: 2%">
                {{ Form::label('nomeazienda', 'NomeAzienda') }}
                {{ Form::select('nomeAzienda',$listaAziende ,$assegnamentoSel->Id_Azienda ) }}
            </div>

            <div style="margin: 2%">
                {{ Form::label('usernameStaff', 'Staff') }}
                {{ Form::select('usernameStaff',$listastaff, $assegnamentoSel->UsernameUtente )}}
            </div>

            {{ Form::submit('Modifica') }}
            {{ Form::close() }}
            <br>
            @error('erroreAss')
            <span style="color: red">{{ $message }}</span>
            @enderror
            <a href="{{ route('gestione-assegnamento') }}" class="btn btn-primary">Torna indietro</a>
        </div>

        @break
    @case('create')

        <h1>Crea Assegnamento</h1>
        <div id="crea-assegnamento-sezione">
            {{ Form::open(['route' => 'crea-assegnamento-conf']) }}
            <div style="margin: 2%">
                {{ Form::label('nomeazienda', 'NomeAzienda') }}
                {{ Form::select('nomeAzienda', $listaAziende) }}
            </div>
            <div style="margin: 2%">
                {{ Form::label('nomestaff', 'Staff') }}
                {{ Form::select('nomestaff', $listastaff) }}
            </div>
            <br>
            @error('erroreAss')
            <span style="color: red">{{ $message }}</span>
            @enderror
            {{ Form::submit('Crea') }}
            {{ Form::close() }}
            <a href="{{ route('gestione-assegnamento') }}" class="btn btn-primary">Torna indietro</a>
        </div>
        @break
    @endswitch

@endsection
