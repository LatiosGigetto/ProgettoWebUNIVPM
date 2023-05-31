<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Azienda;

class Offerta extends Model {

    protected $table = 'offerta';
    protected $primaryKey = 'Id_Offerta';
    public $timestamps = false;
    public $incrementing = true;

    protected $fillable = [
        'Id_Azienda',
        'Oggetto',
        'Luogo',
        'Descrizione',
        'Validità',
    ];
    
    public function getNomeAzienda() {

        return Azienda::where('id_Azienda', $this->Id_Azienda)->value('NomeAzienda');
    }

    
    
    public function getLogoAzienda()
    {
        return Azienda::where('id_Azienda', $this->Id_Azienda)->value('Logo');
    }

}
