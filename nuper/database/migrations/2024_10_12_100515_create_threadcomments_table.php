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
        Schema::create('threadcomments', function (Blueprint $table) {
            $table->string('commenter')->default("");
            $table->text('comment')->default("");
            $table->integer('threadID');
            $table->integer('upCVote')->default(0);
            $table->integer('downCVote')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('threadcomments');
    }
};
