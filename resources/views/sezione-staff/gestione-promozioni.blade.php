@extends('layouts.header-footer')


@section('title')
Gestione Promozioni
@endsection

@section("link-scripts")

<link rel="stylesheet" href="{{asset("css/tabelle.css")}}">


<script>
    
    // TODO: Mettere il JS in un file separato.
    
    $(document).ready(function() {
    
   $('.el-prom').on('click', function() {
       
  if (confirm("Sei sicuro di voler eliminare quest'offerta?")) {
      
    var idOff = $(this).attr('name');
    
    window.location.href = '/gestione-promozioni/elim/' + idOff;
  }
});

  });              
</script>

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
                <td id='idOff'>{{ $offerta-> Id_Offerta }} </td>
                <td id='descOff'>{{ $offerta-> Descrizione }}</td>
                <td id='nomeAz'>{{ $offerta->getNomeAzienda() }} </td>
                <td id='luogoOff'>{{ $offerta-> Luogo }}</td>
                <td id='valOff'>{{ $offerta-> Validità }}</td>
                <td>
                    <a href="{{ route('modifica-offerta-view', ['id' => $offerta->Id_Offerta])}}">
                        <button id="mod-prom">Modifica</button>
                    </a>
                </td>
                <td>
                    <button class="el-prom"  name="{{$offerta->Id_Offerta}}" >Elimina</button>
                </td>
            </tr>
            @endforeach
            <tr>
                <td colspan="6">
                    <a href="{{ route('crea-offerta')}}">
                        <button style="margin-left: 600px">Aggiungi promozione</button>
                    </a>
                </td>

            </tr>

        </tbody>
    </table>
    @break


    @case('mod')

    <h1>Modifica Offerta</h1>

    <div id ="mod-off-sezione">

        {{ Form::open(['route' => 'modifica-offerta']) }}

        {{ Form::hidden('idOfferta', $offertaSel->Id_Offerta) }}

        <div style="margin: 2%">
                {{ Form::label('descrizione', 'Descrizione') }}
                {{ Form::text('descrizione', $offertaSel->Descrizione) }}
        </div>

        <div style="margin: 2%">
                {{ Form::label('azienda', 'Azienda') }}
                {{ Form::select('azienda', $listaAziende, $offertaSel->getNomeAzienda()) }}
        </div>


        <div style="margin: 2%">
                {{ Form::label('luogo', 'Luogo') }}
                {{ Form::text('luogo', $offertaSel->Luogo, ) }}
        </div>

        <div style="margin: 2%">
                {{ Form::label('validità', 'Validità') }}
                {{ Form::text('validità', $offertaSel->Validità) }}
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
        </div>

        <div style="margin: 2%">
                {{ Form::label('azienda', 'Azienda') }}
                {{ Form::select('azienda', $listaAziende) }}
        </div>


        <div style="margin: 2%">
                {{ Form::label('luogo', 'Luogo') }}
                {{ Form::text('luogo', '' ) }}
        </div>

        <div style="margin: 2%">
                {{ Form::label('validità', 'Validità') }}
                {{ Form::text('validità', '') }}
        </div>

        {{ Form::submit('Crea') }}
        {{ Form::close() }}


    </div>

    @break

    @endswitch

</div>

@endsection

