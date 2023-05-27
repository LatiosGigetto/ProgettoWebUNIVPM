<?php

namespace database\seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class couponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('utente')->insert([

            // Seeding utenti

            ['Username' => 'adminadmin', 'Nome' => 'Admin', 'Cognome' => 'Admin', 'Livello' => 3,
                'Mail' => 'admin@admin.com','Telefono' => '1234567890','Password' => Hash::make('Ja2waD4v'), 'Età' => 35, 'Genere' => 'Maschio'],
            ['Username' => 'staffstaff', 'Nome' => 'Staff', 'Cognome' => 'Staff', 'Livello' => 2,
                'Mail' => 'staff@staff.com','Telefono' => '1234567890','Password' => Hash::make('Ja2waD4v'), 'Età' => 35, 'Genere' => 'Maschio'],
            ['Username' => 'useruser', 'Nome' => 'User', 'Cognome' => 'User', 'Livello' => 1,
                'Mail' => 'user@user.com','Telefono' => '1234567890','Password' => Hash::make('Ja2waD4v'), 'Età' => 35, 'Genere' => 'Maschio']
        ]);

        DB::table('azienda')->insert([

            // Seeding aziende

            ['Id_Azienda' => 1, 'NomeAzienda' => 'Baldini Scarpe SRL', 'Logo' => '', 'Sede' => 'Fermo', 'Descrizione' => 'lol',
                'Categoria' => 'Calzature'],
            ['Id_Azienda' => 2, 'NomeAzienda' => 'Franchi SPA', 'Logo' => '', 'Sede' => 'Fano', 'Descrizione' => 'lololol',
                'Categoria' => 'Supermercato']
        ]);

        DB::table('gestoriaziende')->insert([

            // Seeding gestoriaziende

            ['UsernameUtente' => 'staffstaff', 'id_Azienda' => 1],
        ]);

        DB::table('offerta')->insert([

            // Seeding offerta

            ['Id_Offerta' => 1, 'Id_Azienda' => 1, 'Luogo' => 'Fermo', 'Descrizione' => 'prova example',
                'Validità' => '2023-12-22'],
            ['Id_Offerta' => 2, 'Id_Azienda' => 2, 'Luogo' => 'Fano', 'Descrizione' => 'prova example',
                'Validità' => '2023-10-12']

        ]);

        DB::table('faq')->insert([

            // Seeding faq

            ['id_Domanda' => 1, 'Domanda' => 'Domanda di prova 1', 'Risposta' => 'content'],
            ['id_Domanda' => 2, 'Domanda' => 'Domanda di prova 2', 'Risposta' => 'content']

        ]);
    }
}
