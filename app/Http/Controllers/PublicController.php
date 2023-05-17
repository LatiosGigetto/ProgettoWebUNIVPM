<?php


namespace App\Http\Controllers;

use App\Models\Azienda;
use App\Models\Offerta;


class PublicController extends Controller {
    
    // TODO: implementare per bene le viste da chiamare
    
    // Funzione per prendere e paginare la lista offerte
    
    public function showAziendeList() {
        
        $aziende = Azienda::paginate(10);
        
        return view('testPaginazione')->with('aziende', $aziende);
    }
    
    // Funzione per prendere e paginare la lista offerte
    
    public function showOfferteByAzienda($azienda) {
        
        $offerte = Offerta::paginate(10);
        
        return view('testPaginazione')->with('offerte', $offerte);
    }
    
}
