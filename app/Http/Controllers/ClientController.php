<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use App\Models\Coupon;
use App\Models\User;

class ClientController extends Controller {

    //TODO: questo controller è da eliminare perché non viene usato (presumo)
//    public function __construct() {
//        $this->coupon = new Coupon;
//    }

    public function acquista($id_offerta) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $generato = false;

        // Controlla che non ci sia un coupon con ID uguale.

        while (!$generato) {
            //  Generazione di una stringa casuale:
            //  str_shuffle scambia l'ordine della stringa $characters in maniera casuale,
            //  mentre substr seleziona i primi dieci caratteri (offset dice da quale carattere partire e
            //  lenght dice quanti caratteri prendere)
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
            return json_encode("offerta-posseduta");
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
        //uso il find perchè l'Id è chiave primaria
        $coupon = Coupon::find($Id_Coupon);


        return view('sezione-clienti/coupon-generato')->with([
            'user' => $user,
            'coupon' => $coupon
        ]);
    }






}
