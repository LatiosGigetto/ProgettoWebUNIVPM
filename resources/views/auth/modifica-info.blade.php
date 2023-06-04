@extends('layouts.header-footer')

@section("title")
Modifica Informazioni
@endsection

@section('content')
<!-- Gli utenti di livello 1 non possono cambiare username poiché chiave e password perché c'è una sezione apposita -->
<div class="container align-items-center d-flex h-100 py-5">
    <div class="container text-center form_container">
        <strong style="font-size: x-large">Modifica le tue informazioni personali</strong>
            {{ Form::open(array('route' => 'modifica-info')) }}
        <div class="container inner_form">
            <div class="row align-items-center p-1">
                <div class="col-4" style="text-align: left;">
                        {{ Form::label('nome', 'Nome', array('class' => 'form-label')) }}
                </div>
                <div class="col-8">
                        {{ Form::text('nome', '', array('placeholder' => $user->Nome, 'class' => 'form-control border-black')) }}
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
                        {{ Form::text('cognome', '', array('placeholder' => $user->Cognome, 'class' => 'form-control border-black')) }}
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
                        {{ Form::text('email', '', array('placeholder' => $user->Mail, 'class' => 'form-control border-black')) }}
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
                        {{ Form::label('età', 'Età', array('class' => 'form-label')) }}
                </div>
                <div class="col-8">
                        {{ Form::text('età', '', array('placeholder' => $user->Età, 'class' => 'form-control border-black')) }}
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
                        {{ Form::text('telefono', '', array('placeholder' => $user->Telefono, 'class' => 'form-control border-black')) }}
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
                        {{ Form::select('genere', ['Maschio' => 'Maschio', 'Femmina' => 'Femmina'], $user->Genere, array('class' => 'form-select border-black')) }}
                </div>
            </div>

            <div class="row">
                <div class="col">
                        @if(session('success'))
                    <span style="color: green">{{ session('success') }}</span>
                        @endif
                </div>
            </div>
        </div>

        <div style="margin: 2%">
                {{ Form::submit('Modifica', ['class' => 'btn btn-primary']) }}
        </div>

            {{ Form::close() }}
    </div>
</div>
@endsection

