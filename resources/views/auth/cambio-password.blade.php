@extends('layouts.header-footer')

@section("title")
    Cambio Password
@endsection

@section('content')
    <!--TODO togliere lo stile inline-->
    <div class="container align-items-center d-flex h-100">
        <div class="container text-center form_container" style="width: 600px;">
        <h3>Cambio Password</h3>

        {{ Form::open(array('route' => 'cambia-password'))}}
        <div class="container inner_form" style="width: 500px;">
            <div class="row align-items-center p-1">
                <div class="col-4" style="text-align: left;">
                    {{ Form::label('vecchia_password', 'Vecchia Password') }}
                </div>
                <div class="col-8">
                    {{ Form::password('vecchia_password') }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    @error('vecchia_password')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row align-items-center p-1">
                <div class="col-4" style="text-align: left;">
                    {{ Form::label('nuova_password', 'Nuova Password') }}
                </div>
                <div class="col-8">
                    {{ Form::password('nuova_password') }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    @error('nuova_password')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                    @if(session('success'))
                        <span style="color: green">{{ session('success') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div style="margin: 2%">
            {{ Form::submit('Conferma') }}
        </div>

        {{ Form::close() }}
    </div>
@endsection
