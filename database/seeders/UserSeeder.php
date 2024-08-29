<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete(); // Assurez-vous que les anciennes données sont supprimées

        // Créer un utilisateur admin
        User::create([
            'nom' => 'Diop',
            'prenom' => 'Moussa',
            'login' => 'admin',
            'password' => Hash::make('AdminPass123!'),
            'role' => 'Admin',
        ]);

        // Créer un utilisateur boutiquier
        User::create([
            'nom' => 'Sow',
            'prenom' => 'Fatou',
            'login' => 'boutiquier',
            'password' => Hash::make('BoutiquierPass123!'),
            'role' => 'Boutiquier',
        ]);
    }
}
