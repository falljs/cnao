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
        Schema::create('institutional_messages', function (Blueprint $table) {
            $table->id();

            // Directeur
            $table->string('director_title');
            $table->string('director_subtitle')->nullable();
            $table->longText('director_content');
            $table->string('director_image')->nullable();

            // Ministre
            $table->string('minister_title');
            $table->string('minister_subtitle')->nullable();
            $table->longText('minister_content');
            $table->string('minister_image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institutional_messages');
    }
};
