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

            ['Username' => 'adminadmin', 'Nome' => 'Admin', 'Cognome' => 'Admin', 'Livello' => 3,
                'Mail' => 'admin@admin.com', 'Telefono' => '1234567890', 'Password' => Hash::make('Ja2waD4v'), 'Età' => 35, 'Genere' => 'Maschio'],
            ['Username' => 'staffstaff', 'Nome' => 'Staff', 'Cognome' => 'Staff', 'Livello' => 2,
                'Mail' => 'staff@staff.com', 'Telefono' => '1234567890', 'Password' => Hash::make('Ja2waD4v'), 'Età' => 35, 'Genere' => 'Maschio'],
            ['Username' => 'useruser', 'Nome' => 'User', 'Cognome' => 'User', 'Livello' => 1,
                'Mail' => 'user@user.com', 'Telefono' => '1234567890', 'Password' => Hash::make('Ja2waD4v'), 'Età' => 35, 'Genere' => 'Maschio']
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
                'Categoria' => 'Supermercato']
        ]);

        DB::table('gestoriaziende')->insert([
            // Seeding gestoriaziende

            ['UsernameUtente' => 'staffstaff', 'id_Azienda' => 1],
        ]);

        DB::table('offerta')->insert([
            // Seeding offerta

            ['Id_Offerta' => 1, 'Id_Azienda' => 1, 'Oggetto' => 'Sconto del 25% su sandali da uomo', 'Luogo' => 'Fermo', ''
                . 'Descrizione' => 'Con questo coupon hai diritto al 25% di sconto su tutti i sandali da uomo del nostro negozio di Fermo!',
                'Validità' => '2023-12-22'],
            ['Id_Offerta' => 2, 'Id_Azienda' => 2, 'Oggetto' => '10% su frutta e verdura' , 'Luogo' => 'Provincia di PU', 
                'Descrizione' => 'Porta questo coupon in uno qualsiasi dei nostri supermercati della provincia di Pesaro-Urbino per '
                . '                 ottenere uno sconto del 10% su tutta la frutta e verdura!',
                'Validità' => '2023-10-12']
        ]);

        DB::table('faq')->insert([
            // Seeding faq

            ['id_Domanda' => 1, 'Domanda' => 'Dove opera Doggo Discount?', 
                'Risposta' => 'Doggo Discount opera in tutte le Marche, con offerte localizzate in ogni provincia '],
            ['id_Domanda' => 2, 'Domanda' => 'Quali categorie di prodotto sono presenti sul sito?', 
                'Risposta' => 'Doggo Discount offre promozioni e offerte per tantissime categorie di prodotti: supermercati, calzature,'
                . 'abbigliamento, tecnologia e molto altro!']
        ]);
    }

}
