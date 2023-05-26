<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\GestoriAziende;
use App\Models\Offerta;

class StaffController extends Controller {

    protected $currentStaff;
    protected $currentAziende;
    protected $currentOfferte;

    // Auth::user() ritorna null se si trova nel costruttore del Controller
    // quindi si sposta il costruttore in un metodo custom da far runnare
    // prima di ogni metodo.

    public function setup() {
        
        $this->currentStaff = Auth::user()->username;
        $this->currentAziende = GestoriAziende::where('UsernameUtente', $this->currentStaff)
                ->pluck('Id_Azienda');
        $this->currentOfferte = Offerta::whereIn('id_Azienda', $this->currentAziende)
                ->get()->toArray();
        return;
        
    }
    
    public function showGestioneOfferta() {
        
        $this->setup();
        
        return view ('sezione-staff/gestione-promozioni')->with('offerte', $this->currentOfferte);
        
    }
    
    // Crea una nuova Offerta dalla Request.

    public function createOfferta(Request $request) {

        $this->setup();
        
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

    // Modifica l'offerta passata nella Request
    
    public function modifyOfferta(Request $request) {

        $this->setup();
        
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

    // Elimina l'offerta nella Request.
    
    public function deleteOfferta(Request $request) {

        $this->setup();
        
        $offerta = Offerta::where('id_Offerta', $request->idOfferta)->first();

        $offerta->delete();

        return redirect('gestione-promozioni');

    }

}
