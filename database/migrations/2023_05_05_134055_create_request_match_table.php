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
        Schema::create('request_match', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('first_item');
            $table->foreign('first_item')->references('id')->on('items')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('second_item');
            $table->foreign('second_item')->references('id')->on('items')->onDelete('cascade')->onUpdate('cascade');
            $table->text('message');
            $table->tinyInteger('grade');
            $table->dateTime('send_date');
            $table->dateTime('receive_date')->nullable();
            $table->tinyInteger('receive_grade')->nullable();
            $table->tinyInteger('match_state')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_match');
    }
};
