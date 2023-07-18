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
        Schema::create('providers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable(false)->unique();
            $table->string('adress')->nullable(false)->unique();
            $table->string('phone',10)->nullable(false)->unique();
            $table->string('email')->nullable(false);
            $table->tinyInteger('status')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('providers');
    }
};