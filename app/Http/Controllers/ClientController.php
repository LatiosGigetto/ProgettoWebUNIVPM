<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Coupon;

class ClientController extends Controller
{

    public function __construct()
    {
        $this->coupon = new Coupon;
    }

    public function acquista($id_offerta) {
        $user = Auth::user();
        $coupon = new Coupon;
        $coupon->UsernameUtente = $user->username;
        $coupon->Id_Offerta = $id_offerta;
        $coupon->Id_Coupon = mt_rand(1, 11);;
        $coupon->save();
        return to_route("dettagli-offerta", [$id_offerta]);
    }
}
