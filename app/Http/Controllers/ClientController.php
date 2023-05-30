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
        $randomstring = "";

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

            return redirect()->back()->withErrors(["error" => "Non puoi ottenere Coupon con account Staff o Amministratore"]);
        }

        $check = Coupon::where('Id_Offerta', $id_offerta)->first();
        if ($check) {
            if ($id_offerta == $check->Id_Offerta) {
                return redirect()->back()
                        ->withErrors(["error" => "Hai già un coupon per questa offerta!"]);
            }
        }

        // Creazione del coupon effettivo.

        $coupon = new Coupon;
        $coupon->UsernameUtente = $user->username;
        $coupon->Id_Offerta = $id_offerta;
        $coupon->Id_Coupon = $randomString;
        $coupon->save();


        return redirect()->back()->with('success', "L'acquisto è avvenuto con successo");
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
        $usernameUtente = auth()->user()->username;
        $coupon = Coupon::where('Id_Coupon', $Id_Coupon)
            ->where('UsernameUtente', $usernameUtente)
            ->first();

        return view('sezione-clienti/coupon-generato', compact('coupon'));
    }






}
