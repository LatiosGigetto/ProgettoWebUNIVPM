
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

            <form name="nome" style="margin: 2%">
                <input required>
            </form>

            <label>Cognome</label>

            <form name="cognome" style="margin: 2%">
                <input required>
            </form>

            <label>Genere</label>

            <select name="genere" style="margin: auto; margin-top: 2%; margin-bottom: 2%; display: block">
                <option value="M">Maschio</option>
                <option value="F">Femmina</option>
            </select>

            <label>Età</label>

            <form name="eta" style="margin: 2%">
                <input type="number" min="1">
            </form>

            <label>Indirizzo email</label>

            <form name="email" style="margin: 2%">
                <input type="email">
            </form>

            <button id="modifiedbutton" style="margin: 2%">
                Modifica
            </button>
        </div>

    </div>

@endsection

