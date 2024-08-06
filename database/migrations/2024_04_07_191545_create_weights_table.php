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
        Schema::create('weights', function (Blueprint $table) {
            $table->id('id_weight');
            $table->integer('id_criteria');
            $table->text('nama_bobot');
            $table->string('bobot');
            $table->timestamps();

            // $table->foreign('id_kriteria')->references('id_kriteria')->on('criterias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weights');
    }
};
