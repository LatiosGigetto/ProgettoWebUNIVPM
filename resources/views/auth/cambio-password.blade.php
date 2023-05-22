@extends('header-footer')

@section("title")
    Cambio Password
@endsection

@section('content')
    <!--TODO togliere lo stile inline-->
    <div style="text-align: center; border: 4px solid blue; margin-top: 5%; margin-left: 25%; margin-right: 25%; margin-bottom: 5%">
        <h3>Cambio Password</h3>

        {{ Form::open(array('route' => 'password'))}}
        <div>
            <div  style="margin: 2%">
                {{ Form::label('current_password', 'Vecchia Password') }}
                {{ Form::password('current_password') }}
            </div>

            <div  style="margin: 2%">
                {{ Form::label('password', 'Nuova Password') }}
                {{ Form::password('password') }}
            </div>

            <div style="margin: 2%">
                {{ Form::submit('Conferma') }}
            </div>

            {{ Form::close() }}
        </div>

    </div>
@endsection
