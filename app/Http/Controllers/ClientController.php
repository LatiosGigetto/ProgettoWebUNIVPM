<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Coupon;
use App\Models\User;

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
        $coupon->Id_Coupon = mt_rand(1, 10);
        $coupon->save();
        return to_route("dettagli-offerta", [$id_offerta]);
    }

    public function  riepilogo() {
        $user=Auth::user();
        $coupons=Coupon::where('UsernameUtente',$user->username)->get();
        return view('sezione-clienti/riepilogo-acquisti')->with('coupons',$coupons);
    }

    public function show()
    {

        $user=Auth::user();
        return view('sezione-clienti/profilo-cliente')->with('user', $user);
    }



}
