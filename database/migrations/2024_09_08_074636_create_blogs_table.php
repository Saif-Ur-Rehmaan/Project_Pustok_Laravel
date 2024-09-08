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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('Writer_User_id');
            $table->foreign('Writer_User_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');


            $table->text('image');
            $table->text('content')->comment("here blog html css will be stored");
            $table->text('description');
            $table->json('tags');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
