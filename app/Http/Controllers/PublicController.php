<?php

namespace App\Http\Controllers;

use App\Models\Azienda;
use App\Models\Offerta;
use App\Models\User;
use App\Models\FAQ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class PublicController extends Controller {

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

    public function showOfferte(Request $request) {

        // Crea un Builder di Offerta che prende solo quelle non scadute.

        $dataOdierna = Date::now()->toDateString();
        
        $offerte = Offerta::where('Validità', '>=', $dataOdierna);

        // Variabili per storare l'ingresso della richiesta.
        // flash() se le salva nella sessione per riprenderle nella vista.

        $nomeAzienda = $request->azienda;
        $descrizione = $request->descrizione;

        $request->flash();

        // Filtra in base ai campi non vuoti.

        if ($nomeAzienda != "") {

            // Prende gli id associati ai nomi, li trasforma in array e li
            // confronta con le offerte del database.

            $id = Azienda::where('NomeAzienda', 'LIKE', '%' . $nomeAzienda . '%')
                            ->pluck('id_Azienda')->toArray();
            $offerte = $offerte->whereIn('Id_Azienda', $id);

        }

        if ($descrizione != "") {

            // Ritorna le offerte in base al contenuto della variabile $descrizione.

            $offerte = $offerte->where('Descrizione', 'LIKE', '%' . $descrizione . '%');
        }

        $offerte = $offerte->paginate(5);

        // Controlla se $offerte è vuota, ritorna "false" se vero, altrimenti
        // ritorna le offerte.

        if ($offerte->total() == 0) {

            return view('sezione-pubblica/catalogo')->with('offerte', false);
        } else {

            return view('sezione-pubblica/catalogo')->with('offerte', $offerte);
        }
    }

    public function showAziendeInCatalogo() {
        $aziende = Azienda::paginate(5);
        return view('sezione-pubblica/catalogo')->with(['offerte' => 'inizio', 'aziende' => $aziende]);
    }

    public function showContatti() {
        $admin = User::where('Livello', 3)->first();
        return view('sezione-pubblica/contatti')->with('admin', $admin);
    }

    public function showFAQ() {
        $faq = FAQ::all();
        return view('sezione-pubblica/faq')->with('faqs', $faq);
    }

    public function show($id)
    {
        $azienda = Azienda::with('offerte')->find($id);

        return view('azienda.show', compact('azienda'));
    }

}
