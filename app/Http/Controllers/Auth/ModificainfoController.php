<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModificainfoController extends Controller {
    /*
      public function __construct()
      {
      $this->middleware('auth');
      }
     */

    public function create() {
        return view('auth.modifica-info');
    }

    public function store(Request $request) {
        $request->validate([
            'nome' => ['nullable', 'string', 'max:30'],
            'cognome' => ['nullable', 'string', 'max:30'],
            'email' => ['nullable', 'string', 'email', 'max:30'],
            //'username' => ['string', 'unique:utente', 'max:30'],
            'telefono' => ['nullable', 'string', 'max:10'],
            'età' => ['nullable', 'integer', 'max:999']
        ]);

        $user = Auth::user();
        // Modifica delle informazioni dell'utente

        if ($request->input('nome') != null) {
            $user->Nome = $request->input('nome');
        }
        if ($request->input('cognome') != null) {
            $user->Cognome = $request->input('cognome');
        }
        if ($request->input('mail') != null) {
            $user->Mail = $request->input('mail');
        }
       /* if ($request->input('username') != null) {
            $user->username = $request->input('username');
        } */
        if ($request->input('telefono') != null) {
            $user->Telefono = $request->input('telefono');
        }
        if ($request->input('età') != null) {
            $user->Età = $request->input('età');
        }
        if ($request->input('genere') != null) {
            $user->Genere = $request->input('genere');
        }
        $user->save();

        return redirect()->back()->with('success', 'Informazioni modificate con successo!');
    }

}
