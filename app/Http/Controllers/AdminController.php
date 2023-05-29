<?php

namespace App\Http\Controllers;

use App\Models\Azienda;
use App\Models\FAQ;
use App\Models\GestoriAziende;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller {

    protected $listaAziende;
    protected $listaUtenti;
    protected $listaStaff;
    protected $listaFaq;
    protected $listaAssegnamenti;


    public function setup() {

        // carico nel costuttore la lista di tuple che devo manipolare
        $this->listaAziende = Azienda::paginate(5);
        $this->listaUtenti = User::getUtenti();
        $this->listaStaff = User::getStaff();
        $this->listaFaq = FAQ::all();
        $this->listaAssegnamenti = GestoriAziende::all();
    }

    // metodi per gestire il contenuto di aziende
    public function showGestioneAziende() {
        $this->setup();
        return view('sezione-admin/gestione-aziende')
                        ->with([
                            'aziende' => $this->listaAziende,
                            'azione' => 'view'
        ]);
    }

    public function showModifyAzienda($id) {
        //$this->setup();
        return view('sezione-admin/gestione-aziende')
                        ->with([
                            'aziendaSel' => Azienda::find($id),
                            'azione' => 'mod'
        ]);
    }

    public function showCreaAzienda() {
        return view('sezione-admin/gestione-aziende')
                        ->with([
                            'azione' => 'create'
        ]);
    }

    //CRUD Aziende
    public function createAzienda(Request $request) {

        $request->validate([
            'nomeazienda' => ['required', 'unique:azienda','string', 'max:30'],
            'logo' => ['required', 'file', 'mimes:png,jpg,jpeg', 'max:64'],
            'sede' => ['required', 'string', 'max:30'],
            'descrizione' => ['required', 'string', 'max:999'],
            'categoria' => ['required', 'string', 'max:30'],
        ]);
        $azienda = new Azienda();
        $azienda->NomeAzienda = $request->nomeazienda;
        $azienda->Logo = $request->file('logo')->openFile()
                ->fread($request->file('logo')->getSize());
        $azienda->Sede = $request->sede;
        $azienda->Descrizione = $request->descrizione;
        $azienda->Categoria = $request->categoria;
        $azienda->Id_Azienda = $request->idAzienda;
        $azienda->save();
        return redirect('gestione-aziende')
                        ->with([
                            'azione' => 'view',
                            'success' => 'Azienda creata con successo'
        ]);
    }

    public function modifyAzienda(Request $request) {

        $request->validate([
            'nomeazienda' => ['required', 'string', 'max:30'],
            'logo' => ['required', 'file', 'mimes:png,jpg,jpeg', 'max:64'],
            'sede' => ['required', 'string', 'max:30'],
            'descrizione' => ['required', 'string'],
            'categoria' => ['required', 'string', 'max:30'],
        ]);
        $azienda = Azienda::find($request->idAzienda);
        $azienda->NomeAzienda = $request->nomeazienda;
        $azienda->Logo = $request->file('logo')->openFile()
                ->fread($request->file('logo')->getSize());
        $azienda->Sede = $request->sede;
        $azienda->Descrizione = $request->descrizione;
        $azienda->Categoria = $request->categoria;
        $azienda->save();
        return redirect('gestione-aziende')
                        ->with([
                            'azione' => 'view',
                            'success' => 'Azienda modificata con successo'
        ]);
    }

    public function deleteAzienda($idAzienda) {
        $this->setup();
        $this->listaAziende = Azienda::destroy($idAzienda);
        return redirect('gestione-aziende')->with([
                    'azione' => 'view',
                    'success' => 'Azienda eliminata con successo'
        ]);
    }

    // metodi per la gestione del contenuto staff
    public function showGestioneStaff() {
        $this->setup();
        return view('sezione-admin/gestione-membristaff')
                        ->with([
                            'staff' => $this->listaStaff,
                            'azione' => 'view'
        ]);
    }

    public function showModifyStaff($username) {
        return view('sezione-admin/gestione-membristaff')
                        ->with([
                            'staffSel' => User::find($username),
                            'azione' => 'mod'
        ]);
    }

    public function showCreaStaff() {
        return view('sezione-admin/gestione-membristaff')
                        ->with([
                            'azione' => 'create'
        ]);
    }

    //CRUD Staff
    public function createStaff(Request $request) {
        $request->validate([
            'nome' => ['required', 'string', 'max:30'],
            'cognome' => ['required', 'string', 'max:30'],
            'mail' => ['required', 'string', 'email', 'max:30'],
            'username' => ['required', 'string', 'unique:utente', 'max:30'],
            'password' => ['required', 'max:255', Rules\Password::defaults()],
            'telefono' => ['required', 'string', 'max:10'],
            'età' => ['required', 'integer', 'max:999'],
        ]);
        $user = new User();
        $user->Nome = $request->nome;
        $user->Cognome = $request->cognome;
        $user->Mail = $request->mail;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->Telefono = $request->telefono;
        $user->Età = $request->età;
        $user->Genere = $request->genere;
        $user->Livello = 2;
        $user->save();
        event(new Registered($user));
        return redirect('gestione-membristaff')
                        ->with('azione', 'view');
    }

    public function modifyStaff(Request $request) {
        $request->validate([
            'nome' => ['required', 'string', 'max:30'],
            'cognome' => ['required', 'string', 'max:30'],
            'età' => ['required', 'integer', 'max:999'],
            'telefono' => ['required', 'string', 'max:10'],
            'mail' => ['required', 'string', 'email', 'max:30'],
        ]);

        $staff = User::find($request->username);
        $staff->Nome = $request->nome;
        $staff->Cognome = $request->cognome;
        $staff->Età = $request->età;
        $staff->Telefono = $request->telefono;
        $staff->Mail = $request->mail;
        $staff->Genere = $request->genere;
        $staff->save();
        return redirect('gestione-membristaff')
                        ->with([
                            'azione' => 'view'
        ]);
    }

    public function deleteStaff($username) {
        $this->setup();
        $this->listaStaff = User::destroy($username);
        return redirect('gestione-membristaff')
                        ->with('azione', 'view');
    }

    // metodi per la gestione di faq
    public function showGestioneFaq() {
        $this->setup();
        return view('sezione-admin/gestione-faq')
                        ->with(['faq' => $this->listaFaq,
                            'azione' => 'view',
        ]);
    }

    public function showModifyFaq($id) {
        return view('sezione-admin/gestione-faq')
                        ->with([
                            'faqSel' => FAQ::find($id),
                            'azione' => 'mod'
        ]);
    }

    public function showCreaFaq() {
        return view('sezione-admin/gestione-faq')
                        ->with([
                            'azione' => 'create'
        ]);
    }

    // CRUD Faq
    public function createFaq(Request $request) {
        $request->validate([
            'domanda' => ['required', 'string'],
            'risposta' => ['required', 'string'],
        ]);
        $faq = new FAQ();
        $faq->Domanda = $request->domanda;
        $faq->Risposta = $request->risposta;
        $faq->save();
        return redirect('gestione-faq')
                        ->with([
                            'azione' => 'view'
        ]);
    }

    public function modifyFaq(Request $request) {

        $request->validate([
            'domanda' => ['required', 'string', 'max:100'],
            'risposta' => ['required', 'string', 'max:999'],
        ]);
        $faq = FAQ::find($request->id_domanda);
        $faq->Domanda = $request->domanda;
        $faq->Risposta = $request->risposta;
        $faq->save();
        return redirect('gestione-faq')
                        ->with([
                            'azione' => 'view'
        ]);
    }

    public function deleteFaq($idFaq) {
        $this->setup();
        $this->listaFaq = FAQ::destroy($idFaq);
        return redirect('gestione-faq')
                        ->with('azione', 'view');
    }

    // metodo per la gestione di eliminazioni utenti
    public function showGestioneUtenti() {
        $this->setup();
        return view('sezione-admin/eliminazione-utenti')
                        ->with('utenti', $this->listaUtenti);
    }

    // eliminazione utenti
    public function deleteUtenti(Request $request) {
        $user = User::where('Username', $request->username)->first();
        $user->delete();
        return redirect('eliminazione-utenti');
    }

    //Stats
    public function numeroCoupon() {
        return DB::table('coupon')->count();
    }

    public function numeroCouponPromozione(Request $request) {
        return DB::table('coupon')->where('Id_Offerta', $request->id_offerta)->count();
    }

    public function numeroCouponUser(Request $request) {
        return DB::table('coupon')->where('UsernameUtente', $request->username)->count();
    }

    // metodo per la gestione degli asssegnamenti
    public function showGestioneAssegnamento() {
        $this->setup();

        return view('sezione-admin/gestione-assegnamento-aziende')
                        ->with(['aziendeAssegnate' => $this->listaAssegnamenti,
                            'azione' => 'view'
        ]);
    }

    public function showModifyAssegnamento($id) {
        $this->setup();
        return view('sezione-admin/gestione-assegnamento-aziende')
                        ->with([
                            'listaAziende' => Azienda::pluck('NomeAzienda', 'Id_Azienda'),
                            'listastaff' => $this->listaStaff->pluck('username', 'username'),
                            'assegnamentoSel' => GestoriAziende::find($id),
                            'azione' => 'mod'
        ]);
    }
    public function showCreaAssegnamento() {
        $this->setup();
        return view('sezione-admin/gestione-assegnamento-aziende')
            ->with([
                'listaAziende' => Azienda::pluck('NomeAzienda', 'Id_Azienda'),
                'listastaff' => $this->listaStaff->pluck('username', 'username'),
                'azione' => 'create'
            ]);
    }

    // CRUD Assegnamento
    public function modifyAssegnamento(Request $request) {

        // query che cerca l'istanza
        $assegnamento = GestoriAziende::where(
            'Id_Azienda', $request->nomeAzienda)
            ->where('UsernameUtente', $request->usernameStaff)->first();

        // check if alreay exist
        if($assegnamento == null){
            $assegnamento = GestoriAziende::find($request->id);
            $assegnamento->UsernameUtente = $request->usernameStaff;
            $assegnamento->Id_Azienda = $request->nomeAzienda;
            $assegnamento->save();
        return redirect('gestione-assegnamento-aziende')
            ->with([
                'azione' => 'view'
            ]);
        }
        else{
            return redirect()->back()->withErrors(['erroreAss' =>"L'assegnamento è già esistente per questa coppia"]);
        }
    }
    public function deleteAssegnamento(Request $request) {
        $assegnamento = GestoriAziende::find($request->id);

        $assegnamento->delete();
        return redirect('gestione-assegnamento-aziende');
    }

    public function createAssegnamento(Request $request) {

        $assegnamento = GestoriAziende::where(
            'Id_Azienda', $request->nomeAzienda)
            ->where('UsernameUtente', $request->nomestaff)->first();
        if($assegnamento == null) {
            $assegnamento = new GestoriAziende();
            $assegnamento->UsernameUtente = $request->nomestaff;
            $assegnamento->Id_Azienda = $request->nomeAzienda;
            $assegnamento->save();
            return redirect('gestione-assegnamento-aziende')
                ->with([
                    'azione' => 'view'
                ]);
        }
        else{
                return redirect()->back()->withErrors(['erroreAss' =>"L'assegnamento è già esistente per questa coppia"]);
            }
        }

}

