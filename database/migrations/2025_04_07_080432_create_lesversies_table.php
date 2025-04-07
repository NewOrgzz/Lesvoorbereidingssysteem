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
        Schema::create('lesversies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lesvoorbereiding_id')->constrained('lesvoorbereidingen')->onDelete('cascade');
            $table->string('versie');      // bijvoorbeeld "V1.0", "V1.1"
            $table->text('inleiding')->nullable();
            $table->text('kern')->nullable();
            $table->text('afsluiting')->nullable();
            $table->text('studentactiviteiten')->nullable();
            $table->text('docentactiviteiten')->nullable();
            $table->text('hulpmiddelen')->nullable();
            $table->text('opmerkingen')->nullable();
            $table->text('aandachtspunten')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lesversies');
    }
};
