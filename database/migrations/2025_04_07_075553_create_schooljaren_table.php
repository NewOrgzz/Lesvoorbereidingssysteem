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
        Schema::create('schooljaren', function (Blueprint $table) {
            $table->id();
            $table->string('naam');        // bijvoorbeeld "2023-2024"
            $table->date('start_datum');
            $table->date('eind_datum');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schooljaren');
    }
};
