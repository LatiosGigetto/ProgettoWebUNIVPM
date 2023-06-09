<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModificainfoController extends Controller {
    public function create() {
        $user = Auth::user(); // Ottieni l'utente corrente autenticato
        return view('auth/modifica-info', ['user' => $user]);
    }

    public function store(Request $request) {
        $request->validate([
            'nome' => ['nullable', 'string', 'max:30'],
            'cognome' => ['nullable', 'string', 'max:30'],
            'email' => ['nullable', 'string', 'email', 'max:30'],
            'telefono' => ['nullable', 'string', 'max:10', 'regex:/^[0-9]+$/'],
            'età' => ['nullable', 'integer', 'min:13', 'max:200']
        ]);

        $user = Auth::user();
        // Modifica delle informazioni dell'utente

        if ($request->input('nome') != null) {
            $user->Nome = $request->input('nome');
        }
        if ($request->input('cognome') != null) {
            $user->Cognome = $request->input('cognome');
        }
        if ($request->input('email') != null) {
            $user->Mail = $request->input('email');
        }
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

        return redirect()->back()->with('success', 'Hai modificato le tue informazioni con successo!');
    }

}
