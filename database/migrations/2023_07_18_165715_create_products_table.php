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
        Schema::create('products', function (Blueprint $table) {
            
            $table->increments('id');

            $table->string('name')->nullable(false)->unique();

            $table->string('imgdefault')->nullable(false)->unique();

            $table->integer('price')->nullable(false);

            $table->integer('category_id')->unsigned();

            $table->integer('bookcover_id')->unsigned();

            $table->integer('quantity')->nullable(false);

            $table->string('describe')->nullable();

            $table->integer('page');

            $table->integer('publishingyear');

            $table->string('size');

            $table->integer('weight');

            $table->timestamps();
        });
        
   Schema::table('products', function($table) {
    
    $table->foreign('category_id')->references('id')->on('categories');

    $table->foreign('bookcover_id')->references('id')->on('bookcovers');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};