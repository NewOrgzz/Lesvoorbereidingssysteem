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
        Schema::create('lesvoorbereidingen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vak_id')->constrained('vakken')->onDelete('cascade');
            $table->string('titel');
            $table->date('datum');
            $table->string('lokaal')->nullable();
            $table->time('tijd')->nullable();
            $table->text('groepssamenstelling')->nullable();
            $table->text('beginsituatie')->nullable();
            $table->text('leerdoelen')->nullable();
            $table->text('voorbereiding')->nullable();
            $table->enum('werkvorm', ['individueel', 'groepje', 'synchroon', 'asynchroon'])->nullable();
            $table->enum('materiaal_type', ['fysiek', 'online', 'beide'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lesvoorbereidingen');
    }
};
