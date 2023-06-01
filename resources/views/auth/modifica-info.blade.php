@extends('layouts.header-footer')

@section("title")
    modifica-info
@endsection

@section('content')
    <!-- Gli utenti di livello 1 non possono cambiare username poiché chiave e password perché c'è una sezione apposita -->
    <div class="container align-items-center d-flex h-100">
        <div class="container text-center form_container">
            <p>Modifica le tue informazioni personali</p>
            {{ Form::open(array('route' => 'modifica-info')) }}
            <div class="container inner_form">
                <div class="row align-items-center p-1">
                    <div class="col-4" style="text-align: left;">
                        {{ Form::label('nome', 'Nome') }}
                    </div>
                    <div class="col-8">
                        {{ Form::text('nome', '',['placeholder' => $user->Nome]) }}
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
                        {{ Form::text('cognome', '', ['placeholder' => $user->Cognome]) }}
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
                        {{ Form::text('email', '', ['placeholder' => $user->Mail]) }}
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
                        {{ Form::label('età', 'Età') }}
                    </div>
                    <div class="col-8">
                        {{ Form::text('età', '', ['placeholder' => $user->Età]) }}
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
                        {{ Form::text('telefono', '', ['placeholder' => $user->Telefono]) }}
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
                        {{ Form::select('genere', ['Maschio' => 'Maschio', 'Femmina' => 'Femmina'], $user->Genere) }}
                    </div>
                </div>
                {{--TODO: questa parte non dovrebbe servire--}}
                <div class="row">
                    <div class="col">
                        @error('genere')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div style="margin: 2%">
                {{ Form::submit('Modifica') }}
            </div>

            {{ Form::close() }}
            @include('layouts/tornaindietro')
        </div>
    </div>
@endsection

