<?php

namespace App\Http\Controllers;

use App\Models\Azienda;
use App\Models\FAQ;
use App\Models\GestoriAziende;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Models\User;
use App\Models\Offerta;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    protected $listaAziende;
    protected $listaUtenti;
    protected $listaStaff;
    protected $listaFaq;
    protected $listaAssegnamenti;
    protected $listaOfferte;

    // Auth::user() ritorna null se si trova nel costruttore del Controller
    // quindi si sposta il costruttore in un metodo custom da far runnare
    // carico nel costuttore la lista di tuple che devo manipolare
    public function setup()
    {
        $this->listaAziende = Azienda::paginate(5);
        $this->listaUtenti = User::getUtenti();
        $this->listaStaff = User::getStaff();
        $this->listaFaq = FAQ::all();
        $this->listaAssegnamenti = GestoriAziende::all();
        $this->listaOfferte = Offerta::all();
    }

    // metodi per gestire il contenuto di aziende

    // azione=>view fa entrare nello switch
    // passo alla vista la lista delle aziende come aziende
    public function showGestioneAziende()
    {
        $this->setup();
        return view('sezione-admin/gestione-aziende')
            ->with([
                'aziende' => $this->listaAziende,
                'azione' => 'view'
            ]);
    }

    // azione=>mod fa entrare nello switch
    // find cerca i record nella tabella su base primary key
    public function showModifyAzienda($id)
    {
        return view('sezione-admin/gestione-aziende')
            ->with([
                'aziendaSel' => Azienda::find($id),
                'azione' => 'mod'
            ]);
    }

    // azione=>create fa entrare nello switch
    public function showCreaAzienda()
    {
        return view('sezione-admin/gestione-aziende')
            ->with([
                'azione' => 'create'
            ]);
    }

    //CRUD Aziende

    // ->file() rappresenta l'istanza del file caricato
    // ->fread()legge il file e restituisce una stringa del file caricato
    public function createAzienda(Request $request)
    {

        $request->validate([
            'nomeazienda' => ['required', 'unique:azienda', 'string', 'max:30'],
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

    public function modifyAzienda(Request $request)
    {

        $azienda = Azienda::find($request->idAzienda);

        // Controllo se il nome dell'azienda è cambiato per decidere se inserire
        // la validazione unique o meno.

        if ($azienda->NomeAzienda != $request->nomeazienda) {

            $request->validate([
                'nomeazienda' => ['required', 'unique:azienda', 'string', 'max:30'],
                'logo' => ['file', 'mimes:png,jpg,jpeg', 'max:64'],
                'sede' => ['required', 'string', 'max:30'],
                'descrizione' => ['required', 'string', 'max:999'],
                'categoria' => ['required', 'string', 'max:30'],
            ]);

        } else {

            $request->validate([
                'nomeazienda' => ['required', 'string', 'max:30'],
                'logo' => ['nullable', 'file', 'mimes:png,jpg,jpeg', 'max:64'],
                'sede' => ['required', 'string', 'max:30'],
                'descrizione' => ['required', 'string', 'max:999'],
                'categoria' => ['required', 'string', 'max:30'],
            ]);

        }

        $azienda->NomeAzienda = $request->nomeazienda;

        // Cambio il logo solo se l'utente ne ha inserito uno nuovo

        if ($request->hasFile('logo')) {
        $azienda->Logo = $request->file('logo')->openFile()
            ->fread($request->file('logo')->getSize());
        }
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

    // destroy() distrugge l'istanza selezionata
    public function deleteAzienda($idAzienda)
    {
        $this->setup();
        $this->listaAziende = Azienda::destroy($idAzienda);
        return redirect('gestione-aziende')->with([
            'azione' => 'view',
            'success' => 'Azienda eliminata con successo'
        ]);
    }

    // metodi per la gestione del contenuto staff

    // azione=>view fa entrare nello switch
    // passo alla vista la lista dello staff come staff
    public function showGestioneStaff()
    {
        $this->setup();
        return view('sezione-admin/gestione-membristaff')
            ->with([
                'staff' => $this->listaStaff,
                'azione' => 'view'
            ]);
    }

    // azione=>mod fa entrare nello switch
    // find cerca i record nella tabella su base primary key
    public function showModifyStaff($username)
    {
        return view('sezione-admin/gestione-membristaff')
            ->with([
                'staffSel' => User::find($username),
                'azione' => 'mod'
            ]);
    }

    // azione=>create fa entrare nello switch
    // pluck restituisce un array di valori in base all'attributo selezionato
    public function showCreaStaff()
    {
        return view('sezione-admin/gestione-membristaff')
            ->with([
                'azione' => 'create',
                'listaAziende' => Azienda::pluck('NomeAzienda', 'Id_Azienda')
            ]);
    }

    //CRUD Staff
    public function createStaff(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'string', 'max:30', 'alpha:ascii'],
            'cognome' => ['required', 'string', 'max:30', 'alpha:ascii'],
            'email' => ['required', 'string', 'email', 'max:30'],
            'username' => ['required', 'string', 'unique:utente', 'max:30'],
            'password' => ['required', 'max:255', Rules\Password::defaults()],
            'telefono' => ['required', 'string', 'max:10', 'regex:/^[0-9]+$/'],
            'età' => ['required', 'integer', 'min:12', 'max:200'],
        ]);
        $user = new User();
        $user->Nome = $request->nome;
        $user->Cognome = $request->cognome;
        $user->Mail = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->Telefono = $request->telefono;
        $user->Età = $request->età;
        $user->Genere = $request->genere;
        $user->Livello = 2;
        $user->save();

        // Creo il primo assegnamento all'Azienda del membro dello Staff

        $primaAzienda = new GestoriAziende();
        $primaAzienda->UsernameUtente = $request->username;
        $primaAzienda->Id_Azienda = $request->azienda;
        $primaAzienda->save();

        //  event(new Registered($user));     Non credo serva a niente
        return redirect('gestione-membristaff')
            ->with([
                'azione' => 'view',
                'success' => 'Membro staff creato con successo'
            ]);
    }

    public function modifyStaff(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'string', 'max:30', 'alpha:ascii'],
            'cognome' => ['required', 'string', 'max:30', 'alpha:ascii'],
            'età' => ['required', 'integer', 'min:12', 'max:200'],
            'telefono' => ['required', 'string', 'max:10', 'regex:/^[0-9]+$/'],
            'email' => ['required', 'string', 'email', 'max:30'],
        ]);

        $staff = User::find($request->username);
        $staff->Nome = $request->nome;
        $staff->Cognome = $request->cognome;
        $staff->Età = $request->età;
        $staff->Telefono = $request->telefono;
        $staff->Mail = $request->email;
        $staff->Genere = $request->genere;
        $staff->save();
        return redirect('gestione-membristaff')
            ->with([
                'azione' => 'view',
                'success' => 'Membro staff modificato con successo'
            ]);
    }

    public function deleteStaff($username)
    {
        $this->setup();
        $this->listaStaff = User::destroy($username);
        return redirect('gestione-membristaff')
            ->with([
                'azione' => 'view',
                'success' => 'Membro staff eliminato con successo'
            ]);
    }

    // metodi per la gestione di faq

    // azione=>view fa entrare nello switch
    // passo alla vista la lista delle FAQ come faq
    public function showGestioneFaq()
    {
        $this->setup();
        return view('sezione-admin/gestione-faq')
            ->with(['faq' => $this->listaFaq,
                'azione' => 'view',
            ]);
    }

    // azione=>mod fa entrare nello switch
    // find cerca i record nella tabella su base primary key
    public function showModifyFaq($id)
    {
        return view('sezione-admin/gestione-faq')
            ->with([
                'faqSel' => FAQ::find($id),
                'azione' => 'mod'
            ]);
    }

    // azione=>create fa entrare nello switch
    public function showCreaFaq()
    {
        return view('sezione-admin/gestione-faq')
            ->with([
                'azione' => 'create'
            ]);
    }

    // CRUD Faq
    public function createFaq(Request $request)
    {
        $request->validate([
            'domanda' => ['required', 'string', 'max:100'],
            'risposta' => ['required', 'string', 'max:999'],
        ]);
        $faq = new FAQ();
        $faq->Domanda = $request->domanda;
        $faq->Risposta = $request->risposta;
        $faq->save();
        return redirect('gestione-faq')
            ->with([
                'azione' => 'view',
                'success' => 'FAQ creata con successo'
            ]);
    }

    public function modifyFaq(Request $request)
    {

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
                'azione' => 'view',
                'success' => 'FAQ modificata con successo'
            ]);
    }

    public function deleteFaq($idFaq)
    {
        $this->setup();
        $this->listaFaq = FAQ::destroy($idFaq);
        return redirect('gestione-faq')
            ->with([
                'azione' => 'view',
                'success' => 'FAQ eliminata con successo'
            ]);
    }

    // metodo per la gestione di eliminazioni utenti
    // passo alla vista la lista degli come utenti
    public function showGestioneUtenti()
    {
        $this->setup();
        return view('sezione-admin/eliminazione-utenti')
            ->with('utenti', $this->listaUtenti);
    }

    // eliminazione utenti
    // ->first() prende il primo elem che soddisfa la condizione
    public function deleteUtenti(Request $request)
    {
        $user = User::where('Username', $request->username)->first();
        $user->delete();
        return redirect('eliminazione-utenti')->with('success', 'Utente eliminato con successo');
    }

    //Stats

    // passo alla vista la lista degli utenti come utenti
    // passo alla vista la lista delle offerte come offerte
    public function viewStatistiche()
    {
        $this->setup();

        return view('sezione-admin/statistiche')
            ->with(['utenti' => $this->listaUtenti,
                'offerte' => $this->listaOfferte
            ]);
    }

    // il risultato viene restituito come json
    // ->count() restituisce il numero di istanze
    public function numeroCoupon()
    {
        return json_encode(Coupon::all()->count());
    }

    public function numeroCouponPromozione(Request $request)
    {
        return json_encode(Coupon::where('Id_Offerta', $request->sceltaOfferta)->get()->count());
    }

    public function numeroCouponUser(Request $request)
    {
        return json_encode(Coupon::where('UsernameUtente', $request->sceltaUser)->get()->count());
    }

    // metodo per la gestione degli asssegnamenti

    // azione=>view fa entrare nello switch
    // passo alla vista la lista degli assegnamenti come aziendeAssegnate
    public function showGestioneAssegnamento()
    {
        $this->setup();

        return view('sezione-admin/gestione-assegnamento-aziende')
            ->with(['aziendeAssegnate' => $this->listaAssegnamenti,
                'azione' => 'view'
            ]);
    }

    // azione=>mod fa entrare nello switch
    public function showModifyAssegnamento($id)
    {
        $this->setup();
        return view('sezione-admin/gestione-assegnamento-aziende')
            ->with([
                'listaAziende' => Azienda::pluck('NomeAzienda', 'Id_Azienda'),
                'listastaff' => $this->listaStaff->pluck('username', 'username'),
                'assegnamentoSel' => GestoriAziende::find($id),
                'azione' => 'mod'
            ]);
    }

    // azione=>create fa entrare nello switch
    public function showCreaAssegnamento()
    {
        $this->setup();
        return view('sezione-admin/gestione-assegnamento-aziende')
            ->with([
                'listaAziende' => Azienda::pluck('NomeAzienda', 'Id_Azienda'),
                'listastaff' => $this->listaStaff->pluck('username', 'username'),
                'azione' => 'create'
            ]);
    }

    // CRUD Assegnamento
    public function modifyAssegnamento(Request $request)
    {
        //TODO: perché nomeAzienda e usernameStaff della request hanno degli id al posto dei loro valori???

        // query che cerca l'istanza
        $assegnamento = GestoriAziende::where(
            'Id_Azienda', $request->nomeAzienda)
            ->where('UsernameUtente', $request->usernameStaff)->first();

        // check if already exist
        if ($assegnamento == null) {
            $assegnamento = GestoriAziende::find($request->id);
            $assegnamento->UsernameUtente = $request->usernameStaff;
            $assegnamento->Id_Azienda = $request->nomeAzienda;
            $assegnamento->save();
            return redirect('gestione-assegnamento-aziende')
                ->with([
                    'azione' => 'view',
                    'success' => 'Assegnamento modificato con successo'
                ]);
        } else {
            return redirect()->back()->withErrors(['erroreAss' => "L'assegnamento è già esistente per questa coppia"]);
        }
    }

    public function deleteAssegnamento(Request $request)
    {
        $assegnamento = GestoriAziende::find($request->id);

        $assegnamento->delete();
        return redirect('gestione-assegnamento-aziende')->with([
            'azione' => 'view',
            'success' => 'Assegnamento eliminato con successo'
        ]);
    }

    public function createAssegnamento(Request $request)
    {

        $assegnamento = GestoriAziende::where(
            'Id_Azienda', $request->nomeAzienda)
            ->where('UsernameUtente', $request->nomestaff)->first();
        if ($assegnamento == null) {
            $assegnamento = new GestoriAziende();
            $assegnamento->UsernameUtente = $request->nomestaff;
            $assegnamento->Id_Azienda = $request->nomeAzienda;
            $assegnamento->save();
            return redirect('gestione-assegnamento-aziende')
                ->with([
                    'azione' => 'view',
                    'success' => 'Assegnamento creato con successo'
                ]);
        } else {
            return redirect()->back()->withErrors(['erroreAss' => "L'assegnamento è già esistente per questa coppia"]);
        }
    }

}
