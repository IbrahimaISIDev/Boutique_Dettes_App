<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    public function run()
    {
        DB::table('clients')->delete(); // Assurez-vous que les anciennes données sont supprimées

        // Créer 3 clients sans compte utilisateur
        $surnoms = ['Laye', 'Astou', 'Modou'];

        foreach ($surnoms as $index => $surnom) {
            Client::create([
                'surnom' => $surnom,
                'phone' => "77" . str_pad($index + 1, 7, '0', STR_PAD_LEFT),
                'adresse' => "Rue " . ($index + 1) . ", Dakar",
            ]);
        }
    }
}

