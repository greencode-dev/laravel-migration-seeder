<?php

namespace Database\Seeders;

use App\Models\Train; // Importa il Model Train
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $this->call(TrainSeeder::class); // Chiama il seeder dei treni
       
    }
}
