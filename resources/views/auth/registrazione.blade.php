@extends('layouts.header-footer')

@section("title")
    Registrazione
@endsection

@section('content')
    <div class="container align-items-center d-flex h-100 py-4">
        <div class="container text-center form_container">
            <h2 class="titolo_form mb-3">Inserisci i dati per la registrazione</h2>
                {{ Form::open(array('route' => 'registrazione'))}}
                <div class="container inner_form">
                    <div class="row align-items-center p-1">
                        <div class="col-4" style="text-align: left;">
                            {{ Form::label('nome', 'Nome', array('class' => 'form-label')) }}
                        </div>
                        <div class="col-8">
                            {{ Form::text('nome', '', array('class' => 'form-control border-black'))}}
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
                            {{ Form::label('cognome', 'Cognome', array('class' => 'form-label')) }}
                        </div>
                        <div class="col-8">
                            {{ Form::text('cognome', '', array('class' => 'form-control border-black')) }}
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
                            {{ Form::label('email', 'Email', array('class' => 'form-label')) }}
                        </div>
                        <div class="col-8">
                            {{ Form::text('email', '', array('class' => 'form-control border-black')) }}
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
                            {{ Form::label('username', 'Nome Utente', array('class' => 'form-label')) }}
                        </div>
                        <div class="col-8">
                            {{ Form::text('username', '', array('class' => 'form-control border-black')) }}
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
                            {{ Form::label('password', 'Password', array('class' => 'form-label')) }}
                        </div>
                        <div class="col-8">
                            {{ Form::password('password', array('class' => 'form-control border-black')) }}
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
                            {{ Form::label('età', 'Età', array('class' => 'form-label')) }}
                        </div>
                        <div class="col-8">
                            {{ Form::text('età','', array('class' => 'form-control border-black')) }}
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
                            {{ Form::label('telefono', 'Telefono', array('class' => 'form-label')) }}
                        </div>
                        <div class="col-8">
                            {{ Form::text('telefono','', array('class' => 'form-control border-black')) }}
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
                            {{ Form::label('genere', 'Genere', array('class' => 'form-label')) }}
                        </div>
                        <div class="col-8">
                            {{ Form::select('genere', array('Maschio' => 'Maschio', 'Femmina' => 'Femmina'), 'Maschio', array('class' => 'form-select border-black')) }}
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
                    {{ Form::submit('Registra', ['class' => 'btn btn-primary']) }}
                </div>

                {{ Form::close() }}
        </div>
    </div>
@endsection
