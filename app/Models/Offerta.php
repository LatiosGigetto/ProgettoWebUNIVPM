<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Offerta extends Model {

    protected $table = 'offerta';
    protected $primaryKey = 'id_Offerta';
    public $timestamps = false;

    // TODO: Aggiungere getter e altri metodi utili

    public function offertaAzienda() {
        return $this->hasOne(Azienda::class, 'Id_Azienda', 'id_Azienda');
    }

}
