<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Train; // Importa il Model Train
use Faker\Generator as Faker; // Importa Faker

class TrainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        // Opzionale: Pulisce la tabella prima di inserire nuovi dati
        Train::truncate();

        // Mappatura aziende -> pattern codice treno
        $companyMap = [
            'Frecciargento' => 'FA ####',
            'Frecciarossa' => 'FR ####',
            'Italo'        => 'IT ####',
            'Regionale'    => 'REG ####',
            'Intercity'    => 'IC ###',
        ];

        $stations = ['Roma Termini', 'Milano Centrale', 'Napoli Centrale', 'Firenze Santa Maria Novella', 'Bologna Centrale', 'Torino Porta Nuova', 'Venezia Santa Lucia', 'Genova Piazza Principe'];

        for ($i = 0; $i < 20; $i++) { // Crea 20 treni fittizi
            $azienda = $faker->randomElement(array_keys($companyMap));
            $departureStation = $faker->randomElement($stations);
            // Assicura che la stazione di arrivo sia diversa da quella di partenza
            $arrivalStation = $faker->randomElement(array_diff($stations, [$departureStation])); 

            // Crea treni sia passati che futuri per testare lo stato "Arrivato" e i filtri
            $departureTime = $faker->dateTimeBetween('-1 week', '+1 week'); 
            // Arrivo da 1 a 8 ore dopo la partenza
            $arrivalTime = (clone $departureTime)->modify('+' . $faker->numberBetween(1, 8) . ' hours'); 

            $isCancelled = $faker->boolean(10); // 10% di possibilità di essere cancellato
            // Se cancellato, non può essere in orario. Altrimenti, 80% di possibilità di essere in orario.
            $isInTime = $isCancelled ? false : $faker->boolean(80); 

            Train::create([
                'azienda' => $azienda,
                'stazione_di_partenza' => $departureStation,
                'stazione_di_arrivo' => $arrivalStation,
                'orario_di_partenza' => $departureTime,
                'orario_di_arrivo' => $arrivalTime,
                'codice_treno' => $faker->unique()->numerify($companyMap[$azienda]),
                'numero_binario' => $faker->numberBetween(1, 20),
                'numero_carrozze' => $faker->numberBetween(4, 12),
                'in_orario' => $isInTime,
                'cancellato' => $isCancelled,
            ]);
        }
    }
}