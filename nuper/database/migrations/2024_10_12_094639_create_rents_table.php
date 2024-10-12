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
        Schema::create('rents', function (Blueprint $table) {
            $table->id('rentID');
            $table->string('username');
            $table->integer('duration');
            $table->string('name');
            $table->integer('price');
            $table->string('description');
            $table->string('imgUrl');
            $table->string('imgUrl2')->nullable();
            $table->string('imgUrl3')->nullable();
            $table->string('imgUrl4')->nullable();
            $table->string('imgUrl5')->nullable();
            $table->integer('wishlist')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rents');
    }
};
