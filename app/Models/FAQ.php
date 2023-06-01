<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{

    protected $table = 'faq';
    protected $primaryKey = 'Id_Domanda';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'Domanda',
        'Risposta',
    ];
}
