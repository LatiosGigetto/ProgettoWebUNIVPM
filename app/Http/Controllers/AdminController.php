<?php

namespace App\Http\Controllers;

use App\Models\Azienda;
use App\Models\FAQ;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller{

    protected $admin;
    protected $listaAziende;
    protected $listaUtenti;
    protected $listaStaff;

    //CRUD Aziende
    public function createAzienda(Request $request) {
        $request->validate([
            'nomeazienda' => ['required', 'string', 'max:30'],
            'logo' => ['required', 'image|mimes:jpeg,png'], //TODO da decidere dim massime per l'immagine
            'sede' => ['required', 'string', 'max:30'],
            'descrizione' => ['required', 'text'],
            'categoria' => ['required', 'string', 'max:30'],
        ]);
        $azienda = new Azienda();
        $azienda->NomeAzienda = $request->nomeazienda;
        $azienda->Logo = $request->logo;
        $azienda->Sede = $request->sede;
        $azienda->Descrizione = $request->descrizione;
        $azienda->Categoria = $request->categoria;
        $azienda->Id_Azienda = $request->idAzienda;
        $azienda->save();
        return redirect('gestione-aziende');
    }
    public function modifyAzienda(Request $request) {

        $request->validate([
            'nomeazienda' => ['required', 'string', 'max:30'],
            'logo' => ['required', 'image|mimes:jpeg,png'],
            'sede' => ['required', 'string', 'max:30'],
            'descrizione' => ['required', 'text'],
            'categoria' => ['required', 'string', 'max:30'],
        ]);
        $azienda = Azienda::where('id_Azienda', $request->idAzienda)->first(); //first prende il primo record dalla tabella e in particolare il primo id
        $azienda->NomeAzienda = $request->nomeazienda;
        $azienda->Logo = $request->logo;
        $azienda->Sede = $request->sede;
        $azienda->Descrizione = $request->descrizione;
        $azienda->Categoria = $request->categoria;
        $azienda->save();
        return redirect('gestione-aziende');
    }
    public function deleteAzienda(Request $request) {
        $azienda = Azienda::where('id_Azienda', $request->idAzienda)->first();
        $azienda->delete();
        return redirect('gestione-aziende');
    }
    //CRUD Staff
    public function deleteUtente(Request $request) {
        $utente = User::where('username', $request->username)->first();
        $utente->delete();
        return redirect('eliminazione-utenti');
    }
    public function createStaff(Request $request) {
        $request->validate([
            'nome' => ['required', 'string', 'max:30'],
            'cognome' => ['required', 'string', 'max:30'],
            'email' => ['required', 'string', 'email', 'max:30'],
            'username' => ['required', 'string', 'unique:utente', 'max:30'],
            'password' => ['required', 'max:255', Rules\Password::defaults()],
            'telefono' => ['required', 'string', 'max:10'],
            'età' => ['required', 'integer', 'max:999'],
            'livello' => ['required', 'in:2']
        ]);
        $user = User::create([
            'Nome' => $request->nome,
            'Cognome' => $request->cognome,
            'Mail' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'Telefono' => $request->telefono,
            'Età' => $request->età,
            'Genere' => $request->genere,
            'Livello' => $request->livello,
        ]);
        event(new Registered($user));
        return redirect('gestione-membristaff');
    }
    public function modifyStaff(Request $request) {
        $request->validate([
            'nome' => ['required', 'string', 'max:30'],
            'cognome' => ['required', 'string', 'max:30'],
            'email' => ['required', 'string', 'email', 'max:30'],
            'telefono' => ['required', 'string', 'max:10'],
            'età' => ['required', 'integer', 'max:999'],
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
    public function deleteStaff(Request $request) {
        $user = User::where('Username', $request->username)->first();
        $user->delete();
        return redirect('gestione-membristaff');
    }
    //Stats
    public function numeroCoupon(){
        return DB::table('coupon')->count();
    }
    public function numeroCouponPromozione(Request $request){
        return DB::table('coupon')->where('Id_Offerta',$request->id_offerta)->count();
    }
    public function numeroCouponUser(Request $request){
        return DB::table('coupon')->where('UsernameUtente',$request->username)->count();
    }
    //CRUD Faq
    public function creaFaq(Request $request){
        $request->validate([
            'id_domanda' => ['required', 'integer'],
            'domanda' => ['required', 'string'],
            'risposta' => ['required', 'string'],
        ]);
        $faq = new FAQ();
        $faq->Id_Domanda = $request->id_domanda;
        $faq->Domanda = $request->domanda;
        $faq->Risposta = $request->risposta;
        $faq->save();
        return redirect('gestione-faq');
    }
    public function modifyFaq(Request $request) {
        $request->validate([
            'id_domanda' => ['required', 'integer'],
            'domanda' => ['required', 'string'],
            'risposta' => ['required', 'string'],
        ]);
        $faq = Azienda::where('Id_Domanda', $request->id_domanda)->first(); //first prende il primo record dalla tabella e in particolare il primo id
        $faq->Id_Domanda = $request->id_domanda;
        $faq->Domanda = $request->domanda;
        $faq->Risposta = $request->risposta;
        $faq->save();
        return redirect('gestione-faq');
    }
    public function deleteFaq(Request $request) {
        $faq = Azienda::where('Id_Domanda', $request->id_domanda)->first();
        $faq->delete();
        return redirect('gestione-faq');
    }
    //metodi per visualizzare il contenuto
    public function getListaAziende(){
        $aziende = Azienda::all();
        return view('sezione-admin/gestione-aziende')->with('aziende', $aziende);
    }
    public function getListaStaff(){
        $staff = User::where('Livello', 2)->get();
        return view('sezione-admin/gestione-membristaff')->with('staff', $staff);
    }
    public function getListaUtenti(){
        $utenti = User::where('Livello', 1)->get();
        return view('sezione-admin/eliminazione-utenti')->with('utenti', $utenti);
    }
    public function getFaq(){
        $faq = FAQ::all();
        return view('sezione-admin/gestione-faq')->with('faq', $faq);
    }



}
