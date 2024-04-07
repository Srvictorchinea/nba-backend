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
        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements(column: 'id');
            $table->string(column: 'conference');
            $table->string(column: 'division');
            $table->string(column: 'city');
            $table->string(column: 'name');
            $table->string(column: 'full_name');
            $table->string(column: 'abbreviation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
