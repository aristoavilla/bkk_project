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
        Schema::create('alumnus', function (Blueprint $table) {
            $table->id();  // This creates an auto-incrementing, unsignedBigInteger primary key
            $table->string('firstName', 200);
            $table->string('lastName', 200);
            $table->foreignId('gender_id')->constrained();
            $table->foreignId('batch_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnus');
    }
};
