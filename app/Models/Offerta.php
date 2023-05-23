<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Azienda;

class Offerta extends Model {

    protected $table = 'offerta';
    protected $primaryKey = 'id_Offerta';
    public $timestamps = false;

    public function getNomeAzienda() {
        
        return Azienda::where('id_Azienda', $this->Id_Azienda)->value('NomeAzienda');
    }
    
    public function offertaAzienda() {
        return $this->hasOne(Azienda::class, 'Id_Azienda', 'id_Azienda');
    }

}
