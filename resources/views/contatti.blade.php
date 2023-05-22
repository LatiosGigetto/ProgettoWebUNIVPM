<!--da rivedere: va centrato il blocco di testo-->
@extends('contenitore')

    @section("title")
        Contatti
    @endsection

        @section("contenuto")
            <h1 id="titolo_sezione">Contatti</h1>
            <h3> Informazioni utili per contattare l'amministratore</h3>
            <address id="contatti">
                <p>Amministratore: John Doe</p>
                <p>Indirizzo: Via Tal del Tali 1,SpringField</p>
                <p> Email: test@provider.com</p>
                <p>Telefono: 1234567890</p>
            </address>
        @endsection
