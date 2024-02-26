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
        Schema::create('medecins', function (Blueprint $table) {
            // $table->id();
            // $table->foreignId('id_user')->constrained('users');
            // $table->foreignId('id_speciality')->constrained('specialities');
            // $table->timestamps();
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_speciality');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_speciality')->references('id')->on('specialities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medecins');
    }
};
