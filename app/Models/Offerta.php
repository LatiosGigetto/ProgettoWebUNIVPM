<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Azienda;

class Offerta extends Model {

    protected $table = 'offerta';
    protected $primaryKey = 'id_Offerta';
    public $timestamps = false;

    // Ritorna le offerte in base al nome dell'azienda estraendone prima l'id

    public function getOfferteByAzienda($azienda) {

        $id = Azienda::where('NomeAzienda', 'LIKE', '%'. $azienda . '%')->pluck('id_Azienda');
        return Offerta::where('Id_Azienda', $id)->get();
    }

    public function getNomeAzienda() {
        
        return Azienda::where('id_Azienda', $this->Id_Azienda)->value('NomeAzienda');
    }
    
    // Ritorna le offerte in base al contenuto della variabile $descrizione
    // nel campo $descrizione
    
    public function getOfferteByDescrizione($descrizione) {
        
        return Offerta::where('Descrizione', 'LIKE', '%'. $descrizione . '%')->get();   
          }
    
    public function offertaAzienda() {
        return $this->hasOne(Azienda::class, 'Id_Azienda', 'id_Azienda');
    }

}
