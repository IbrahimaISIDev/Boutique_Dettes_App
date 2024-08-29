<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserClientSeeder extends Seeder
{
    public function run()
    {
        // Supprimer toutes les données des tables sans utiliser TRUNCATE
        DB::table('clients')->delete(); // Assurez-vous que les anciennes données sont supprimées
        DB::table('users')->delete(); // Assurez-vous que les anciennes données sont supprimées

        // Créer un utilisateur client avec un rôle valide
        $user = User::create([
            'nom' => 'Thiam',
            'prenom' => 'Aissatou',
            'login' => 'aissatou',
            'password' => Hash::make('ClientPass123!'),
            'role' => 'Client', // Assurez-vous que 'Client' est une valeur valide
        ]);

        // Créer un client avec le compte utilisateur créé
        Client::create([
            'user_id' => $user->id,
            'surnom' => 'Thiam Aissatou',
            'phone' => '773000000',
            'adresse' => 'Avenue Jean Jaurès, Dakar',
        ]);
    }
}


