<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ChangePasswordController extends Controller
{
    public function create() {
        return view('auth.cambio-password');
    }

    public function store(Request $request) {
        $request->validate([
            'current_password' => 'required',
            'password' => ['required', 'max:255', Rules\Password::defaults()],
        ]);

        $user = Auth::user();

        if (Hash::check($request->current_password, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->back()->with('success', 'Password cambiata con successo!');
        }

        return redirect()->back()->withErrors(['current_password' => 'La password corrente non è corretta.']);
    }
}
