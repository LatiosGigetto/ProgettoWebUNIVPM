
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
            <label>Nome utente</label>

            <label>Nome</label>

            <form name="nome" style="margin: 2%" action="{{ route('modifica-info') }}" method="POST">
                <input name="nome" type="text" value="{{ old('nome', $user->Nome) }}" required>
            </form>

            <label>Cognome</label>

            <form name="cognome" style="margin: 2%" action="{{ route('modifica-info') }}" method="POST" >
                <input name="cognome" value="{{ old('cognome', $user->Cognome) }}" required>
            </form>


            <label>username</label>

            <form name="username" style="margin: 2%" action="{{ route('modifica-info') }}" method="POST" >
                <input name="username" type="text" value="{{ old('username', $user->username) }}" required>
            </form>

            <label>Genere</label>

            <select name="genere" style="margin: auto; margin-top: 2%; margin-bottom: 2%; display: block" action="{{ route('modifica-info') }}" method="POST">
                <!--<option value="M">Maschio</option>
                <option value="F">Femmina</option> -->
                <option value="M" {{ old('genere', $user->Genere) == 'M' ? 'selected' : '' }}>Maschio</option>
                <option value="F" {{ old('genere', $user->Genere) == 'F' ? 'selected' : '' }}>Femmina</option>

            </select>

            <label>Età</label>

            <form name="eta" style="margin: 2%" action="{{ route('modifica-info') }}" method="POST">
                <input name="eta" type="number"value="{{ old('età', $user->Età) }}"  min="1">
            </form>

            <label>Indirizzo email</label>

            <form name="email" style="margin: 2%" action="{{ route('modifica-info') }}" method="POST" >
                <input name="email" type="email" value="{{ old('mail', $user->Mail) }}">
            </form>

            <label>Telefono</label>

            <form name="telefono" style="margin: 2%" action="{{ route('modifica-info') }}" method="POST">
                <input  name="telefono" value="{{ old('telefono', $user->Telefono) }}">
            </form>
            <button id="modifiedbutton" type="submit" style="margin: 2%">
                Modifica
            </button>
        </div>

    </div>

@endsection

