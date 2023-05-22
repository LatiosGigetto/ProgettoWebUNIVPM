<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller {

    /**
     * Chiama la vista
     *
     * 
     */
    public function create() {
        return view('auth.registrazione');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request) {   
    
    // definisco le regole per i parametri
        
        $request->validate([
            'nome' => ['required', 'string', 'max:30'],
            'cognome' => ['required', 'string', 'max:30'],
            'email' => ['required', 'string', 'email', 'max:30'],
            'username' => ['required', 'string', 'unique:utente', 'max:30'],
            'password' => ['required', 'max:255', Rules\Password::defaults()],
            'telefono' => ['required', 'string', 'max:10'],
            'età' => ['required', 'integer', 'max:999']
        ]);

        $user = User::create([
                    'Nome' => $request->nome,
                    'Cognome' => $request->cognome,
                    'Mail' => $request->email,
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                    'Telefono' => $request->telefono,
                    'Età' => $request->età,
                    'Genere' => $request->genere
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

}
