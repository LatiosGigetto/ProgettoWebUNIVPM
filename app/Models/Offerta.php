<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Offerta extends Model {

    protected $table = 'offerta';
    protected $primaryKey = 'id_Offerta';
    public $timestamps = false;

    // Ritorna le offerte in base al nome dell'azienda estraendone prima l'id

    public function getOfferteByAzienda($azienda) {

        $id = Azienda::where('nome', $azienda)->pluck('id_Azienda')->get();
        return Offerta::where('Id_Azienda', $id)->get();
    }

    public function offertaAzienda() {
        return $this->hasOne(Azienda::class, 'Id_Azienda', 'id_Azienda');
    }

}
