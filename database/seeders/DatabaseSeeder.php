<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\PublicationSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    //  php artisan db:seed --class=PublicationSeeder

    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

         // Appeler le UserSeeder
         $this->call(UserSeeder::class);
         $this->call(PublicationSeeder::class);
    }
}
