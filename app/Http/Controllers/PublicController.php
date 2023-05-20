<?php

namespace App\Http\Controllers;

use App\Models\Azienda;
use App\Models\Offerta;

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

    // Funzione per prendere e paginare la lista offerte dato il nome di un azienda

    public function showOfferteByAzienda($nomeAzienda) {

        $offerte = $this->_offertaModel
                        ->getOfferteByAzienda($nomeAzienda)::paginate(10);

        return view('testPaginazione')->with('offerte', $offerte);
    }

}
