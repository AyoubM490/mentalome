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
        Schema::create('mentalomes', function (Blueprint $table) {
            $table->id();
            $table->string('gene_ids')->index();
            $table->integer('value')->index();
            $table->string('SRA')->index();
            $table->string('Abbreviation')->index();
            $table->string('experiment')->index();
            $table->string('disease')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentalomes');
    }
};
