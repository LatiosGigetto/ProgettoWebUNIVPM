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

        return view('lista-aziende')->with('aziende', $aziende);
    }

    public function getAziendaByID($idAzienda) {

        return Azienda::where('Id_Azienda', $idAzienda)->get();
    }

    public function getOffertaByID($idOfferta) {

        return Offerta::where('Id_Offerta', $idOfferta)->first();
    }

    public function showDettagliOfferta($idOfferta) {

        $offerta = $this->getOffertaByID($idOfferta);

        return view('dettagli-offerta')->with('offerta', $offerta);
    }

    // Funzione per prendere e paginare la lista offerte dato il nome e/o
    // il contenuto della descrizione di un'offerta.

    public function showOfferte(Request $request) {

        $offerte = $this->_offertaModel;
        
        $nomeAzienda = $request->azienda;
        $descrizione = $request->descrizione;
        
        if ($nomeAzienda != "") {
           $offerte = $offerte->getOfferteByAzienda($nomeAzienda);
        }

        if ($descrizione != "") {
           $offerte = $offerte->getOfferteByDescrizione($descrizione);
        }
        
        return view('catalogo')->with('offerte', $offerte);
    }

    public function showOfferteList() {
        $offerte = Offerta::paginate(10);
        return view('catalogo')->with('offerte', $offerte);
    }

}
