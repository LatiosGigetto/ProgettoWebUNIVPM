<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Azienda extends Model {

    protected $table = 'azienda';
    protected $primaryKey = 'id_Azienda';
    public $timestamps = false;

    // TODO: inserire metodi utili

    public static function getNomeAziendaById ($id) {
        
        return Azienda::where('Id_Azienda', $id)->only('NomeAzienda');
        
    }

}
