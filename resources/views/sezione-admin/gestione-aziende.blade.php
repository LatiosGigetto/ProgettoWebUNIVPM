@extends('layouts.header-footer')

@section("title")
    Gestione Aziende
@endsection

@section("link-scripts")
    <script src="{{asset("js/gestione-aziende.js")}}"></script>
@endsection

@section("content")

    <div class="container d-flex align-items-center h-100 pt-4">
        @switch($azione)

            @case('view')
                <div class="container">
                    <h2 class="text-center">Gestione Aziende</h2>
                    <table class="table my-2">
                        <thead class="thead-dark">
                        <tr>
                            <th>Nome Azienda</th>
                            <th>Tipologia</th>
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
                                <td>{{ $azienda->NomeAzienda }}</td>
                                <td>{{ $azienda->Categoria }}</td>
                                <td><img src="data:image/png/jpeg;base64,{{ base64_encode($azienda->Logo) }}"
                                         style="width: 100px; height: 100px;"></td>
                                <td>{{ $azienda->Sede }}</td>
                                <td>{{ $azienda->Descrizione }}</td>
                                <td>
                                    <a href="{{ route('modifica-azienda-view', ['id' => $azienda->Id_Azienda]) }}">
                                        <button class="btn btn-primary">Modifica</button>
                                    </a>
                                </td>
                                <td>
                                    <button class="btn btn-danger elim-az" name="{{ $azienda->Id_Azienda }}">Elimina
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="text-center mb-4">
                        <td colspan="4">
                            <a href="{{ route('crea-azienda-view') }}">
                                <button class="btn btn-primary">Crea Nuova Azienda</button>
                            </a>
                        </td>
                    </div>
                    <div class="text-center">
                        @if(session('success'))
                            <strong style="color: green">{{ session('success') }}</strong>
                        @endif

                        @include('paginator.paginator', ['paginator' => $aziende])
                    </div>
                </div>
            @break

            @case('mod')
                <div class="container w-75 form_container mb-4">
                    <h1 class="text-center">Modifica Azienda</h1>

                    <div id="crea-azienda-sezione">
                        {{ Form::open(['route' => 'modifica-azienda', 'files' => 'true']) }}
                        {{ Form::hidden('idAzienda', $aziendaSel->Id_Azienda) }}

                        <div class="form-group my-2">
                            {{ Form::label('nomeazienda', 'Nome') }}
                            {{ Form::text('nomeazienda', $aziendaSel->NomeAzienda, ['class' => 'form-control']) }}
                            @error('nomeazienda')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group my-2">
                            {{ Form::label('categoria', 'Categoria') }}
                            {{ Form::text('categoria', $aziendaSel->Categoria, ['class' => 'form-control']) }}
                            @error('oggetto')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group my-2">
                            {{ Form::label('logo', 'Logo') }}
                            {{ Form::file('logo', ['class' => 'form-control']) }}
                            @error('logo')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group my-2">
                            {{ Form::label('sede', 'Sede') }}
                            {{ Form::text('sede', $aziendaSel->Sede, ['class' => 'form-control']) }}
                            @error('sede')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group my-2">
                            {{ Form::label('descrizione', 'Descrizione') }}
                            {{ Form::text('descrizione', $aziendaSel->Descrizione, ['class' => 'form-control']) }}
                            @error('descrizione')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-4 mb-2">
                            {{ Form::submit('Modifica', ['class' => 'btn btn-primary']) }}
                            {{ Form::close() }}

                            <a href="{{ route('gestione-aziende') }}" class="btn btn-primary">Torna indietro</a>
                        </div>
                    </div>
                </div>

                @break

            @case('create')
                <div class="container w-75 form_container mb-4">
                    <h1 class="text-center">Crea Azienda</h1>

                    <div id="crea-azienda-sezione">
                        {{ Form::open(['route' => 'crea-azienda', 'files' => 'true']) }}

                        <div class="form-group my-2">
                            {{ Form::label('nomeazienda', 'Nome') }}
                            {{ Form::text('nomeazienda', '', ['class' => 'form-control']) }}
                            @error('nomeazienda')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group my-2">
                            {{ Form::label('categoria', 'Categoria') }}
                            {{ Form::text('categoria', '', ['class' => 'form-control']) }}
                            @error('oggetto')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group my-2">
                            {{ Form::label('logo', 'Logo') }}
                            {{ Form::file('logo', ['class' => 'form-control']) }}
                            @error('logo')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group my-2">
                            {{ Form::label('sede', 'Sede') }}
                            {{ Form::text('sede', '', ['class' => 'form-control']) }}
                            @error('sede')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group my-2">
                            {{ Form::label('descrizione', 'Descrizione') }}
                            {{ Form::text('descrizione', '', ['class' => 'form-control']) }}
                            @error('descrizione')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-4 mb-2">
                            {{ Form::submit('Crea', ['class' => 'btn btn-primary']) }}
                            {{ Form::close() }}

                            <a href="{{ route('gestione-aziende') }}" class="btn btn-primary">Torna indietro</a>
                        </div>
                    </div>
                </div>
                @break
        @endswitch
    </div>
@endsection
