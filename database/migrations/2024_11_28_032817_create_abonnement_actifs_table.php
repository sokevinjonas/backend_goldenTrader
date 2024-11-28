<?php

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
        Schema::create('abonnement_actifs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('abonnement_id')->constrained('abonnements')->onDelete('cascade'); // L'abonnement souscrit
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // L'utilisateur (analyste ou investisseur)
            $table->date('start_date'); // Date de début de l'abonnement
            $table->date('end_date'); // Date d'expiration de l'abonnement
            $table->boolean('is_active')->default(true); // Indicateur d'état actif
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abonnement_actifs');
    }
};
