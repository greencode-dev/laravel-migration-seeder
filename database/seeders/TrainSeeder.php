<?php

/* **************************************************************************
Seeder per popolare la tabella dei treni con dati fittizi, utilizzando Faker per generare dati realistici e coerenti, come codici treno basati sull'azienda, stazioni di partenza e arrivo diverse, orari di partenza e arrivo coerenti, e stati di cancellazione e puntualità realistici.
************************************************************************** */

// database/seeders/TrainSeeder.php

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
        // Pulisce la tabella prima di inserire nuovi dati
        Train::truncate();

        // Mappatura aziende -> pattern codice treno
        $companyMap = [
            'Frecciargento' => 'FA ####',
            'Frecciarossa' => 'FR ####',
            'Italo'        => 'IT ####',
            'Regionale'    => 'REG ####',
            'Intercity'    => 'IC ###',
        ];

        // Lista di stazioni
        $stations = ['Roma Termini', 'Milano Centrale', 'Napoli Centrale', 'Firenze Santa Maria Novella', 'Bologna Centrale', 'Torino Porta Nuova', 'Venezia Santa Lucia', 'Genova Piazza Principe'];

        for ($i = 0; $i < 20; $i++) { // Crea 20 treni fittizi
            // Seleziona un'azienda e genera un codice treno coerente
            $azienda = $faker->randomElement(array_keys($companyMap));
            // Seleziona stazioni di partenza e arrivo, assicurandosi che siano diverse
            $departureStation = $faker->randomElement($stations);
            // Assicura che la stazione di arrivo sia diversa da quella di partenza
            $arrivalStation = $faker->randomElement(array_diff($stations, [$departureStation])); 
            // Genera orari di partenza e arrivo coerenti
            $departureTime = $faker->dateTimeBetween('now', '+1 week'); // Partenza entro la prossima settimana
            // Arrivo da 1 a 8 ore dopo la partenza
            $arrivalTime = (clone $departureTime)->modify('+' . $faker->numberBetween(1, 8) . ' hours'); 
            // Determina se il treno è cancellato o in orario
            $isCancelled = $faker->boolean(10); // 10% di possibilità di essere cancellato
            // Se cancellato, non può essere in orario. Altrimenti, 80% di possibilità di essere in orario.
            $isInTime = $isCancelled ? false : $faker->boolean(80); 
            
            // Crea il treno nel database
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