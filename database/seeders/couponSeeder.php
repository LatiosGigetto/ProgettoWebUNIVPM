<?php

namespace database\seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            
            ['Username' => 'admin', 'Nome' => 'John', 'Cognome' => 'Doe', 'Livello' => 3, 
                'Mail' => 'test@provider.com','Telefono' => '1234567890','Password' => 'admin123', 'Età' => 35, 'Genere' => 'Maschio'],
            ['Username' => 'utente1', 'Nome' => 'Mario', 'Cognome' => 'Rossi', 'Livello' => 1, 
                'Mail' => 'mariorossi@provider.com','Telefono' => '3322334445','Password' => 'mr99', 'Età' => 24, 'Genere' => 'Maschio'],
            ['Username' => 'staff1', 'Nome' => 'Jane', 'Cognome' => 'Smith', 'Livello' => 2, 
                'Mail' => 'janesmith@provider.com','Telefono' => '3333333333','Password' => 'jane123', 'Età' => 30, 'Genere' => 'Femmina'],
            ['Username' => 'staff2', 'Nome' => 'Gloria', 'Cognome' => 'Bianchi', 'Livello' => 2, 
                'Mail' => 'gbianchi95@provider.com','Telefono' => '3391234567', 'Password' => 'vivalavida', 'Età' => 28, 'Genere' => 'Femmina']
        ]);
        
        DB::table('azienda')->insert([
            
            // Seeding aziende
            
            ['id_Azienda' => 1, 'NomeAzienda' => 'Baldini Scarpe SRL', 'Logo' => '', 'Sede' => 'Fermo', 'Descrizione' => 'lol',
                'Categoria' => 'Calzature'],
            ['id_Azienda' => 2, 'NomeAzienda' => 'Franchi SPA', 'Logo' => '', 'Sede' => 'Fano', 'Descrizione' => 'lololol',
                'Categoria' => 'Supermercato']
        ]);
        
        DB::table('gestoriaziende')->insert([
            
            // Seeding gestoriaziende
            
            ['UsernameUtente' => 'staff1', 'id_Azienda' => 1],
            ['UsernameUtente' => 'staff2', 'id_Azienda' => 2],
        ]);
        
        DB::table('offerta')->insert([
            
            // Seeding offerta
            
            ['id_Offerta' => 1, 'id_Azienda' => 1, 'Luogo' => 'Fermo', 'Descrizione' => 'prova example', 
                'Validità' => '2023-12-22'],
            ['id_Offerta' => 2, 'id_Azienda' => 2, 'Luogo' => 'Fano', 'Descrizione' => 'prova example', 
                'Validità' => '2023-10-12']
            
        ]);
        
        DB::table('faq')->insert([
            
            // Seeding faq
            
            ['id_Domanda' => 1, 'Domanda' => 'Domanda di prova 1', 'Risposta' => 'content'],
            ['id_Domanda' => 2, 'Domanda' => 'Domanda di prova 2', 'Risposta' => 'content']
            
        ]);
    }
}
