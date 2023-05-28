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
    <h1>Gestione Promozioni</h1>

    <table>
        <thead>
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
                <td class='idOff'>{{ $offerta-> Id_Offerta }} </td>
                <td class='descOff'>{{ $offerta-> Descrizione }}</td>
                <td class='nomeAz'>{{ $offerta->getNomeAzienda() }} </td>
                <td class='luogoOff'>{{ $offerta-> Luogo }}</td>
                <td class='valOff'>{{ $offerta-> Validità }}</td>
                <td>
                    <a href="{{ route('modifica-offerta-view', ['id' => $offerta->Id_Offerta])}}">
                        <button class="mod-prom">Modifica</button>
                    </a>
                </td>
                <td>
                    <button class="el-prom"  name="{{$offerta->Id_Offerta}}" >Elimina</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div style="display: flex; justify-content: center">
                    <a href="{{ route('crea-offerta')}}" style="margin: 1%">
                        <button >Aggiungi promozione</button>
                    </a>
    </div>        
    
    <div style="text-align: center">
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

    <h1>Modifica Offerta</h1>

    <div id ="mod-off-sezione">

        {{ Form::open(['route' => 'modifica-offerta']) }}

        {{ Form::hidden('idOfferta', $offertaSel->Id_Offerta) }}

        <div style="margin: 2%">
                {{ Form::label('descrizione', 'Descrizione') }}
                {{ Form::textarea('descrizione', $offertaSel->Descrizione) }}
            <br>
                @error('descrizione')
                <span style="color: red">{{ $message }}</span>
                @enderror
        </div>

        <div style="margin: 2%">
                {{ Form::label('azienda', 'Azienda') }}
                {{ Form::select('azienda', $listaAziende, $offertaSel->getNomeAzienda()) }}
            <br>
                @error('azienda')
                <span style="color: red">{{ $message }}</span>
                @enderror
        </div>


        <div style="margin: 2%">
                {{ Form::label('luogo', 'Luogo') }}
                {{ Form::text('luogo', $offertaSel->Luogo, ) }}
            <br>
                @error('luogo')
                <span style="color: red">{{ $message }}</span>
                @enderror
        </div>

        <div style="margin: 2%">
                {{ Form::label('validità', 'Validità') }}
                {{ Form::text('validità', $offertaSel->Validità) }}
            <br>
                @error('validità')
                <span style="color: red">{{ $message }}</span>
                @enderror
        </div>

        {{ Form::submit('Modifica') }}
        {{ Form::close() }}



    </div>

    @break

    @case('create')

    <h1>Crea Offerta</h1>

    <div id ="crea-off-sezione">

        {{ Form::open(['route' => 'crea-offerta']) }}

        <div style="margin: 2%">
                {{ Form::label('descrizione', 'Descrizione') }}
                {{ Form::text('descrizione', '') }}
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


    </div>

    @break

    @endswitch

    
    
</div>

@endsection

