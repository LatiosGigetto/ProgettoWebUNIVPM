<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\GestoriAziende;
use App\Models\Offerta;

class StaffController extends Controller {

    protected $currentStaff;
    protected $currentAziende;

    public function __construct() {

        $this->currentStaff = Auth::user();
        $this->currentAziende = GestoriAziende::where('UsernameUtente', $this->currentStaff->username)
                ->pluck('Id_Azienda');
    }

    // Creates new Offerta from given request.

    public function createOfferta(Request $request) {

        $request->validate([
            'luogo' => ['required', 'string', 'max:30'],
            'descrizione' => ['required', 'string', 'max:999'],
            'validità' => ['required', 'date'],
        ]);

        $offerta = new Offerta;

        $offerta->Luogo = $request->luogo;
        $offerta->Descrizione = $request->descrizione;
        $offerta->Validità = $request->validità;
        $offerta->Id_Azienda = $request->idAzienda;
        $offerta->save();

        return redirect('gestione-promozioni');
    }

    public function modifyOfferta(Request $request) {

        $request->validate([
            'luogo' => ['required', 'string', 'max:30'],
            'descrizione' => ['required', 'string', 'max:999'],
            'validità' => ['required', 'date'],
        ]);

        $offerta = Offerta::where('id_Offerta', $request->idOfferta)->first();

        $offerta->Luogo = $request->luogo;
        $offerta->Descrizione = $request->descrizione;
        $offerta->Validità = $request->validità;
        $offerta->Id_Azienda = $request->idAzienda;
        $offerta->save();

        return redirect('gestione-promozioni');

    }

    public function deleteOfferta(Request $request) {

        $offerta = Offerta::where('id_Offerta', $request->idOfferta)->first();

        $offerta->delete();

        return redirect('gestione-promozioni');

    }

}
