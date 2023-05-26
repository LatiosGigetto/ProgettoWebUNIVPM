@extends('layouts.header-footer')

@section("title")
    modifica-info
@endsection

<!--TODO togliere style inline-->

@section('content')
    <!--prova
    <div
        style="text-align: center; border: 4px solid blue; margin-top: 5%; margin-left: 25%; margin-right: 25%; margin-bottom: 5%">
        gli utenti di livello 1 non possono cambiare username poichè chiave e password perchè c'è sezione apposita-->
    <div style="text-align: center; border: 4px solid blue; margin-top: 5%; margin-left: 25%; margin-right: 25%; margin-bottom: 5%">
        <!-- Gli utenti di livello 1 non possono cambiare username poiché chiave e password perché c'è una sezione apposita -->
        <p>Modifica le tue informazioni personali</p>
        <div>
            {{ Form::open(array('route' => 'modifica-info')) }}
            <div style="margin: 2%">
                {{ Form::label('nome', 'Nome') }}
                {{ Form::text('nome', $user->Nome) }}
            </div>

            <div style="margin: 2%">
                {{ Form::label('cognome', 'Cognome') }}
                {{ Form::text('cognome', $user->Cognome) }}
            </div>

            <div style="margin: 2%">
                {{ Form::label('mail', 'Email') }}
                {{ Form::text('mail',$user->Mail) }}
            </div>

            <div style="margin: 2%">
                {{ Form::label('username', 'Nome Utente') }}
                {{ Form::text('username', $user->username) }}
            </div>

            <div style="margin: 2%">
                {{ Form::label('età', 'Età') }}
                {{ Form::text('età', $user->Età) }}
            </div>

            <div style="margin: 2%">
                {{ Form::label('telefono', 'Telefono') }}
                {{ Form::text('telefono', $user->Telefono) }}
            </div>

            <div style="margin: 2%">
                {{ Form::label('genere', 'Genere') }}
                {{ Form::select('genere', ['Maschio' => 'Maschio', 'Femmina' => 'Femmina'], $user->Genere) }}
            </div>

            <div style="margin: 2%">
                {{ Form::submit('Modifica') }}
            </div>

            {{ Form::close() }}
        </div>
    </div>









@endsection

