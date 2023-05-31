    @extends('layouts.header-footer')


@section('title')
Gestione Promozioni
@endsection

@section("link-scripts")

<link rel="stylesheet" href="{{asset("css/tabelle.css")}}">

<script src="{{asset("js/gestione-promo.js")}}"></script>

@endsection


@section('content')

<div class="spazio_blocco">

    @switch($azione)


    @case('view')
    <div class="container ">
        <h1 class="text-center">Gestione Promozioni</h1>

        <table class=" table mx-auto " >
            <thead class="thead-dark">
                <tr>
                    <th>ID Offerta</th>
                    <th>Descrizione</th>
                    <th>Azienda</th>
                    <th>Luogo</th>
                    <th>Scadenza</th>
                    <th>Modifica</th>
                    <th>Elimina</th>
                </tr>
            </thead>
            <tbody>
                @foreach($offerte as $offerta)
                <tr>
                    <td class='idOff'>{{ $offerta->Id_Offerta }}</td>
                    <td class='oggOff'>{{ $offerta->Oggetto }}</td>
                    <td class='nomeAz'>{{ $offerta->getNomeAzienda() }}</td>
                    <td class='luogoOff'>{{ $offerta->Luogo }}</td>
                    <td class='valOff'>{{ $offerta->Validità }}</td>
                    <td>
                        <a href="{{ route('modifica-offerta-view', ['id' => $offerta->Id_Offerta])}}">
                            <button class="btn btn-primary">Modifica</button>
                        </a>
                    </td>
                    <td>
                        <button class="btn btn-danger el-prom" name="{{$offerta->Id_Offerta}}">Elimina</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            <a href="{{ route('crea-offerta')}}" class="btn btn-success" style="margin: 1%">Aggiungi promozione</a>
        </div>

        <div class="text-center">
                @if(session('success'))
            <strong style="color: green">{{ session('success') }}</strong>
                @endif
                @error('offerta-non-trovata')
            <span style="color: red">{{ $message }}</span>
                @enderror

                @include('paginator.paginator', ['paginator' => $offerte])
        </div>
            @break


        @case('mod')

        <h1 class="text-center">Modifica Offerta</h1>

        <div id="mod-off-sezione">

                {{ Form::open(['route' => 'modifica-offerta']) }}

                {{ Form::hidden('idOfferta', $offertaSel->Id_Offerta) }}

            <div class="form-group">
                    {{ Form::label('oggetto', 'Oggetto') }}
                    {{ Form::text('oggetto', $offertaSel->Oggetto, ['class' => 'form-control']) }}
                <br>
                    @error('oggetto')
                <span style="color: red">{{ $message }}</span>
                    @enderror
            </div>

            <div class="form-group">
                    {{ Form::label('descrizione', 'Descrizione') }}
                    {{ Form::textarea('descrizione', $offertaSel->Oggetto, ['class' => 'form-control']) }}
                    @error('descrizione')
                <span style="color: red">{{ $message }}</span>
                    @enderror
            </div>

            <div class="form-group">
                    {{ Form::label('azienda', 'Azienda') }}
                    {{ Form::select('azienda', $listaAziende, $offertaSel->getNomeAzienda(), ['class' => 'form-control']) }}
                    @error('azienda')
                <span style="color: red">{{ $message }}</span>
                    @enderror
            </div>

            <div class="form-group">
                    {{ Form::label('luogo', 'Luogo') }}
                    {{ Form::text('luogo', $offertaSel->Luogo, ['class' => 'form-control']) }}
                    @error('luogo')
                <span style="color: red">{{ $message }}</span>
                    @enderror
            </div>

            <div class="form-group">
                    {{ Form::label('validità', 'Validità') }}
                    {{ Form::text('validità', $offertaSel->Validità, ['class' => 'form-control']) }}
                    @error('validità')
                <span style="color: red">{{ $message }}</span>
                    @enderror
            </div>

                {{ Form::submit('Modifica', ['class' => 'btn btn-primary']) }}
                {{ Form::close() }}
        </div>
    </div>
    <a href="{{ route('gestione-promozioni') }}" class="btn btn-primary">Torna indietro</a>

</div>

    @break

    @case('create')

<h1>Crea Offerta</h1>

<div id ="crea-off-sezione">

        {{ Form::open(['route' => 'crea-offerta']) }}

    <div style="margin: 2%">
                    {{ Form::label('oggetto', 'Oggetto') }}
                    {{ Form::text('oggetto', '') }}
        <br>
                    @error('oggetto')
        <span style="color: red">{{ $message }}</span>
                    @enderror
    </div>

    <div style="margin: 2%">
                {{ Form::label('descrizione', 'Descrizione') }}
                {{ Form::textarea('descrizione', '') }}
        <br>
            @error('descrizione')
        <span style="color: red">{{ $message }}</span>
                @enderror
    </div>

    <div style="margin: 2%">
                {{ Form::label('azienda', 'Azienda') }}
                {{ Form::select('azienda', $listaAziende) }}
        <br>
            @error('azienda')
        <span style="color: red">{{ $message }}</span>
                @enderror
    </div>


    <div style="margin: 2%">
                {{ Form::label('luogo', 'Luogo') }}
                {{ Form::text('luogo', '' ) }}
        <br>
            @error('luogo')
        <span style="color: red">{{ $message }}</span>
                @enderror
    </div>

    <div style="margin: 2%">
                {{ Form::label('validità', 'Validità') }}
                {{ Form::text('validità', '') }}
        <br>
            @error('validità')
        <span style="color: red">{{ $message }}</span>
                @enderror
    </div>

        {{ Form::submit('Crea') }}
        {{ Form::close() }}

    <a href="{{ route('gestione-promozioni') }}" class="btn btn-primary">Torna indietro</a>

</div>

    @break

    @endswitch



</div>

@endsection

