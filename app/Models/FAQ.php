<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model {

    protected $table = 'faq';
    protected $primaryKey = 'Id_Domanda';

    // TODO: aggiungere altri metodi utili
    
    public function getDomanda() {
        return $this->Domanda;
    }

    public function getRisposta() {
        return $this->Risposta;
    }

}
