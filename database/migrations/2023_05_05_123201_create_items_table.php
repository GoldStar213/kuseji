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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('front_img')->nullable()->default('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStdszc97zfCye1WEu5_qKSQfoCgrVjb3Zq2ntwevXMLg&usqp=CAU&ec=48600112');
            $table->string('back_img')->nullable()->default('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStdszc97zfCye1WEu5_qKSQfoCgrVjb3Zq2ntwevXMLg&usqp=CAU&ec=48600112');
            $table->string('side_img')->nullable()->default('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStdszc97zfCye1WEu5_qKSQfoCgrVjb3Zq2ntwevXMLg&usqp=CAU&ec=48600112');
            $table->unsignedBigInteger('frontal_color_id');
            $table->foreign('frontal_color_id')->references('id')->on('frontal_colors')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->UnsignedBigInteger('join_type')->default(1);
            $table->string('register_type')->default('nopay');
            $table->integer('view_cnt')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
