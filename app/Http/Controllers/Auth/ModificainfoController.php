<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;




class ModificainfoController extends Controller
{
    /*
    public function __construct()
    {
        $this->middleware('auth');
    }
    */

    public function  create(){
        return view('auth.modifica-info');
    }

    public function store(Request $request)
    {
        //TODO missing validate

        $user = Auth::user();
        // Modifica delle informazioni dell'utente
        //TODO cosi if da sistemare

        $user->Nome = $request->input('nome');
        $user->Cognome = $request->input('cognome');
        $user->Mail = $request->input('mail');
        $user->username = $request->input('username');
        $user->Telefono = $request->input('telefono');
        $user->Età = $request->input('età');
        $user->Genere = $request->input('genere');
        $user->save();

        return redirect()->back()->with('success', 'Informazioni modificate con successo!');
    }

}
