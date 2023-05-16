<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model {

    protected $table = 'coupon';
    protected $primaryKey = 'Id_Coupon';
    public $timestamps = false;
    // Id_Coupon protetto dal mass assignment

    protected $guarded = ['Id_Coupon'];

    // Ritorna lo username dell'utente associato al coupon

    public function getCouponUser() {
        return $this->UsernameUtente;
    }

    // Ritona l'offerta associata al coupon

    public function getCouponOfferta() {
        return $this->Id_Offerta;
    }

    // TODO: aggiungere altri metodi utili
    
}
