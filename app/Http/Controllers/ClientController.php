<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use App\Models\Coupon;
use App\Models\User;

class ClientController extends Controller {

    public function __construct() {
        $this->coupon = new Coupon;
    }

    public function acquista($id_offerta) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $generato = false;

        // Controlla che non ci sia un coupon con ID uguale.

        while (!$generato) {

            $randomString = substr(str_shuffle($characters), 0, 10);

            if ($randomString == Coupon::find($randomString)) {
                continue;
            }
            $generato = true;

        }

        // Controlla che sia un utente di Livello 1 a generare il coupon.

        $user = Auth::user();

        if ($user->Livello != 1) {

            return json_encode("utente-non-aut");
        }

        $check = Coupon::where('Id_Offerta', $id_offerta)->where('UsernameUtente', $user->username)->first();
        if ($check) {
            if ($id_offerta == $check->Id_Offerta) {
                return json_encode("offerta-posseduta");
            }
        }

        // Creazione del coupon effettivo.

        $coupon = new Coupon;
        $coupon->UsernameUtente = $user->username;
        $coupon->Id_Offerta = $id_offerta;
        $coupon->Id_Coupon = $randomString;
        $coupon->save();


        return json_encode($coupon->Id_Coupon);
    }

    public function riepilogo() {
        $user = Auth::user();
        $coupons = Coupon::where('UsernameUtente', $user->username)->get();
        return view('sezione-clienti/riepilogo-acquisti')->with('coupons', $coupons);
    }

    public function show() {

        $user = Auth::user();
        return view('sezione-clienti/profilo-cliente')->with('user', $user);
    }

    /*  public function invia(Request $request)
      {

      } */
    public function showCouponGenerato($Id_Coupon)
    {
        $user = auth()->user();
        $coupon = Coupon::where('Id_Coupon', $Id_Coupon)
            ->where('UsernameUtente', $user->username)
            ->first();

        return view('sezione-clienti/coupon-generato')->with([
            'user' => $user,
            'coupon' => $coupon
        ]);
    }






}
