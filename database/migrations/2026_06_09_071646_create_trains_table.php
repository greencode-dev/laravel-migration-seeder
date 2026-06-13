<?php

/* ***************************************************************************
Migration per creare la tabella "trains" con i campi necessari per memorizzare le informazioni sui treni, come azienda, stazione di partenza e arrivo, orari di partenza e arrivo, codice treno, numero di carrozze, numero di binario, stato di puntualità e cancellazione, e timestamp per la creazione e l'aggiornamento dei record.
************************************************************************** */

// database/migrations/2026_06_09_071646_create_trains_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trains', function (Blueprint $table) {
            $table->id();
            $table->string('azienda');
            $table->string('stazione_di_partenza');
            $table->string('stazione_di_arrivo');
            $table->dateTime('orario_di_partenza');
            $table->dateTime('orario_di_arrivo');
            $table->string('codice_treno', 10)->unique();
            $table->unsignedTinyInteger('numero_carrozze')->default(1);
            $table->unsignedTinyInteger('numero_binario');
            $table->boolean('in_orario')->default(true);
            $table->boolean('cancellato')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trains');
    }
};
