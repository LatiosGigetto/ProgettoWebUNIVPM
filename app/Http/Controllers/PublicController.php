<?php

namespace App\Http\Controllers;

use App\Models\Azienda;
use App\Models\Offerta;
use Illuminate\Http\Request;

class PublicController extends Controller {

    protected $_offertaModel;

    public function __construct() {
        $this->_offertaModel = new Offerta;
    }

    // Funzione per prendere e paginare la lista offerte

    public function showAziendeList() {

        $aziende = Azienda::paginate(10);

        return view('sezione-pubblica/lista-aziende')->with('aziende', $aziende);
    }

    public function getAziendaByID($idAzienda) {

        return Azienda::where('Id_Azienda', $idAzienda)->get();
    }

    public function getOffertaByID($idOfferta) {

        return Offerta::where('Id_Offerta', $idOfferta)->first();
    }

    public function showDettagliOfferta($idOfferta) {

        $offerta = $this->getOffertaByID($idOfferta);

        return view('sezione-pubblica/dettagli-offerta')->with('offerta', $offerta);
    }

    // Funzione per prendere e paginare la lista offerte dato il nome e/o
    // il contenuto della descrizione di un'offerta.
    // TODO: implementare paginazione.

    public function showOfferte(Request $request) {

        // Crea una Collection di tutte le offerte da filtrare.

        $offerte = Offerta::all();

        // Variabili per storare l'ingresso della richiesta.
        // flash() se le salva nella sessione per riprenderle nella vista.

        $nomeAzienda = $request->azienda;
        $descrizione = $request->descrizione;

        $request->flash();

        // Filtra in base ai campi non vuoti

        if ($nomeAzienda != "") {

            // Prende gli id associati ai nomi, li trasforma in array e li
            // confronta con le offerte del database.

            $id = Azienda::where('NomeAzienda', 'LIKE', '%' . $nomeAzienda . '%')
                            ->pluck('id_Azienda')->toArray();
            $offerte = $offerte->whereIn('Id_Azienda', $id);
        }

        if ($descrizione != "") {

            // Ritorna le offerte in base al contenuto della variabile $descrizione
            // Lo "use" in questo contesto permette alla
            // funzione del filter di accedere a variabili fuori dal suo scope.
            // "stripos" compara l'elemento Descrizione di $offerta con $descrizione
            // in maniera case-insensitive e ritorna false se non trova niente.

            $offerte = $offerte->filter(function ($offerta) use ($descrizione) {
                return stripos($offerta['Descrizione'], $descrizione) !== false;
            });
        }

        // Controlla se $offerte è vuota, ritorna "false" se vero, altrimenti
        // ritorna la Collection filtrata.

        if ($offerte->isEmpty()) {

            return view('sezione-pubblica/catalogo')->with('offerte', false);

        } else {

            return view('sezione-pubblica/catalogo')->with('offerte', $offerte);
        }
    }

    public function showOfferteList() {
        $offerte = Offerta::paginate(5);
        return view('sezione-pubblica/catalogo')->with('offerte', $offerte);
    }

}
