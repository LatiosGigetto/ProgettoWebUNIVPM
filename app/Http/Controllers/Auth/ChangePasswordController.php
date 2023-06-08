<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ChangePasswordController extends Controller
{
    public function create() {
        return view('auth/cambio-password');
    }

    public function store(Request $request) {
        $request->validate([
            'vecchia_password' => 'required',
            'nuova_password' => ['required', 'max:255', Password::defaults()],
        ]);

        $user = Auth::user();
        //Hash serve per criptografare le password
        if (Hash::check($request->vecchia_password, $user->password)) {
            $user->password = Hash::make($request->nuova_password);
            $user->save();

            return redirect()->back()->with('success', 'Hai cambiato la passsword con successo!');
        }

        return redirect()->back()->withErrors(['vecchia_password' => 'La vecchia password non è corretta.']);
    }
}
