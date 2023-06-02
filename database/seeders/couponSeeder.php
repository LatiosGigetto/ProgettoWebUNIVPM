<?php

namespace database\seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class couponSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('utente')->insert([
            // Seeding utenti

            ['Username' => 'adminadmin', 'Nome' => 'John', 'Cognome' => 'Doe', 'Livello' => 3,
                'Mail' => 'admin@admin.com', 'Telefono' => '1234567890', 'Password' => Hash::make('Ja2waD4v'), 'Età' => 35, 'Genere' => 'Maschio'],
            ['Username' => 'staffstaff', 'Nome' => 'Mario', 'Cognome' => 'Bianchi', 'Livello' => 2,
                'Mail' => 'staff@staff.com', 'Telefono' => '1122334455', 'Password' => Hash::make('Ja2waD4v'), 'Età' => 22, 'Genere' => 'Maschio'],
            ['Username' => 'useruser', 'Nome' => 'Fabiola', 'Cognome' => 'Mainenti', 'Livello' => 1,
                'Mail' => 'user@user.com', 'Telefono' => '3341234567', 'Password' => Hash::make('Ja2waD4v'), 'Età' => 46, 'Genere' => 'Femmina']
        ]);

        DB::table('azienda')->insert([
            // Seeding aziende

            ['Id_Azienda' => 1, 'NomeAzienda' => 'Baldini Scarpe SRL', 
                'Logo' => fread(fopen("./public/images/baldini.png", 'rb'), filesize("./public/images/baldini.png")), 
                'Sede' => 'Fermo', 'Descrizione' => "Azienda che opera nel fermano nell'ambito delle calzature",
                'Categoria' => 'Calzature'],
            ['Id_Azienda' => 2, 'NomeAzienda' => 'Franchi SPA', 
                'Logo' => fread(fopen("./public/images/franchi.png", 'rb'), filesize("./public/images/franchi.png")), 
                'Sede' => 'Fano', 'Descrizione' => 'La catena di supermercati più cool della provincia di Pesaro-Urbino!',
                'Categoria' => 'Supermercato'],
            ['Id_Azienda' => 3, 'NomeAzienda' => 'Giorgetti SRL', 
                'Logo' => fread(fopen("./public/images/giorgetti.png", 'rb'), filesize("./public/images/giorgetti.png")), 
                'Sede' => 'Macerata', 'Descrizione' => 'Giorgetti è la più grande compagnia di distribuzione in ambito elettronico della provincia di Macerata',
                'Categoria' => 'Elettronica'],
            ['Id_Azienda' => 4, 'NomeAzienda' => 'Cooperativa De Marco', 
                'Logo' => fread(fopen("./public/images/demarco.png", 'rb'), filesize("./public/images/demarco.png")), 
                'Sede' => 'Ascoli Piceno', 'Descrizione' => "Se avete bisogno di merce all'ingrosso, De Marco è quello che fa per voi!",
                'Categoria' => 'Ingrosso'],
            ['Id_Azienda' => 5, 'NomeAzienda' => 'Sapore di Mare SPA', 
                'Logo' => fread(fopen("./public/images/sdm.png", 'rb'), filesize("./public/images/sdm.png")), 
                'Sede' => 'Pesaro', 'Descrizione' => 'Sapore di Mare porta dentro le vostre case solo il pesce più fresco!',
                'Categoria' => 'Pescheria'],
            ['Id_Azienda' => 6, 'NomeAzienda' => 'New Generation SS', 
                'Logo' => fread(fopen("./public/images/newgen.png", 'rb'), filesize("./public/images/newgen.png")), 
                'Sede' => 'Loreto', 'Descrizione' => "New Generation si occupa di portare prodotti di qualità nell'anconetano",
                'Categoria' => 'Supermercato'],
        ]);

        DB::table('gestoriaziende')->insert([
            // Seeding gestoriaziende

            ['UsernameUtente' => 'staffstaff', 'id_Azienda' => 1],
            ['UsernameUtente' => 'staffstaff', 'id_Azienda' => 2],
            ['UsernameUtente' => 'staffstaff', 'id_Azienda' => 4],
        ]);

        DB::table('offerta')->insert([
            // Seeding offerta

            ['Id_Offerta' => 1, 'Id_Azienda' => 1, 'Oggetto' => 'Sconto del 25% su sandali da uomo', 'Luogo' => 'Fermo', ''
                . 'Descrizione' => 'Con questo coupon hai diritto al 25% di sconto su tutti i sandali da uomo del nostro negozio di Fermo!',
                'Validità' => '2023-12-22'],
            ['Id_Offerta' => 2, 'Id_Azienda' => 2, 'Oggetto' => '10% su frutta e verdura' , 'Luogo' => 'Provincia di PU', 
                'Descrizione' => 'Porta questo coupon in uno qualsiasi dei nostri supermercati della provincia di Pesaro-Urbino per '
                . 'ottenere uno sconto del 10% su tutta la frutta e verdura!',
                'Validità' => '2023-10-12'],
            ['Id_Offerta' => 3, 'Id_Azienda' => 3, 'Oggetto' => '15% di sconto su un PC completo' , 'Luogo' => 'Piediripa', 
                'Descrizione' => 'Se acquisti un PC preassemblato oppure tutte le componenti necessarie per assemblarlo avrai diritto'
                . 'ad uno sconto nella nostra sede di Piediripa!',
                'Validità' => '2023-07-13'],
            ['Id_Offerta' => 4, 'Id_Azienda' => 2, 'Oggetto' => '20% su cibo per animali domestici' , 'Luogo' => 'Fano', 
                'Descrizione' => 'Porta questo coupon alla nostra sede di Fano e avrai diritto ad un 20% di sconto su pappe per gatti e cani',
                'Validità' => '2023-09-12'],
            ['Id_Offerta' => 5, 'Id_Azienda' => 3, 'Oggetto' => '10% su schede video NVIDIA' , 'Luogo' => 'Piediripa', 
                'Descrizione' => 'Con questo coupon avrai diritto al un 10% di sconto su qualsiasi scheda video NVIDIA acquistata alla nostra'
                . 'sede di Piediripa! NOTA: Questo coupon non si applica alle schede della famiglia RTX',
                'Validità' => '2023-11-11'],
            ['Id_Offerta' => 6, 'Id_Azienda' => 5, 'Oggetto' => '25% sul pescato fresco' , 'Luogo' => 'Pesaro', 
                'Descrizione' => 'Solo per la giornata del primo luglio puoi avere un 25% di sconto su ogni tipo di pescato fresco!'
                . 'Chedi al bancone del nostro negozio a Pesaro per ulteriori informazioni',
                'Validità' => '2023-07-01'],
            ['Id_Offerta' => 7, 'Id_Azienda' => 4, 'Oggetto' => '15% di sconto su casse di birra' , 'Luogo' => 'Ascoli Piceno', 
                'Descrizione' => 'Con questa promozione avrai diritto ad un 15% di sconto su ogni cassa di birra che acquisterai!'
                . 'Promozione limitata ad una cassa di birra per coupon.',
                'Validità' => '2023-04-04'],
        ]);

        DB::table('faq')->insert([
            // Seeding faq

            ['id_Domanda' => 1, 'Domanda' => 'Dove opera Doggo Discount?', 
                'Risposta' => 'Doggo Discount opera in tutte le Marche, con offerte localizzate in ogni provincia '],
            ['id_Domanda' => 2, 'Domanda' => 'Quali categorie di prodotto sono presenti sul sito?', 
                'Risposta' => 'Doggo Discount offre promozioni e offerte per tantissime categorie di prodotti: supermercati, calzature,'
                . 'abbigliamento, tecnologia e molto altro!'],
            ['id_Domanda' => 3, 'Domanda' => 'Posso cambiare il mio username una volta scelto?', 
                'Risposta' => 'No, lo username utente non può essere modificato una volta deciso.'],
            ['id_Domanda' => 4, 'Domanda' => 'Come controllo i coupon che ho già generato?', 
                'Risposta' => 'Nella tua area utente avrai accesso ad ogni coupon generato di offerte ancora valide.'
                . 'Da lì potrai decidere di stampare il coupon da portare al negozio relativo'],
            ['id_Domanda' => 5, 'Domanda' => 'Come contatto il webmaster?', 
                'Risposta' => 'Per qualsiasi domanda si consulti la sezione Contatti del sito.'],
        ]);
    }

}
