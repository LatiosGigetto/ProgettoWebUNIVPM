@extends('layouts.header-footer')

@section("title")
    Login
@endsection

@section('content')

    <div class="container align-items-center d-flex h-100">
        <div class="container text-center form_container">
            <p>Inserisci le tue credenziali d'accesso</p>

            {{ Form::open(array('route' => 'login'))}}
            <div class="container inner_form">
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
            </div>

            <div style="margin: 2%">
                {{ Form::submit('Accedi', ['class' => 'btn btn-primary']) }}
            </div>

            {{ Form::close() }}
        </div>
    </div>
@endsection
