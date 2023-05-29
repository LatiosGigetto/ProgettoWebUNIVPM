<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GestoriAziende extends Model {

    protected $table = 'gestoriaziende';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = [
        'Id_Azienda',
        'UsernameUtente'
    ];

    public function getNomeById(){
        return Azienda::getNomeAziendaById($this->Id_Azienda);

    }
}
