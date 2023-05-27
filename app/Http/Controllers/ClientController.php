<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\QueryException;
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
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $randomString = substr(str_shuffle($characters), 0, 10);
        $user = Auth::user();
        $check = Coupon::where('Id_Offerta', $id_offerta)->first();
        if($check)
            if ($id_offerta == $check->Id_Offerta)
                return redirect()->back()->withErrors(["error" => "Hai già acquistato questa offerta"]);
        //try {
        $coupon = new Coupon;
        $coupon->UsernameUtente = $user->username;
        $coupon->Id_Offerta = $id_offerta;
        $coupon->Id_Coupon = $randomString;
        $coupon->save();
        /*}
        catch (QueryException $e) {
            return redirect()->back()->withErrors(["error" => $e->getMessage()]);
        }*/
        return redirect()->back()->with('success', "L'acquisto è avvenuto con successo");
    }

    public function  riepilogo() {
        $user=Auth::user();
        $coupons=Coupon::where('UsernameUtente', $user->username)->get();
        return view('sezione-clienti/riepilogo-acquisti')->with('coupons', $coupons);
    }

    public function show()
    {

        $user=Auth::user();
        return view('sezione-clienti/profilo-cliente')->with('user', $user);
    }

  /*  public function invia(Request $request)
    {

    } */

}
