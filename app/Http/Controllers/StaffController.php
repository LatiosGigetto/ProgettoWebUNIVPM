<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\GestoriAziende;
use App\Models\Offerta;
use App\Models\Azienda;

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
                        ->pluck('Id_Azienda', 'Id_Azienda')->toArray();
        $this->currentOfferte = Offerta::whereIn('id_Azienda', $this->currentAziende);
        return;
    }

    public function showGestioneOfferta() {

        $this->setup();

        return view('sezione-staff/gestione-promozioni')
                        ->with([
                            'offerte' => $this->currentOfferte->paginate(5),
                            'azione' => 'view'
        ]);
    }

    public function showModificaOfferta($id) {

        $this->setup();

        //Preparo la lista delle aziende che il membro dello Staff può gestire

        $listaAziende = Azienda::whereIn('Id_Azienda', $this->currentAziende)
                ->pluck('NomeAzienda', 'Id_Azienda');

        $offerta = Offerta::find($id);

        if ($offerta != null) {

            return view('sezione-staff/gestione-promozioni')
                            ->with([
                                'listaAziende' => $listaAziende,
                                'azione' => 'mod',
                                'offertaSel' => Offerta::find($id)
            ]);
        } else {

            return redirect('gestione-promozioni')->withErrors([
                        "offerta-non-trovata" => "Offerta non trovata, qualcosa è andato storto"
            ]);
        }
    }

    public function showCreaOfferta() {

        $this->setup();

        $listaAziende = Azienda::whereIn('Id_Azienda', $this->currentAziende)
                ->pluck('NomeAzienda', 'Id_Azienda');

        return view('sezione-staff/gestione-promozioni')
                        ->with([
                            'listaAziende' => $listaAziende,
                            'azione' => 'create'
        ]);
    }

    // Crea una nuova Offerta dalla Request.

    public function createOfferta(Request $request) {

        $this->setup();

        $request->validate([
            'luogo' => ['required', 'string', 'max:30'],
            'oggetto' => ['required', 'string', 'max:99'],
            'descrizione' => ['required', 'string', 'max:999'],
            'validità' => ['required', 'date'],
        ]);

        Offerta::create([
            'Luogo' => $request->luogo,
            'Oggetto' => $request->oggetto,
            'Descrizione' => $request->descrizione,
            'Validità' => $request->validità,
            'Id_Azienda' => $request->azienda
        ]);

        return redirect('gestione-promozioni')->with([
                    'azione' => 'view',
                    'success' => 'Offerta creata con successo'
        ]);
    }

    // Modifica l'offerta passata nella Request

    public function modifyOfferta(Request $request) {

        $this->setup();

        $request->validate([
            'luogo' => ['required', 'string', 'max:30'],
            'oggetto' => ['required', 'string', 'max:99'],
            'descrizione' => ['required', 'string', 'max:999'],
            'validità' => ['required', 'date'],
        ]);

        $offerta = Offerta::find($request->idOfferta);

        $offerta->Luogo = $request->luogo;
        $offerta->Oggetto = $request->oggetto;
        $offerta->Descrizione = $request->descrizione;
        $offerta->Validità = $request->validità;
        $offerta->Id_Azienda = $request->azienda;

        $offerta->save();

        return redirect('gestione-promozioni')->with([
                    'azione' => 'view',
                    'success' => 'Offerta modificata con successo'
        ]);
    }

    // Elimina l'offerta con l'ID fornito.

    public function deleteOfferta($idOff) {

        $this->setup();

        if ($offerta = Offerta::destroy($idOff)) {

            return redirect('gestione-promozioni')->with([
                        'azione' => 'view',
                        'success' => 'Offerta eliminata con successo'
            ]);
        } else {

            return redirect('gestione-promozioni')->withErrors(["offerta-non-trovta" => "Qualcosa è andato storto. L'offerta non è stata trovata"]);
        }
    }

}
