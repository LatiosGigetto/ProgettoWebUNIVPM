@extends('layouts.header-footer')

@section('title')
Gestione Promozioni
@endsection
<link rel="stylesheet" href="{{asset("css/tabelle.css")}}">

<script src="https://code.jquery.com/jquery-3.6.0.min.js">

// TODO implementare funzione per bene

$(document).ready(function() {
    $('#mod prom').on('click', function () {
        
        $('#modDescInput').text();
        
        $('#mod-prom-sezione').show();
        
            
    
}

</script>


<!-- <style>
 /*   .image_logo{
        width: 20px;
        float: left;
        border: 1px solid red;
    }
    h1{
        text-align: center;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        border: 1px solid black;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }


*/


</style> -->

@section('content')

<div class="spazio_blocco">
    <h1>Gestione Promozioni</h1>

    <table>
        <thead>
            <tr>
                <th>Descrizione promozione</th>
                <th>Azienda</th>
                <th>Scadenza</th>
                <th>Luogo</th>
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
                    <button id="mod prom">Modifica</button>
                </td>
                <td>
                    <button id="el prom">Elimina</button>
                </td>
            </tr>
            @endforeach
            <tr>
                <td colspan="6">
                    <button style="margin-left: 600px">Clicca per aggiungere una promozione</button>
                </td>

            </tr>

        </tbody>
    </table>


    <div id ="mod-prom-sezione">

        {{ Form::open('route' => 'modifica-promo') }}
        
        <div style="margin: 2%">
                {{ Form::label('descrizione', 'Descrizione') }}
                {{ Form::text('descrizione', '', ['id' => 'modDescInput']) }}
        </div>

        <div style="margin: 2%">
                {{ Form::label('azienda', 'Azienda') }}
                {{ Form::select('azienda', $offerte->getNomeAzienda(), '') }}
        </div>


        <div style="margin: 2%">
                {{ Form::label('luogo', 'Luogo') }}
                {{ Form::text('luogo', '', ['id' => 'modLuogoInput']) }}
        </div>

        <div style="margin: 2%">
                {{ Form::label('validità', 'Validità') }}
                {{ Form::text('validità', '', ['id' => 'modValiditàInput']) }}
        </div>


    </div>

</div>

@endsection

