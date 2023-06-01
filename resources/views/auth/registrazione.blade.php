@extends('layouts.header-footer')

@section("title")
    Registrazione
@endsection

@section('content')
    <div class="container align-items-center d-flex h-100">
        <div class="container text-center form_container">
            <p>Inserisci i dati per la registrazione</p>
                {{ Form::open(array('route' => 'registrazione'))}}
                <div class="container inner_form">
                    <div class="row align-items-center p-1">
                        <div class="col-4" style="text-align: left;">
                            {{ Form::label('nome', 'Nome') }}
                        </div>
                        <div class="col-8">
                            {{ Form::text('nome', '')}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            @error('nome')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row align-items-center p-1">
                        <div class="col-4" style="text-align: left;">
                            {{ Form::label('cognome', 'Cognome') }}
                        </div>
                        <div class="col-8">
                            {{ Form::text('cognome', '') }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            @error('cognome')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row align-items-center p-1">
                        <div class="col-4" style="text-align: left;">
                            {{ Form::label('email', 'Email') }}
                        </div>
                        <div class="col-8">
                            {{ Form::text('email', '') }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            @error('email')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row align-items-center p-1">
                        <div class="col-4" style="text-align: left;">
                            {{ Form::label('username', 'Nome Utente') }}
                        </div>
                        <div class="col-8">
                            {{ Form::text('username', '') }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            @error('username')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row align-items-center p-1">
                        <div class="col-4" style="text-align: left;">
                            {{ Form::label('password', 'Password') }}
                        </div>
                        <div class="col-8">
                            {{ Form::password('password') }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            @error('password')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row align-items-center p-1">
                        <div class="col-4" style="text-align: left;">
                            {{ Form::label('età', 'Età') }}
                        </div>
                        <div class="col-8">
                            {{ Form::text('età','') }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            @error('età')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row align-items-center p-1">
                        <div class="col-4" style="text-align: left;">
                            {{ Form::label('telefono', 'Telefono') }}
                        </div>
                        <div class="col-8">
                            {{ Form::text('telefono','') }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            @error('telefono')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row align-items-center p-1">
                        <div class="col-4" style="text-align: left;">
                            {{ Form::label('genere', 'Genere') }}
                        </div>
                        <div class="col-8">
                            {{ Form::select('genere',['Maschio'=>'Maschio', 'Femmina'=>'Femmina']) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            @error('genere')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div style="margin: 2%">
                    {{ Form::submit('Registra') }}
                </div>

                {{ Form::close() }}
        </div>
    </div>
@endsection
