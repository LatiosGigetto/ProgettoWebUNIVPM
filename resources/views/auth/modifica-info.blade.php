
@extends('header-footer')

    @section("title")
        modifica-info
    @endsection

<!--TODO togliere style inline-->

@section('content')
    <div style="text-align: center; border: 4px solid blue; margin-top: 5%; margin-left: 25%; margin-right: 25%; margin-bottom: 5%">
        <!--gli utenti di livello 1 non possono cambiare username poichè chiave e password perchè c'è sezione apposita-->
        <p>Modifica le tue informazioni personali</p>
        <div>
            {{ Form::open(array('route' => 'modifica-info'))}}
            <div style="margin: 2%">
                {{ Form::label('nome', 'Nome') }}
                {{ Form::text('nome', '')}}
            </div>

            <div  style="margin: 2%">
                {{ Form::label('cognome', 'Cognome') }}
                {{ Form::text('cognome', '') }}
            </div>

            <div  style="margin: 2%">
                {{ Form::label('mail', 'Email') }}
                {{ Form::text('mail', '') }}
            </div>

            <div  style="margin: 2%">
                {{ Form::label('username', 'Nome Utente') }}
                {{ Form::text('username', '') }}
            </div>

            <div  style="margin: 2%">
                {{ Form::label('età', 'Età') }}
                {{ Form::text('età','') }}
            </div>

            <div  style="margin: 2%">
                {{ Form::label('telefono', 'Telefono') }}
                {{ Form::text('telefono','') }}
            </div>

            <div  style="margin: 2%">
                {{ Form::label('genere', 'Genere') }}
                {{ Form::select('genere',['Maschio'=>'Maschio', 'Femmina'=>'Femmina']) }}
            </div>

            <div style="margin: 2%">
                {{ Form::submit('Modifica') }}
            </div>

            {{ Form::close() }}
        </div>

    </div>

@endsection

