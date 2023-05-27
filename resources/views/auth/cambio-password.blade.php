@extends('layouts.header-footer')

@section("title")
    Cambio Password
@endsection

@section('content')
    <!--TODO togliere lo stile inline-->
    <div
        style="text-align: center; border: 4px solid blue; margin-top: 5%; margin-left: 25%; margin-right: 25%; margin-bottom: 5%">
        <h3>Cambio Password</h3>

        {{ Form::open(array('route' => 'cambia-password'))}}
        <div>
            <div style="margin: 2%">
                {{ Form::label('vecchia_password', 'Vecchia Password') }}
                {{ Form::password('vecchia_password') }}
                <br>
                @error('vecchia_password')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </div>

            <div style="margin: 2%">
                {{ Form::label('nuova_password', 'Nuova Password') }}
                {{ Form::password('nuova_password') }}
                <br>
                @error('nuova_password')
                    <span style="color: red">{{ $message }}</span>
                @enderror
                @if(session('success'))
                    <span style="color: green">{{ session('success') }}</span>
                @endif
            </div>

            <div style="margin: 2%">
                {{ Form::submit('Conferma') }}
            </div>

            {{ Form::close() }}
        </div>

    </div>
@endsection
