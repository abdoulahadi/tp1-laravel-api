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
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("etudiant_id")
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId("formation_id")
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId("niveau_id")
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId("annee_academique_id")
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
};
