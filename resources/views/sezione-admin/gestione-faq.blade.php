@extends('layouts.header-footer')

@section('title')
    FAQ
@endsection

@section('content')
    <div class="spazio_blocco">
        <h1>Gestione FAQ</h1>
        <table>
            <thead>
            <tr>
                <th>Domanda</th>
                <th>Risposta</th>
                <th>Modifica</th>
                <th>Elimina</th>
            </tr>
            </thead>

            <tbody>
            @foreach($faq as $faq)
                <tr>
                    <td>{{ $faq-> Domanda }}</td>
                    <td>{{ $faq-> Risposta }}</td>
                    <td>
                        <button name="mod-faq" id="mod-faq">Modifica</button>
                    </td>
                    <td>
                        <button name="elim-fafq" id="elim-faq">Elimina</button>
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

@endsection

