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
        Schema::create('abonnements', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['premium', 'vip']); // Type d'abonnement
            $table->enum('duration', ['14', '30']); // Durée de l'abonnement
            $table->decimal('price', 10, 2); // Montant payé pour l'abonnement
            $table->foreignId('admin_id')->constrained('users')->onDelete('cascade'); // l'admin connectee
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abonnements');
    }
};
