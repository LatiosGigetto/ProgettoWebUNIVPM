<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Offerta;

class Coupon extends Model {

    protected $table = 'coupon';
    protected $primaryKey = 'Id_Coupon';
    public $timestamps = false;
    public $incrementing = false;
    // Id_Coupon protetto dal mass assignment

    protected $guarded = ['Id_Coupon'];

    /* //Ritorna lo username dell'utente associato al coupon

    public function getCouponUser() {
        return $this->UsernameUtente;
    }

    */

    //Ritorna l'offerta associata al coupon

    public function getOffertaByCoupon() {
        return Offerta::find($this->Id_Offerta);
    }

 
    public function getTable(){
        return $this->table;
    }

}
