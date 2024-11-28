<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Liste d'exemples de noms de famille et prénoms africains (Burkina Faso / Côte d'Ivoire)
        $names = [
            'Ouedraogo Aziz', 'Traoré Kader', 'Zongo Alain', 'Kouadio Jean', 'Koffi Didier', 'N’Guessan Thierry',
            'Yao Koffi', 'Bamba Téné', 'Diabaté Aboubacar', 'Soro Adama', 'Ouattara Salif', 'Kouakou Patrick',
            'Fofana Mamadou', 'Bognon Rodrigue', 'Seydou Oumar', 'Toure Amadou', 'Bamba Moussa', 'Diarra Mahamadou',
            'Doumbia Sidiki', 'Keita Bakary', 'Kouassi René', 'Tano Jean-Marc', 'Gbessi Olivier', 'Gnakpa Yao',
            'Adama Ali', 'Yao Tiemoko', 'Sangaré Ibrahim', 'Sohou Youssouf', 'Ouattara Hamidou', 'Koné Ibrahim'
        ];

         // Multiplier la liste pour générer 1000 utilisateurs
         $names = array_merge($names, $names, $names, $names, $names); // Répéter la liste

         // Générer 1000 utilisateurs avec une répartition de rôles
        for ($i = 0; $i < 30; $i++) {
            $name = $faker->randomElement($names);
            $email = strtolower(str_replace(' ', '', $name)) . $i . '@gmail.com'; // Ajouter $i pour rendre l'email unique

            // Déterminer le rôle (10% analyst, 90% investor)
            $role = ($i < 10) ? 'analyst' : 'investor'; // Les 100 premiers auront le rôle "analyst"

            $user = User::create([
                'name' => $name,
                'email' => $email,
                'bio' => $faker->paragraph(),
                'role' => $role,
                // 'avatar' => $faker->imageUrl(200, 200),
                'password' => bcrypt('password'), // Mot de passe "password" crypté
            ]);
        }
    }
}
