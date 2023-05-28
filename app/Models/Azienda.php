<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Azienda extends Model {

    protected $table = 'azienda';
    protected $primaryKey = 'Id_Azienda';
    public $timestamps = false;
    public $incrementing = true;

    protected $fillable = [
        'NomeAzienda',
        'Logo',
        'Sede',
        'Descrizione',
        'Categoria',
    ];

    public static function getNomeAziendaById($id) {

        return Azienda::where('Id_Azienda', $id)->only('NomeAzienda');
    }

    public function offerte() {
        return $this->hasMany(Offerta::class);
    }

}
